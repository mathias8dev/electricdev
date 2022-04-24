
const links = document.querySelectorAll('nav li')
const nav = document.querySelector('nav')
let navHovered = false
let navExpanded = false



const mutationObserver = new MutationObserver((mutationList, observer) => {
    mutationList.forEach(mutation => {
        if (mutation.attributeName === 'class') {
            let submenuHolder = document.querySelectorAll('nav.expanded ul li.submenu-holder')
            let submenus = document.querySelectorAll('nav ul li ul')
            if (navExpanded) {
                console.log(submenus)

                submenuHolder.forEach((holder) => {
                    holder.addEventListener('click', () => {
                        console.log("Click event detected")
                        submenus.forEach(_submenu => _submenu.style.display = 'none')

                        submenu = holder.querySelector('ul')
                        submenu.style.display = 'block'
                    })
                })
            } else {
                submenus.forEach(submenu => submenu.style.display = 'none')

            }
        }
    })
})

mutationObserver.observe(document.querySelector('nav'), { attributes: true })


nav.addEventListener('mouseenter', () => {
    navHovered = true
})

nav.addEventListener('mouseleave', () => {
    navHovered = false
    navExpanded = false
    nav.classList.remove('expanded')
})
links.forEach(link => {
    link.addEventListener('mouseenter', () => {
        if (!navExpanded) {
            nav.classList.add('expanded')
            navExpanded = true
        }

    })

    link.addEventListener('mouseleave', () => {
        if (!navHovered) {
            navExpanded = false
            nav.classList.remove('expanded')
        }
    })
})
