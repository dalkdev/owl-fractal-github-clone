export function initBurgermenu() {
  function toggleBurgermenu() {
    const burgermenu = document.getElementById('nw-sidebar-navigation');
    burgermenu.classList.toggle('nw-hidden');
    const burgermenuOverlay = document.getElementById('burger-overlay');
    burgermenuOverlay.classList.toggle('nw-hidden');
  }

  const burgermenuDropdown = document.getElementsByClassName(
    'nw-dropdown-indicator'
  );

  for (let i = 0; i < burgermenuDropdown.length; i++) {
    burgermenuDropdown[i].addEventListener('click', function () {
      const target = this.dataset.target;
      document.getElementById(target).classList.toggle('open');
    });
  }

  const burgermenuSwitch = document.getElementsByClassName(
    'nw-burger-menu-switcher'
  );

  for (let i = 0; i < burgermenuSwitch.length; i++) {
    burgermenuSwitch[i].addEventListener('click', () => toggleBurgermenu());
  }
}
