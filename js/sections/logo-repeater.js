export function copyElement() {
  document.addEventListener('DOMContentLoaded', copyElement);

  const logoSlide = document.querySelector('.logo-repeater__logos-slide');
  const logosContainer = document.querySelector('.logo-repeater__logos');

  if (logoSlide && logosContainer) {
    const copy = logoSlide.cloneNode(true);
    logosContainer.appendChild(copy);
  }
}
