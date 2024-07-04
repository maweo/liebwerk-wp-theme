import Glide from '@glidejs/glide';

export const initProductSlider = () => {
  const gliderElements = document.querySelectorAll('.image-slider__wrapper');

  gliderElements.forEach((glider) => {
    const gliderObject = new Glide(glider, {
      type: 'carousel',
      perView: 3,
      gap: 24,
      startAt: 0,
      animationDuration: 400,
      animationTimingFunc: 'cubic-bezier(0.165, 0.840, 0.440, 1.000)',
      breakpoints: {
        1199: {
          perView: 2,
          gap: 18,
        },
        767: {
          perView: 1,
          gap: 5,
          peek: 20,
        },
      },
    });

    document.querySelectorAll('.image-slider__arrow').forEach((glideArrow) => {
      glideArrow.addEventListener('click', function () {
        gliderObject.go(glideArrow.dataset.glideDir);
      });
    });

    gliderObject.mount();
  });
};
