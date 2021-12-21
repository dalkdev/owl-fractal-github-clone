export function initStickymenu() {
  function toggleStickymenu() {
    const stickymenu = document.getElementById('nw-sticky-container');

    if (stickymenu == null) return;

    if (
      document.body.scrollTop > 180 ||
      document.documentElement.scrollTop > 180
    ) {
      stickymenu.classList.add('nw-show-sticky');
      stickymenu.classList.remove('nw-hide-sticky');
    } else {
      stickymenu.classList.remove('nw-show-sticky');
      stickymenu.classList.add('nw-hide-sticky');
    }
  }

  window.onscroll = function () {
    toggleStickymenu();
  };
}
