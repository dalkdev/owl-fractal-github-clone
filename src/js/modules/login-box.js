export function initLoginBox() {
  function toggleLoginBox() {
    const loginBox = document.getElementById('nw-loginbox');
    const backgroundPopup = document.getElementById('background-popup');

    if (loginBox !== null) {
      const isHidden = loginBox.classList.contains('nw-hidden');

      if (isHidden) {
        // Slide in and fade in animation when the login box appears
        loginBox.style.animation = 'slideIn 1s forwards';
        backgroundPopup.style.animation = 'fadeIn 0.5s forwards';
      } else {
        // Slide out and fade out animation when the login box disappears
        loginBox.style.animation = 'slideOut 1s forwards';
        backgroundPopup.style.animation = 'fadeOut 0.5s forwards';

        // Wait for the slide-out animation to finish before hiding the box
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
  const closeButton = document.getElementById('nw-close-button');

  if (loginBoxButton !== null) {
    loginBoxButton.addEventListener('click', toggleLoginBox);
  }

  if (closeButton !== null) {
    closeButton.addEventListener('click', function() {
      // Trigger the slide-out animation only when close button is clicked
      const loginBox = document.getElementById('nw-loginbox');
      const backgroundPopup = document.getElementById('background-popup');

      if (loginBox !== null && backgroundPopup !== null) {
        loginBox.style.animation = 'slideOut 1s forwards';
        backgroundPopup.style.animation = 'fadeOut 0.5s forwards';

        // Wait for the animation to end before hiding the box
        loginBox.addEventListener('animationend', function() {
          loginBox.classList.add('nw-hidden');
          backgroundPopup.classList.add('nw-hidden');
        }, { once: true });
      }
    });
  }
}
