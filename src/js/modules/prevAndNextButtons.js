export const setupPrevNextBtns = (prevBtn, nextBtn, embla) => {
  if (prevBtn == null || nextBtn == null) return;

  prevBtn.addEventListener('click', embla.scrollPrev, false);
  nextBtn.addEventListener('click', embla.scrollNext, false);
};

export const disablePrevNextBtns = (prevBtn, nextBtn, embla) => {
  if (prevBtn == null || nextBtn == null || embla == null) return;

  return () => {
    if (embla.canScrollPrev()) prevBtn.classList.remove('nw-hidden');
    else prevBtn.classList.add('nw-hidden');

    if (embla.canScrollNext()) nextBtn.classList.remove('nw-hidden');
    else nextBtn.classList.add('nw-hidden');

    if (embla.slidesNotInView().length === 0) {
      prevBtn.classList.add('nw-hidden');
      nextBtn.classList.add('nw-hidden');
    }
  };
};
