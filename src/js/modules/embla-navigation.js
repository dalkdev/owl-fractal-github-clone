import EmblaCarousel from 'embla-carousel';
import { setupPrevNextBtns, disablePrevNextBtns } from './prevAndNextButtons';

export function initNavigation() {
  const wrap = document.querySelector('.embla-navigation');
  const viewPort = wrap.querySelector('.embla-navigation__viewport');
  const prevBtn = wrap.querySelector('.embla-navigation__button--prev');
  const nextBtn = wrap.querySelector('.embla-navigation__button--next');
  const embla = EmblaCarousel(viewPort, {
    loop: false,
    skipSnaps: true,
    align: 'start',
  });
  const disablePrevAndNextBtns = disablePrevNextBtns(prevBtn, nextBtn, embla);

  setupPrevNextBtns(prevBtn, nextBtn, embla);

  //  embla.on('select', disablePrevAndNextBtns);
  embla.on('init', disablePrevAndNextBtns);
  embla.on('scroll', disablePrevAndNextBtns);

  // for (let i = 0; i < embla.length; i++) {
  //   burgermenuSwitch[i].addEventListener('click', () => toggleBurgermenu());
  // }
}
