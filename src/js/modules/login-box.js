export function initLoginBox() {
  function toggleLoginBox() {
    const loginBox = document.getElementById('nw-loginbox');
    if (loginBox != null) loginBox.classList.toggle('nw-hidden');
  }

  const loginBoxButton = document.getElementById('nw-login-button');

  if (loginBoxButton != null)
    loginBoxButton.addEventListener('click', toggleLoginBox);
}
