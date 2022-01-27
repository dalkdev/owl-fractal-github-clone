import EmblaCarousel from 'embla-carousel';
// import { checkVisible } from './helpers';

import { setupPrevNextBtns, disablePrevNextBtns } from './prevAndNextButtons';

let currentSlideIndex = 0;

export function initNavigation(reInit = false) {
  const setupEmblaCarousel = (emblaNode, options) => {
    const viewPort = emblaNode.querySelector('.embla-navigation__viewport');
    const prevBtn = emblaNode.querySelector('.embla-navigation__button--prev');
    const nextBtn = emblaNode.querySelector('.embla-navigation__button--next');
    const embla = EmblaCarousel(viewPort, options);
    const disablePrevAndNextBtns = disablePrevNextBtns(prevBtn, nextBtn, embla);

    if (prevBtn != null || nextBtn != null) {
      setupPrevNextBtns(prevBtn, nextBtn, embla);

      embla.on('init', disablePrevAndNextBtns);
      embla.on('scroll', disablePrevAndNextBtns);

      console.log(embla.slidesNotInView().length);

      if (embla.slidesNotInView().length === 0) {
        prevBtn.classList.add('nw-hidden');
        nextBtn.classList.add('nw-hidden');
      }

      embla.slideNodes().forEach(function callback(slideNode, i) {
        if (slideNode.classList.contains('embla-navigation-slide-active')) {
          currentSlideIndex = i;
        }
      });

      embla.scrollTo(currentSlideIndex, true);
    }
  };

  const options = {
    loop: false,
    skipSnaps: true,
    align: 'start',
  };
  const emblaNodes = [].slice.call(
    document.querySelectorAll('.embla-navigation')
  );
  const emblaCarousels = emblaNodes.map(emblaNode =>
    setupEmblaCarousel(emblaNode, options)
  );

  return emblaCarousels;
}
