export const initNav = () => {
  let clickCount = 0;

  const dropdownItems = document.querySelectorAll('.nav-desktop__links li');

  if ('ontouchstart' in document.documentElement) {
    dropdownItems.forEach(function (item) {
      const dropdown = item.querySelector('.nav-desktop__dropdown');
      if (dropdown) {
        item.addEventListener('click', function (event) {
          event.preventDefault();

          clickCount++;

          if (clickCount === 1) {
            // First click: Open the dropdown without following the link
            dropdown.style.display = 'block';
          } else {
            // Second click: Follow the link
            let link = item.querySelector('a').getAttribute('href');
            window.location.href = link;
          }
        });
      }
    });
  }
};
