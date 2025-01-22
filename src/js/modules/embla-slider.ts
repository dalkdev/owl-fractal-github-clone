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
    // Drag-Free-Einstellung nur für den Photos-Slider
    const isPhotosSlider = wrapperNode.classList.contains('photos-slider');
    const leftMask = wrapperNode.querySelector('.slider-mask.left') as HTMLElement;
    const rightMask = wrapperNode.querySelector('.slider-mask.right') as HTMLElement;


    const mainCarousel = EmblaCarousel(mainCarouselView as HTMLElement, {
        dragFree: !isPhotosSlider, // dragFree: false für den Photos-Slider
        containScroll: 'trimSnaps',
    });

    if (mainCarousel && leftMask && rightMask) {
        rightMask.style.opacity = '1';

        mainCarousel.on('scroll', () => {
            const scrollProgress = mainCarousel.scrollProgress();

            leftMask.style.opacity = scrollProgress > 0 ? '1' : '0';
            rightMask.style.opacity = '1';
        });
    }

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
        });

        if (btnPrev && wrapperNode.classList.contains('nw-newsletter-boxen-slider')) {
            if (mainCarousel.selectedScrollSnap() === 0) {

                btnPrev.classList.remove('md:nw-block');
                btnPrev.classList.add('md:nw-hidden');
                btnPrev.classList.remove('lg:nw-block');
                btnPrev.classList.add('lg:nw-hidden');
            } else {
                btnPrev.classList.remove('md:nw-hidden');
                btnPrev.classList.add('md:nw-block');
                btnPrev.classList.remove('lg:nw-hidden');
                btnPrev.classList.add('lg:nw-block');
            }
            if (mainCarousel.selectedScrollSnap() ===  dotsArray.length - 1 ) {
                btnNext.classList.remove('md:nw-block');
                btnNext.classList.add('md:nw-hidden');
            } else {
                btnNext.classList.remove('md:nw-hidden');
                btnNext.classList.add('md:nw-block');

            }
        }

    });

    let adIsTriggered = -1;

    const onAdSlideInView = (mainCarousel) => {
        mainCarousel.slidesInView().forEach(function(el){
            if ((el !== 0 || el === 5 || el % 5 === .2) && adIsTriggered === -1) {
                const check = mainCarousel.slideNodes()[el].querySelector('.em_ads_box_dynamic_remove > div');
                try {
                    if (check) { // @ts-ignore
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
// Initialisiere die Slider beim Laden der Seite
document.addEventListener('DOMContentLoaded', initSliders);