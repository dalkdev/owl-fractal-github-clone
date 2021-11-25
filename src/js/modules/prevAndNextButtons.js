export const setupPrevNextBtns = (prevBtn, nextBtn, embla) => {
  prevBtn.addEventListener('click', embla.scrollPrev, false);
  nextBtn.addEventListener('click', embla.scrollNext, false);
};

export const disablePrevNextBtns = (prevBtn, nextBtn, embla) => {
  return () => {
    if (embla.canScrollPrev()) prevBtn.classList.remove('nw-hidden');
    else prevBtn.classList.add('nw-hidden');

    if (embla.canScrollNext()) nextBtn.classList.remove('nw-hidden');
    else nextBtn.classList.add('nw-hidden');
  };
};
