import Glide from '@glidejs/glide';

export const initTestimonials = () => {
  const testimonialGliderElements = document.querySelectorAll('.testimonials');

  testimonialGliderElements.forEach((testimonialGlider) => {
    const testimonialGliderObject = new Glide(testimonialGlider, {
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
        },
      },
    });

    document.querySelectorAll('.testimonials__arrow').forEach((glideArrow) => {
      glideArrow.addEventListener('click', function () {
        testimonialGliderObject.go(glideArrow.dataset.glideDir);
      });
    });

    testimonialGliderObject.mount();
  });
};
