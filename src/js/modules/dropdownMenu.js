export function initDropdownMenu() {

    const dropdowns = document.querySelectorAll('.nw-dropdown');
    dropdowns.forEach(dropdown => {
      const dropdownButton = dropdown.querySelector('.nw-dropdown-block');
      const dropdownSvg = dropdownButton.querySelector('svg');

      const dropdownText = dropdownButton.querySelector('.nw-dropdown-text');
      const dropdownMenu = dropdown.querySelector('ul');
      const dropdownItems = dropdownMenu.querySelectorAll('li a');

      const defaultOption = dropdownText.textContent;

      dropdownButton.addEventListener('click', () => {
        const dropdownMenu = dropdown.querySelector('ul');
        const isHidden = dropdownMenu.classList.contains('nw-hidden');

        if (isHidden) {
          dropdownMenu.classList.remove('nw-hidden');
          dropdownSvg.classList.add('nw-rotate-180');
        } else {
          dropdownMenu.classList.add('nw-hidden');
          dropdownSvg.classList.remove('nw-rotate-180');
        }
      });
      dropdownItems.forEach(item => {
        item.addEventListener('click', (event) => {
          event.preventDefault();
          const selectedText = item.textContent;
          dropdownText.textContent = selectedText === "Alle" ? defaultOption : selectedText;

          dropdownMenu.classList.add('nw-hidden');
          dropdownSvg.classList.remove('nw-rotate-180');
        });
      });
    });
}
