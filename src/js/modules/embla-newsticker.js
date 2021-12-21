import EmblaCarousel from 'embla-carousel';
import { setupPrevNextBtns, disablePrevNextBtns } from './prevAndNextButtons';

export function initNewsticker() {
  const wrap = document.querySelector('.embla-newsticker');

  if (wrap == null) return;

  const viewPort = wrap.querySelector('.embla-newsticker__viewport');
  const prevBtn = wrap.querySelector('.embla-newsticker__button--prev');
  const nextBtn = wrap.querySelector('.embla-newsticker__button--next');
  const embla = EmblaCarousel(viewPort, {
    align: 'start',
    slidesToScroll: 1,
    skipSnaps: true,
  });
  const disablePrevAndNextBtns = disablePrevNextBtns(prevBtn, nextBtn, embla);

  setupPrevNextBtns(prevBtn, nextBtn, embla);

  embla.on('select', disablePrevAndNextBtns);
  embla.on('init', disablePrevAndNextBtns);
}
