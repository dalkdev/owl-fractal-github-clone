import EmblaCarousel from 'embla-carousel';

export function initNewsticker() {
  const wrap = document.querySelector('.embla-newsticker');

  if (wrap == null) return;

  const viewPort = wrap.querySelector('.embla-newsticker__viewport');
  const embla = EmblaCarousel(viewPort, {
    align: 'start',
    slidesToScroll: 1,
    skipSnaps: true,
  });

  return embla;
}
