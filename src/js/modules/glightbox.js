import GLightbox from '../../../node_modules/glightbox/src/js/glightbox';

export function initGLightBox()
{

    const galleryLightbox = GLightbox({
        touchNavigation: true,
        loop: true,
        moreText: 'mehr...',
        moreLength: 0,
        draggable: true,
        arrows: true
    });


    const lightboxes = document.querySelectorAll('.nw-gallery-lightbox');
    const lightboxes_amount = lightboxes.length;

    const adcontent = document.querySelector('#nw_ad');
    let elements = [];

    var lightboxDescription = GLightbox({
        selector: '.nw-gallery-lightbox',
        moreText: 'mehr...',
    });
    galleryLightbox.setElements(elements);

    const articleImage = GLightbox({
        selector: '.nw-article-image',
        touchNavigation: true,
        loop: false,
        moreText: 'mehr...',
        moreLength: 0,
        draggable: true,
        arrows: true
    });
}
