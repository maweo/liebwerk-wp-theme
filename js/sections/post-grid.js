export const initPostGrid = () => {
  document.addEventListener('DOMContentLoaded', function () {
    const postGrid = document.querySelector('.post-grid__posts');
    const loadMoreButton = document.querySelector('.post-grid__load-more-button');

    loadMoreButton?.addEventListener('click', function () {
      const data = new FormData();
      data.append('action', 'load_posts_by_ajax');
      data.append('currentPage', parseInt(postGrid.dataset.page) + 1);
      data.append('postsPerPage', parseInt(postGrid.dataset.postsPerPage));
      data.append('postType', postGrid.dataset.postType);
      data.append('security', postGrid.dataset.security);

      fetch(postGrid.dataset.ajaxurl, {
        method: 'POST',
        body: data,
        credentials: 'same-origin',
      })
        .then((response) => response.text())
        .then((data) => {
          postGrid.querySelector('.post-grid__post-container').insertAdjacentHTML('beforeend', data);

          const currentPage = parseInt(postGrid.dataset.page) + 1;
          const maxPages = parseInt(postGrid.dataset.maxPages);
          if (currentPage >= maxPages) {
            loadMoreButton.style.display = 'none';
          }
          postGrid.dataset.page = currentPage;
        })
        .catch((error) => console.error('Error:', error));
    });
  });
};
