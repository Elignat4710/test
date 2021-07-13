const {default: axios} = require("axios")

document.addEventListener('DOMContentLoaded', () => {
    let comments = document.querySelectorAll('.reply')
    let modal = document.getElementById('flipFlop')

    for (let i = 0; i < comments.length; i++) {
        comments[i].addEventListener('click', () => {
            let currentComment = modal.querySelector('#current-comment')
            let parentId = modal.querySelector('#parent_id')

            axios.get('/get-comment/' + comments[i].dataset.comment_id)
                .then((data) => {
                    currentComment.innerText = data.data.comment.body
                    parentId.setAttribute('value', comments[i].dataset.comment_id)
                })
        })
    }
})
