const snack = document.querySelector('.snackbar')
snack.classList.toggle('show')
setTimeout(() => {
    snack.classList.toggle('show')
}, 4000)