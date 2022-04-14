(function () {
    const header = document.getElementsByTagName('header')[0]

    window.addEventListener('scroll', (event) => {
        if (document.documentElement.scrollTop > 50) {
            header.classList.add('shadow-display')
        } else {
            header.classList.remove('shadow-display')
        }
    })

    const blogName = document.querySelector('header h1.blog-name')
    blogName.addEventListener('click', () => {
        window.location.href = '/'
    })

})()