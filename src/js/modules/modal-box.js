export function initModalbox() {
    var modal = document.getElementById("modal-box");
    var meldenButton = document.getElementById("meldenButton");
    var closeButton = document.getElementsByClassName("closeButton");

    meldenButton.onclick = function () {
        modal.style.display = "block";
    }

    for (var i = 0; i < closeButton.length; i++) {
        closeButton[i].onclick = function () {
            modal.style.display = "none";
        }
    }

    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }

    const array_tabs = document.getElementsByClassName('kommentare-tabs');
    Array.prototype.forEach.call(array_tabs, (x, i) => {
        x.addEventListener('click', e => {
            Array.prototype.forEach.call(array_tabs, x => {
                x.classList.add('nw-text-black', 'nw-border-transparent');
            });
            x.classList.remove('nw-text-black', 'nw-border-transparent');
            const array_container = document.getElementsByClassName('container');
            Array.prototype.forEach.call(array_container, x => {
                x.classList.add('nw-hidden');
            });
            array_container[i].classList.remove('nw-hidden');
        });
    });

}
