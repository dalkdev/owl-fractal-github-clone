export function initDropdownMenu() {

    const dropdowns = document.querySelectorAll('.nw-dropdown');
    dropdowns.forEach(dropdown => {
      const dropdownButton = dropdown.querySelector('.nw-dropdown-block');
      const dropdownSvg = dropdownButton.querySelector('svg');

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
    });
}
