import { initNavigation } from './embla-navigation';

export function initStickymenu() {
  const stickymenu = document.getElementById('nw-sticky-container');
  const originalmenu = document.getElementById('nw-menu-section');

  function toggleStickymenu() {
    if (stickymenu == null) return;
    initNavigation(true);

    if (originalmenu.getBoundingClientRect().y > 0) {
      stickymenu.classList.remove('nw-show-sticky');
      stickymenu.classList.add('nw-hide-sticky');
    } else {
      stickymenu.classList.add('nw-show-sticky');
      stickymenu.classList.remove('nw-hide-sticky');
    }
  }
  window.addEventListener('scroll', () => toggleStickymenu());
}
