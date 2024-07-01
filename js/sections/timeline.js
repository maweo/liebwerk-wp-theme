import Glide from '@glidejs/glide';

export const initTimeline = () => {
  const timelineSliderElements = document.querySelectorAll('.timeline__elements');

  timelineSliderElements.forEach((timelineGlider) => {
    const timelineGliderObject = new Glide(timelineGlider, {
      type: 'carousel',
      perView: 3,
      gap: 64,
      startAt: 0,
      animationDuration: 400,
      animationTimingFunc: 'cubic-bezier(0.165, 0.840, 0.440, 1.000)',
      breakpoints: {
        992: {
          perView: 2,
          gap: 56,
        },
        767: {
          perView: 1,
          gap: 5,
        },
      },
    });

    document.querySelectorAll('.timeline__elements-arrow').forEach((glideArrow) => {
      glideArrow.addEventListener('click', function () {
        timelineGliderObject.go(glideArrow.dataset.glideDir);
      });
    });

    timelineGliderObject.mount();
  });
};
