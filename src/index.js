import './index.scss'

/* Navigation Trigger */
const navTrigger = document.querySelector('.mobile-nav__trigger');

if (navTrigger) {
    navTrigger.addEventListener('click', (event) => {
        event.preventDefault();
        const currentTarget = event.currentTarget;

        if (currentTarget && currentTarget.parentNode && currentTarget.parentNode.classList) {
            currentTarget.parentNode.classList.toggle('nav--active')
        }
    })
}
