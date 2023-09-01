import EmblaCarousel from 'embla-carousel';
import {setupDotBtns, generateDotBtns, selectDotBtn} from './dotButtons';

let isScrolling = false;

export function initSliders() {
    const sliderWrapperNodes = document.querySelectorAll('.slider');
    
    sliderWrapperNodes.forEach(sliderWrapperNode => {
        initSlider(sliderWrapperNode as HTMLElement);
    });
}

export function initLightBox() {
    const sliderImages = document.querySelectorAll('.slider .embla__slide__img');
    const closeButton = document.querySelector('.close-lightbox') as HTMLElement;
    const prevButton = document.querySelector('.prevButton') as HTMLElement;
    const nextButton = document.querySelector('.nextButton') as HTMLElement;
    Array.from(sliderImages).forEach((sliderImage) => {
        sliderImage.addEventListener('click', () => {
            console.log(isScrolling);
            if (isScrolling === true) return;
            const idx = Array.from(sliderImages).indexOf(sliderImage);
            currentSlide(idx + 1);
            showLightBox('light1');
        });
    });
    closeButton.addEventListener('click', () => {
        closeLightbox('light1');
    });
    prevButton.addEventListener('click', () => {
        showSlides(slideIndex -= 1);
    });

    nextButton.addEventListener('click', () => {
        showSlides(slideIndex += 1);
    });
}

function showLightBox(id: string) {
    const modal = document.getElementById(id);
    if (modal) {
        modal.style.display = 'block';
    }
}

function closeLightbox(id: string) {
    const element = document.getElementById(id);
    if (element) {
        element.style.display = 'none';
    }
}

function currentSlide(n: number) {
    showSlides(slideIndex = n);
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
        isScrolling = true;
    });

    mainCarousel.on('settle', () => {
        isScrolling = false;
    });


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
