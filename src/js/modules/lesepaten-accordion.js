export function initLesepatenAccordion() {
    const d = document;
    const accordDropdown = d.getElementsByClassName('accord-opener');

    for (let i = 0; i < accordDropdown.length; i++) {
        accordDropdown[i].addEventListener('click', function (e) {
            e.preventDefault();
            this.classList.toggle('nw-show-lesepaten-accordion-item');
            this.nextElementSibling.classList.toggle('nw-hidden');
        });
    }
}
