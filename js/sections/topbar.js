export const initTopbar = () => {
  document.addEventListener('DOMContentLoaded', function () {
    const texts = document.querySelectorAll('.topbar__text');
    let currentIndex = 0;
    let intervalId;

    function showText(index) {
      texts.forEach((text, i) => {
        text.classList.remove('active');
        if (i === index) {
          setTimeout(() => {
            text.classList.add('active');
          }, 10); // Slight delay to ensure the transition happens
        }
      });
    }

    function rotateTexts() {
      showText(currentIndex);
      currentIndex = (currentIndex + 1) % texts.length;
    }

    function startRotation() {
      if (window.innerWidth <= 768) {
        if (!intervalId) {
          showText(currentIndex); // Show the first text initially
          intervalId = setInterval(rotateTexts, 2000); // Change every 2 seconds
        }
      } else {
        clearInterval(intervalId);
        intervalId = null;
        texts.forEach((text) => text.classList.remove('active')); // Clear active class on desktop
        texts.forEach((text, index) => {
          if (index === 0) {
            text.classList.add('active');
          }
        });
      }
    }

    startRotation(); // Initial check

    window.addEventListener('resize', function () {
      startRotation();
    });
  });
};
