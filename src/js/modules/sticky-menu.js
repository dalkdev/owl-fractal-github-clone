export function initStickymenu() {
  function toggleStickymenu() {
    const stickymenu = document.getElementById('nw-sticky-container');

    if (
      document.body.scrollTop > 160 ||
      document.documentElement.scrollTop > 160
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
