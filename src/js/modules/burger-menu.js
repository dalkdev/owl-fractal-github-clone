export function initBurgermenu() {
  function toggleBurgermenu() {
    const burgermenu = document.getElementById('nw-sidebar-display-switch');
    burgermenu.classList.toggle('nw-hidden');
    document.getElementById('nw-hidden-burger').classList.toggle('nw-hidden');
    document.getElementById('nw-visible-burger').classList.toggle('nw-hidden');
  }

  // function toggleBurgerNavItem() {
  //   const navItem = document.querySelector(this);
  // }

  document
    .querySelector('a.nw-dropdown-indicator')
    .addEventListener('click', function (e) {
      const target = this.dataset.target;
      document.getElementById(target).classList.toggle('open');
    });

  document
    .getElementById('nw-burger-menu-switcher')
    .addEventListener('click', () => toggleBurgermenu());
}
