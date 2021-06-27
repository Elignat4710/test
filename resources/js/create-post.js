document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('category').addEventListener('input', (e) => {
        axios.get('/search-category', {
            params: {
                search: e.target.value
            }
        })
            .then((data) => {
                let dataList = document.getElementById('category_name')
                dataList.innerHTML = ''

                let string = ''

                for (let i = 0; i < data.data.models.length; i++) {
                    string += `<option value="${data.data.models[i].name}">`
                }

                dataList.insertAdjacentHTML('afterbegin', string)
            })
    })
}, true)
