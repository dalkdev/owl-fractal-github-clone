import GLightbox from '../../../node_modules/glightbox/src/js/glightbox';

export function initGLightBox()
{

    const galleryLightbox = GLightbox({
        touchNavigation: true,
        loop: true,
        moreText: 'mehr...',
        moreLength: 0
    });


    const lightboxes = document.querySelectorAll('.nw-gallery-lightbox');
    const lightboxes_amount = lightboxes.length;
    const adcontent = document.querySelector('#nw_ad');
    let elements = [];

    lightboxes.forEach((lightbox, index) => {
        let el = {
            'href': lightbox.href,
            'type': 'image',
            'caption': lightbox.title
        }

        elements.push(el);

        lightbox.onclick = function(e)
        {
            e.preventDefault();
            galleryLightbox.openAt(index);
        };
    });


    galleryLightbox.setElements(elements);

    for(let i = 0; i < galleryLightbox.elements.length; i++)
    {
        if (i % 5 == 0 && i > 0)
        {
            galleryLightbox.insertSlide({
                content: '<p>Hier könnte Ihre Werbung stehen',
                width: '90vw'
            }, i);
        }
    }

    const articleImage = GLightbox({
        selector: '.nw-article-image',
        touchNavigation: true,
        loop: false,
        moreText: 'mehr...',
        moreLength: 0
    });
}
