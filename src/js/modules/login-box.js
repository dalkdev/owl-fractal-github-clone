export function initLoginBox() {
  function toggleLoginBox() {
    const loginBox = document.getElementById('nw-loginbox');
    loginBox.classList.toggle('nw-hidden');
  }

  const loginBoxButton = document.getElementById('nw-login-button');

  loginBoxButton.addEventListener('click', toggleLoginBox);
}
