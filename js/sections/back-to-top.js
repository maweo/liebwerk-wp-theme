export function backToTop() {
  const backToTopButton = document.querySelector('.back-to-top');

  function toggleBackToTopButton() {
    if (backToTopButton) {
      const showButton = window.scrollY >= 500;

      backToTopButton.style.transform = showButton ? 'translateY(0)' : 'translateY(75px)';
      backToTopButton.style.opacity = showButton ? '1' : '0';
    }
  }

  if (backToTopButton) {
    backToTopButton.addEventListener('click', () => {
      window.scrollTo({
        top: 0,
        behavior: 'smooth',
      });
    });

    toggleBackToTopButton();

    window.addEventListener('scroll', toggleBackToTopButton);
  }
}
