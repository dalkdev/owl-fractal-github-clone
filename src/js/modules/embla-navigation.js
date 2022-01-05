import EmblaCarousel from 'embla-carousel';
import { setupPrevNextBtns, disablePrevNextBtns } from './prevAndNextButtons';

export function initNavigation() {
  const setupEmblaCarousel = (emblaNode, options) => {
    const viewPort = emblaNode.querySelector('.embla-navigation__viewport');
    const prevBtn = emblaNode.querySelector('.embla-navigation__button--prev');
    const nextBtn = emblaNode.querySelector('.embla-navigation__button--next');
    const embla = EmblaCarousel(viewPort, options);
    const disablePrevAndNextBtns = disablePrevNextBtns(prevBtn, nextBtn, embla);

    if (prevBtn != null || nextBtn != null) {
      setupPrevNextBtns(prevBtn, nextBtn, embla);
      embla.on('select', disablePrevAndNextBtns);
      embla.on('init', disablePrevAndNextBtns);
      embla.on('scroll', disablePrevAndNextBtns);
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
