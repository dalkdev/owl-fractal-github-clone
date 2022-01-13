export function initBurgermenu() {
  function toggleBurgermenu() {
    const burgermenu = document.getElementById('nw-sidebar-navigation');
    burgermenu.classList.toggle('nw-open-burgermenu');
    burgermenu.classList.toggle('nw-close-burgermenu');
    const burgermenuOverlay = document.getElementById('burger-overlay');
    burgermenuOverlay.classList.toggle('nw-hidden');
  }

  const burgermenuDropdown = document.getElementsByClassName(
    'nw-dropdown-indicator'
  );

  for (let i = 0; i < burgermenuDropdown.length; i++) {
    burgermenuDropdown[i].addEventListener('click', function () {
      const target = this.dataset.target;
      const targetElement = document.getElementById(target);
      targetElement.classList.toggle('open');
    });
  }

  const burgermenuSwitch = document.getElementsByClassName(
    'nw-burger-menu-switcher'
  );

  for (let i = 0; i < burgermenuSwitch.length; i++) {
    burgermenuSwitch[i].addEventListener('click', () => toggleBurgermenu());
  }
}
