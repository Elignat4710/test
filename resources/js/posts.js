document.addEventListener('DOMContentLoaded', () => {
    const bodyText = document.querySelectorAll('.body-post')

    for (let i = 0; i < bodyText.length; i++) {
        let text = bodyText[i].textContent

        if (text.length > 150) {
            text = text.substring(0, 149) + '...'
            bodyText[i].innerHTML = text
        }
    }
})
