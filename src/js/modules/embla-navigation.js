import EmblaCarousel from 'embla-carousel';
import { setupPrevNextBtns, disablePrevNextBtns } from './prevAndNextButtons';

export function initNavigation() {
  setupNavigation('.embla-navigation');
  setupNavigation('.embla-navigation-sticky');
}

function setupNavigation(selector) {
  const wrap = document.querySelector(selector);
  const viewPort = wrap.querySelector(selector + '__viewport');
  const prevBtn = wrap.querySelector(selector + '__button--prev');
  const nextBtn = wrap.querySelector(selector + '__button--next');
  const embla = EmblaCarousel(viewPort, {
    loop: false,
    skipSnaps: true,
    align: 'start',
  });

  const disablePrevAndNextBtns = disablePrevNextBtns(prevBtn, nextBtn, embla);

  if (prevBtn != null || nextBtn != null)
    setupPrevNextBtns(prevBtn, nextBtn, embla);

  if (prevBtn != null || nextBtn != null) {
    //  embla.on('select', disablePrevAndNextBtns);
    embla.on('init', disablePrevAndNextBtns);
    embla.on('scroll', disablePrevAndNextBtns);
  }
}
