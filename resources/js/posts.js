document.addEventListener('DOMContentLoaded', () => {
    const bodyText = document.querySelectorAll('.body-post')

    // Сокражение содержания поста
    for (let i = 0; i < bodyText.length; i++) {
        let text = bodyText[i].textContent

        if (text.length > 150) {
            text = text.substring(0, 149) + '...'
            bodyText[i].innerHTML = text
        }
    }

    // Автосаджест для поиска по тегам
    document.getElementById('tag').addEventListener('input', (e) => {
        axios.get('/search-tag', {
            params: {
                search: e.target.value
            }
        })
            .then((data) => {
                let dataList = document.getElementById('tags-name')
                dataList.innerHTML = ''
                let string = ''

                for (let i = 0; i < data.data.models.length; i++) {
                    string += `<option value="${data.data.models[i].name}">`
                }

                dataList.insertAdjacentHTML('afterbegin', string)
            })
    })

    // Сабмит формы на фильтрацию по тегам
    document.getElementById('form').addEventListener('submit', (e) => {
        let formData = new FormData(e.target)
        let currentPath = window.location.href
        axios.get(currentPath, {
            params: {
                filter: {
                    tag: formData
                }
            }
        })
    })
})
