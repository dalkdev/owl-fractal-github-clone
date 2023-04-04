/*
    First step:
    sliderImages.forEach( sliderImage => {
        sliderImage.addEventListener('click' => {
            console.log(idx);
        }
    })

    Next step:
    sliderImages.forEach( sliderImage => {
        sliderImage.addEventListener('click' => {
            openModal(idx);
        }
    })

 */


import EmblaCarousel from 'embla-carousel';

export function initSliders() {
    const sliderWrapperNodes = document.querySelectorAll('.slider');


    sliderWrapperNodes.forEach(sliderWrapperNode => {
        initSlider(sliderWrapperNode as HTMLElement);
    });

}


function initSlider(wrapperNode: HTMLElement) {
    const counterCurrent = wrapperNode.querySelector('.slider--counter-current');
    const counterTotal = wrapperNode.querySelector('.slider--counter-total');
    const btnNext = wrapperNode.querySelector('.slider--button-next');
    const btnPrev = wrapperNode.querySelector('.slider--button-prev');


    const mainCarouselWrap = wrapperNode.querySelector('.embla--main-carousel');
    const mainCarouselView = mainCarouselWrap?.querySelector('.embla__viewport');
    const mainCarousel = EmblaCarousel(mainCarouselView as HTMLElement, {
        dragFree: true,
        containScroll: 'trimSnaps',
    })
    /* const sliderImages = document.getElementsByClassName('slider-Image'); */

    /*  Array.from(sliderImages).forEach((sliderImage, idx) => {
         sliderImage.addEventListener('click', () => {
             console.log(idx);
         });
     }); */
    /*  function openModal(id: string) {
         const modal = document.getElementById(id);
         if (modal) {
             modal.style.display = 'block';
         }
     }

     Array.from(sliderImages).forEach((sliderImage) => {
         sliderImage.addEventListener('click', () => {
             const id = sliderImage.dataset.id;
             openModal(id);
         });
     }); */
    /*     let isScrolling = false;


        mainCarousel.on('scroll', () => {
            isScrolling = true;
        })

        mainCarousel.on('settle', () => {
            isScrolling = false;
        });

        console.log("isScrolling: " + isScrolling); */

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
