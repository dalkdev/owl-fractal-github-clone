export function initLesepaten() {
    // Tabs clicken
    var arrayTabs = document.getElementsByClassName('lesepatenTabs');
    Array.prototype.forEach.call(arrayTabs, (x, i) => {
        x.addEventListener('click', e => {
            e.preventDefault();
            Array.prototype.forEach.call(arrayTabs, x => {
                x.classList.remove(
                    'nw-text-black',
                    'nw-border-b-2',
                    'nw-font-bold',
                    'nw-border-black'
                );
                x.classList.add('nw-text-black', 'nw-border-transparent');
            });
            x.classList.remove('nw-text-black', 'nw-border-transparent');
            x.classList.add(
                'nw-text-black',
                'nw-border-b-2',
                'nw-font-bold',
                'nw-border-black'
            );
            var arrayContainer = document.getElementsByClassName('lesepatenContainer');
            Array.prototype.forEach.call(arrayContainer, x => {
                x.classList.add('nw-hidden');
            });
            arrayContainer[i].classList.remove('nw-hidden');
        });
    });
    // accordion machen
    var accordion = document.getElementsByClassName('lesepatenAccordion');
    var i;
    for (i = 0; i < accordion.length; i++) {
        accordion[i].addEventListener('click', function () {
            this.classList.toggle('active');
            var panel = this.nextElementSibling;
            if (panel.style.display === 'block') {
                panel.style.display = 'none';
            } else {
                panel.style.display = 'block';
            }
        });
    }
    // svg ändern
    document.addEventListener("DOMContentLoaded", function () {
        var buttons = document.querySelectorAll(".lesepatenAccordion");
        buttons.forEach(function (button) {
            button.addEventListener("click", function () {
                var svg = button.querySelector("svg");
                var state = svg.getAttribute("data-state");

                if (state === "expanded") {
                    svg.setAttribute("data-state", "collapsed");
                    svg.innerHTML = `
                        <path d="M10.75 6.75a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z"/>
                    `;
                } else {
                    svg.setAttribute("data-state", "expanded");
                    svg.innerHTML = `
                        <path d="M6.75 9.25a.75.75 0 000 1.5h6.5a.75.75 0 000-1.5h-6.5z"/>
                    `;
                }
            });
        });
    });
    // FORM LESEPATEN WERDEN
    var checkBox1 = document.getElementById('checkCondition1');
    var checkBox2 = document.getElementById('checkCondition2');
    var bRegister = document.getElementById('registerButton');

    if (checkBox1 == null || checkBox2 == null || bRegister == null) return;

    checkBox1.addEventListener('change', checkFunction);
    checkBox2.addEventListener('change', checkFunction);
    bRegister.addEventListener('click', onClickRegistrieren);

    function checkFunction() {
        if (
            checkBox1.checked === true &&
            (checkBox2.checked === true || checkBox2.checked === false)
        ) {
            bRegister.disabled = false;
            bRegister.style.backgroundColor = '#D20A11';
        } else {
            bRegister.disabled = true;
            bRegister.style.backgroundColor = '#E1B9BA';
        }
    }

    function onClickRegistrieren() {
        var valid = Validator();
        if (valid) alert('ok');
    }

    const arrayInput = document.getElementsByClassName('nw-lesepaten-form');

    function Validator() {
        var valid = true;
        Array.prototype.forEach.call(arrayInput, x => {
            const label = document.querySelector('label[for="' + x.getAttribute('id') + '"]');
            if (x.value === '') {
                valid = false;
                x.classList.add('nw-border-red-500');
                label.classList.add('nw-text-red-500');
            } else {
                x.classList.remove('nw-border-red-500');
                label.classList.remove('nw-text-red-500');
            }
        });

        var dangerAlert = document.getElementById('dangerAlert');
        if (valid) {
            dangerAlert.classList.add('nw-hidden');
        } else {
            dangerAlert.classList.remove('nw-hidden');
            dangerAlert.scrollIntoView({behavior: 'smooth', block: 'start'});
        }
        return valid;
    }
}
