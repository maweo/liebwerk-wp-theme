import Glide from '@glidejs/glide';

export const initElementsGrid = () => {
  const elementsGridElements = document.querySelectorAll('.elements-grid__slider');

  elementsGridElements.forEach((elementsGlider) => {
    const elementsGliderObject = new Glide(elementsGlider, {
      type: 'carousel',
      perView: 1,
      gap: 5,
      startAt: 0,
      animationDuration: 400,
      animationTimingFunc: 'cubic-bezier(0.165, 0.840, 0.440, 1.000)',
    });

    document.querySelectorAll('.elements-grid__slider-arrow').forEach((glideArrow) => {
      glideArrow.addEventListener('click', function () {
        elementsGliderObject.go(glideArrow.dataset.glideDir);
      });
    });

    elementsGliderObject.mount();
  });
};