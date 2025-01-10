export function initLoginBox() {

  function toggleLoginBox() {
    const loginBox = document.getElementById('nw-loginbox');
    const backgroundPopup = document.getElementById('background-popup');

    if (loginBox !== null && backgroundPopup !== null) {
      const isHidden = loginBox.classList.contains('nw-hidden');

      if (isHidden) {

        loginBox.style.animation = 'slideIn 1s forwards';
        backgroundPopup.style.animation = 'fadeIn 0.5s forwards';
      } else {

        loginBox.style.animation = 'slideOut 1s forwards';
        backgroundPopup.style.animation = 'fadeOut 0.5s forwards';


        loginBox.addEventListener('animationend', function() {
          loginBox.classList.add('nw-hidden');
          backgroundPopup.classList.add('nw-hidden');
        }, { once: true });
      }


      loginBox.classList.toggle('nw-hidden');
      backgroundPopup.classList.toggle('nw-hidden');
    }
  }


  const loginBoxButton = document.getElementById('nw-login-button');
  if (loginBoxButton !== null) {
    loginBoxButton.addEventListener('click', toggleLoginBox);
  }


  function closeLoginBox() {
    const loginBox = document.getElementById('nw-loginbox');
    const backgroundPopup = document.getElementById('background-popup');

    if (loginBox !== null && backgroundPopup !== null) {

      loginBox.style.animation = 'slideOut 1s forwards';
      backgroundPopup.style.animation = 'fadeOut 0.5s forwards';


      loginBox.addEventListener('animationend', function() {
        loginBox.classList.add('nw-hidden');
        backgroundPopup.classList.add('nw-hidden');
      }, { once: true });
    }
  }

  const closeButton = document.getElementById('nw-close-button');
  if (closeButton !== null) {

    closeButton.addEventListener('click', closeLoginBox);
  }
}
