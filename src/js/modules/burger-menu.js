export function initBurgermenu() {
  function toggleBurgermenu() {
    const burgermenu = document.getElementById('nw-sidebar-navigation');
    burgermenu.classList.toggle('nw-hidden');
    document.getElementById('nw-hidden-burger').classList.toggle('nw-hidden');
    document.getElementById('nw-visible-burger').classList.toggle('nw-hidden');
  }

  const userSelection = document.getElementsByClassName('nw-dropdown-indicator');

  for (let i = 0; i < userSelection.length; i++) {
    userSelection[i].addEventListener('click', function () {
      const target = this.dataset.target;
      document.getElementById(target).classList.toggle('open');
    });
  }

  document
    .getElementById('nw-burger-menu-hide')
    .addEventListener('click', () => toggleBurgermenu());

  document
    .getElementById('nw-burger-menu-switcher')
    .addEventListener('click', () => toggleBurgermenu());
}
