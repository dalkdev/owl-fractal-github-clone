import EmblaCarousel from 'embla-carousel';
import {setupDotBtns, generateDotBtns, selectDotBtn} from './dotButtons';

export function initSliders() {
    const sliderWrapperNodes = document.querySelectorAll('.slider');
    
    sliderWrapperNodes.forEach(sliderWrapperNode => {
        initSlider(sliderWrapperNode as HTMLElement);
    });
}

let slideIndex = 1;

function showSlides(n: number) {
    const slides = document.querySelectorAll('.mySlides');
    if (n < 1) {
        slideIndex = slides.length;
    } else if (n > slides.length) {
        slideIndex = 1;
    } else {
        slideIndex = n;
    }

    for (let i = 0; i < slides.length; i++) {
        (slides[i] as HTMLElement).style.display = 'none';
    }

    (slides[slideIndex - 1] as HTMLElement).style.display = 'block';
}

function initSlider(wrapperNode: HTMLElement) {
    const counterCurrent = wrapperNode.querySelector('.slider--counter-current');
    const counterTotal = wrapperNode.querySelector('.slider--counter-total');
    const btnNext = wrapperNode.querySelector('.slider--button-next');
    const btnPrev = wrapperNode.querySelector('.slider--button-prev');
    const dots = wrapperNode.querySelector('.embla__dots');
    const gallery = document.querySelectorAll(".nw-gallery-lightbox");

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
    // Count the number of slides
    const BilderCount = mainCarousel.slideNodes().length;

    // Update the content of the slide count element
    const photoCount = wrapperNode.querySelector('.photoCount');
    if (photoCount) {
        photoCount.textContent = BilderCount.toString();
    }

    mainCarousel.on('scroll', () => {
        gallery.forEach(function(el)  {
            el.removeEventListener("click", preventClick);
        })
    });

    let adIsTriggered = -1;

    const onAdSlideInView = (mainCarousel) => {
        mainCarousel.slidesInView().forEach(function(el){
            if ((el !== 0 || el === 5 || el % 5 === .2) && adIsTriggered === -1) {
                const check = mainCarousel.slideNodes()[el].querySelector('.em_ads_box_dynamic_remove > div');
                try {
                    if (check) {
                        if (typeof googletag !== 'undefined') {
                            // @ts-ignore
                            googletag.cmd.push(function() { googletag.display('/248415179,13052567/nw.de_mr_6'); });
                            adIsTriggered = el;
                        }
                        else
                        {
                            console.error('google ist nicht verfügbar')
                        }
                    }
                }
                catch (error) {
                    console.error('Ein Fehler ist aufgetreten:', error);
                }
            }
        })
    }

    mainCarousel.on('scroll', onAdSlideInView)

    function preventClick(e)
    {
        e.preventDefault();
    }

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


    if (btnNext) {
        btnNext.addEventListener('click', () => {
            mainCarousel.scrollNext();
        });
    }

    if (btnPrev) {
        btnPrev.addEventListener('click', () => {
            mainCarousel.scrollPrev();
        });
    }

}
