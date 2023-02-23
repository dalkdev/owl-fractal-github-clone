export function initTransform() {
  const inputs = document.getElementsByClassName('comment');
  const results = document.getElementsByClassName('result');
  const buttondis = document.getElementsByClassName('buttondis');

  function printNumberOfCommentsLettersInResultLabels() {
    for (let i = 0; i < inputs.length; i++) {
      const counter = inputs[i].value.length + '/1500';
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

  /*  function changeButton() {
         const inputs = document.getElementsByClassName('comment');
         const buttondis = document.getElementsByClassName('buttondis');
         for (let i = 0; i < inputs.length; i++) {
             if (inputs[i].value === '') {
                 buttondis[i].disabled = true;
                 buttondis[i].style.backgroundColor = '#E1B9BA';
             } else {
                 buttondis[i].disabled = false;
                 buttondis[i].style.backgroundColor = '#D20A11';
             }
             console.log(inputs[i]);
         }
     }

     for (let i = 0; i < inputs.length; i++) {
         inputs[i].addEventListener('input', changeButton);

     } */
  for (let i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener('input', function () {
      if (inputs[i].value === '') {
        buttondis[i].disabled = true;
        buttondis[i].style.backgroundColor = '#E1B9BA';
      } else {
        buttondis[i].disabled = false;
        buttondis[i].style.backgroundColor = '#D20A11';
      }
      console.log(i);
    });
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
      hideSvg[i].classList.toggle('nw-rotate-180');
      hideSvg[i].classList.toggle('nw-transform');
    });
  }
}
