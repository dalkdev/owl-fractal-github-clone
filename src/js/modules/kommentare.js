export function initTransform() {
  const inputs = document.getElementsByClassName('comment');
  const results = document.getElementsByClassName('result');

  function printNumberOfCommentsLettersInResultLabels() {
    for (let i = 0; i < inputs.length; i++) {
      const counter = inputs[i].value.length + '/3000';
      results[i].innerHTML = counter;
      const parent = inputs[i].parentNode;
      const btn = parent.nextElementSibling.childNodes[1];
      if (counter === 0) {
        btn.disabled = true;
      } else {
        btn.disabled = false;
      }
    }
  }

  for (let i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener('keyup', event => {
      printNumberOfCommentsLettersInResultLabels();
    });
  }
  const hideSvg = document.getElementsByClassName('hideSvg');
  for (let i = 0; i < hideSvg.length; i++) {
    hideSvg[i].addEventListener('click', function () {
      const target = document.querySelector(`.${this.dataset.target}`);
      target.style.display = target.style.display === 'none' ? 'block' : 'none';
      toggleTransform(hideSvg[i]);
    });
  }

  function toggleTransform(transform) {
    if (transform.classList.contains('nw-transform')) {
      transform.classList.remove('nw-transform', 'nw-rotate-180');
    } else {
      transform.classList.add('nw-transform', 'nw-rotate-180');
    }
  }
}
