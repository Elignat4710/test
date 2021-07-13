import Tagify from '@yaireo/tagify'
import axios from 'axios'

document.addEventListener('DOMContentLoaded', () => {
    let input = document.querySelector('#tag'),
        tagify = new Tagify(input, {
            originalInputValueFormat: valuesArr => valuesArr.map(item => item.value),
            whitelist: [],
            maxTags: 5,
        }),
        controller

    // автосаджест для поисков тегов
    tagify.on('input', (e) => {
        let value = e.detail.value
        tagify.whitelist = []

        controller && controller.abort()
        controller = new AbortController

        tagify.loading(true).dropdown.hide()

        axios.get('/search-tag', {
            params: {
                search: value
            }
        })
            .then((data) => {
                let newWhiteList = []

                data.data.models.forEach(element => {
                    newWhiteList.push(element.name)
                });

                tagify.whitelist = newWhiteList
                tagify.loading(false).dropdown.show(value)
            })
    })

    // Автосаджест для поля "category"
    document.getElementById('category').addEventListener('input', (e) => {
        let dataList = document.getElementById('category_name')

        searchOptions('/search-category', e.target.value, dataList)
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
