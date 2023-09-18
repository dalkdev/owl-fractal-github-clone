import GLightbox from '../../../node_modules/glightbox/src/js/glightbox';

export function initGLightBox()
{
    const galleryLightbox = GLightbox({
        selector: '.nw-gallery-lightbox',
        touchNavigation: true,
        loop: true,
    });

    const articleImage = GLightbox({
        selector: '.nw-article-image',
        touchNavigation: false,
        loop: false
    });
}
