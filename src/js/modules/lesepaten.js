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
    // FORM LESEPATEN WERDEN ( Checkbox)
    var lesepatenCheckBox1 = document.getElementById('lesepatenCheckCondition1');
    var lesepatenCheckBox2 = document.getElementById('lesepatenCheckCondition2');
    var bBeantragen = document.getElementById('beantragenButton');

    if (lesepatenCheckBox1 == null || lesepatenCheckBox2 == null || bBeantragen == null) return;

    lesepatenCheckBox1.addEventListener('change', checkFunction);
    lesepatenCheckBox2.addEventListener('change', checkFunction);

    function checkFunction() {
        if (
          lesepatenCheckBox1.checked === true &&
          (lesepatenCheckBox2.checked === true || lesepatenCheckBox2.checked === false)
        ) {
            bBeantragen.disabled = false;
            bBeantragen.style.backgroundColor = '#D20A11';
        } else {
            bBeantragen.disabled = true;
            bBeantragen.style.backgroundColor = '#E1B9BA';
        }
    }

}
