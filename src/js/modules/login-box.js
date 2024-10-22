export function initLoginBox() {
  function toggleLoginBox() {
    const loginBox = document.getElementById('nw-loginbox');
    const backgroundPopup = document.getElementById('background-popup');

    if (loginBox !== null) {

      loginBox.classList.toggle('nw-hidden');
      backgroundPopup.classList.toggle('nw-hidden');
    }
  }

  const loginBoxButton = document.getElementById('nw-login-button');
  const closeButton = document.getElementById('nw-close-button');

  if (loginBoxButton !== null) {
    loginBoxButton.addEventListener('click', toggleLoginBox);
  }

  if (closeButton !== null) {
    closeButton.addEventListener('click', toggleLoginBox);
  }
}
