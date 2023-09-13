export const setupDotBtns = (dotsArray, embla) => {
  if (dotsArray == undefined)
    return;

  dotsArray.forEach((dotNode, i) => {
    dotNode.addEventListener('click', () => embla.scrollTo(i), false);
  });
};

export const generateDotBtns = (dots, embla) => {
  const dotTemplate = document.getElementById('embla-dot-template');

  if (dotTemplate != null)
  {
    const template = dotTemplate.innerHTML;
    dots.innerHTML = embla.scrollSnapList().reduce(acc => acc + template, '');
    return [].slice.call(dots.querySelectorAll('.embla__dot'));
  }
};

export const selectDotBtn = (dotsArray, embla) => () => {
  if (dotsArray == undefined)
    return;

  const previous = embla.previousScrollSnap();
  const selected = embla.selectedScrollSnap();
  dotsArray[previous].classList.remove('is-selected');
  dotsArray[selected].classList.add('is-selected');
};
