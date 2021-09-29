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

/* Attendee List */
const attendeeListElements = document.querySelectorAll('.tribe-attendees-list > .tribe-attendees-list-item');

if (attendeeListElements) {
    attendeeListElements.forEach(attendeeListElement => {
        const attendeeName = attendeeListElement.querySelector('img').alt;
        const newNameElement = document.createElement('p');

        newNameElement.innerHTML = attendeeName;

        attendeeListElement.appendChild(newNameElement);
    });
}

/* Charitable Payment */
const paymentHeader = document.querySelector('.charitable-form-header');
const paymentButton = document.querySelector('.single-campaign button[name="donate"]');

if (paymentHeader) {
    paymentHeader.innerHTML = "Payment Amount";
}

console.log(paymentButton)

if (paymentButton) {
    paymentButton.innerHTML = "Pay Now";
}
