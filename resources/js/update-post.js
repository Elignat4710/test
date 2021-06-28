document.addEventListener('DOMContentLoaded', () => {
    const tagsName = []

    // Автосаджест для поля "category"
    document.getElementById('category').addEventListener('input', (e) => {
        let dataList = document.getElementById('category_name')

        searchOptions('/search-category', e.target.value, dataList)
    })

    // Автосаджест для поля "tag"
    document.getElementById('tag').addEventListener('input', (e) => {
        e.target.value = e.target.value.trim()

        let dataList = document.getElementById('tags-name')

        searchOptions('/search-tag', e.target.value, dataList)
    })

    // Приминения тегов через пробел и сохранения их в отдельный инпут
    document.getElementById('tag').addEventListener('keydown', (e) => {
        if (e.code === 'Space' && e.target.value.length != 0) {
            tagsName.push(e.target.value)
            let arrayTag = document.getElementById('array-tag')
            arrayTag.value = ''
            arrayTag.value = JSON.stringify(tagsName)

            let tagsList = document.getElementById('tags-list')
            let string = `<span class="badge badge-pill badge-success mr-1">${e.target.value}</span>`

            e.target.value = ''

            tagsList.insertAdjacentHTML('afterend', string)
        }
    })
}, true)

// установка опция на дата лист
let searchOptions = (url, value, dataList) => {
    axios.get(url, {
        params: {
            search: value
        }
    })
        .then((data) => {
            dataList.innerHTML = ''

            let string = ''

            for (let i = 0; i < data.data.models.length; i++) {
                string += `<option value="${data.data.models[i].name}">`
            }

            dataList.insertAdjacentHTML('afterbegin', string)
        })
}
