import EmblaCarousel from 'embla-carousel';
import { setupDotBtns, generateDotBtns, selectDotBtn } from './dotButtons';

export function initSliders() {
  const sliderWrapperNodes = document.querySelectorAll('.slider');

  sliderWrapperNodes.forEach(sliderWrapperNode =>
    initSlider(sliderWrapperNode as HTMLElement)
  );
}

function initSlider(wrapperNode: HTMLElement) {
  const counterCurrent = wrapperNode.querySelector('.slider--counter-current');
  const counterTotal = wrapperNode.querySelector('.slider--counter-total');
  const btnNext = wrapperNode.querySelector('.slider--button-next');
  /* const btnPrev = wrapperNode.querySelector('.slider--button-prev'); */
  const dots = document.querySelector('.embla__dots');

  const mainCarouselWrap = wrapperNode.querySelector('.embla--main-carousel');
  const mainCarouselView = mainCarouselWrap?.querySelector('.embla__viewport');
  const mainCarousel = EmblaCarousel(mainCarouselView as HTMLElement, {
    dragFree: true,
    containScroll: 'trimSnaps',
  });
  const dotsArray = generateDotBtns(dots, mainCarousel);
  const setSelectedDotBtn = selectDotBtn(dotsArray, mainCarousel);
  setupDotBtns(dotsArray, mainCarousel);
  mainCarousel.on('select', setSelectedDotBtn);
  mainCarousel.on('init', setSelectedDotBtn);

  /* const thumbCarouselWrap = wrapperNode.querySelector('.embla--thumb');
  const thumbCarouselView =
    thumbCarouselWrap?.querySelector('.embla__viewport');
  const thumbCarousel = EmblaCarousel(thumbCarouselView as HTMLElement, {
    selectedClass: '',
    containScroll: 'keepSnaps',
    dragFree: true,
  }); */

  /* thumbCarousel.slideNodes().forEach((thumbNode, index) => {
    thumbNode.addEventListener('click', () => {
      mainCarousel.scrollTo(index);
      thumbCarousel.scrollTo(index);
    });
  }); */

  mainCarousel.on('init', () => {
    if (counterCurrent) {
      counterCurrent.textContent = (
        mainCarousel.selectedScrollSnap() + 1
      ).toString();
    }
    if (counterTotal) {
      counterTotal.textContent = mainCarousel.slideNodes().length.toString();
    }
  });

  /* mainCarousel.on('select', () => {
    thumbCarousel.scrollTo(mainCarousel.selectedScrollSnap());
    if (counterCurrent) {
      counterCurrent.textContent = (
        mainCarousel.selectedScrollSnap() + 1
      ).toString();
    }
  }); */

  if (btnNext) {
    btnNext.addEventListener('click', () => {
      mainCarousel.scrollNext();
    });
  }

  /* if (btnPrev) {
    btnPrev.addEventListener('click', () => {
      mainCarousel.scrollPrev();
    });
  } */
}
