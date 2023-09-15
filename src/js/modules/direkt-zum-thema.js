export function initDirektZumThema() {
    const dropdownButtons = document.querySelectorAll(".dropdown-button");
    dropdownButtons.forEach(button => {
        button.addEventListener("click", function () {
            const content = this.nextElementSibling;
            content.classList.toggle("nw-hidden");
            dropdownButtons.forEach(nextButton => {
                if (nextButton !== this) {
                    const nextContent = nextButton.nextElementSibling;
                    nextContent.classList.add("nw-hidden");
                }
            });
        });
    });
}
