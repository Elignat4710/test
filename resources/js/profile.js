document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('form-edit-photo')
    const inputAvatar = document.getElementById('file')

    document.getElementById('edit-photo').addEventListener('click', (e) => {
        inputAvatar.click()
    })

    inputAvatar.addEventListener('change', () => {
        let formData = new FormData(form)
        axios.post('/profile/update-avatar', formData)
            .then(() => {
                window.location.reload()
            })
    })
})
