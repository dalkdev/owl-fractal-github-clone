export function initFAQ() {
    const d = document;
    const faqDropdown = d.getElementsByClassName(
        'faq-opener'
    );

    for (let i = 0; i < faqDropdown.length; i++) {
        faqDropdown[i].addEventListener('click', function (e) {
            e.preventDefault();
            this.nextElementSibling.classList.toggle("nw-hidden");



        });
    }
}

