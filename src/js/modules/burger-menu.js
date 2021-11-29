export function initBurgermenu() {
  function toggleBurgermenu() {
    const burgermenu = document.getElementById('nw-sidebar-display-switch');
    burgermenu.classList.toggle('nw-hidden');
    document.getElementById('nw-hidden-burger').classList.toggle('nw-hidden');
    document.getElementById('nw-visible-burger').classList.toggle('nw-hidden');
  }

  document
    .getElementById('nw-burger-menu-switcher')
    .addEventListener('click', () => toggleBurgermenu());
}
