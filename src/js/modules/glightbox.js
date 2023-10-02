import GLightbox from '../../../node_modules/glightbox/src/js/glightbox';

export function initGLightBox()
{
    const galleryLightbox = GLightbox({
        selector: '.nw-gallery-lightbox',
        touchNavigation: true,
        loop: true,
        moreText: 'mehr...'
    });

    const articleImage = GLightbox({
        selector: '.nw-article-image',
        touchNavigation: true,
        loop: false,
        moreText: 'mehr...'
    });
}
