document.addEventListener('DOMContentLoaded', () => {
  const galleries = document.querySelectorAll('.gallery_container');

  galleries.forEach(gallery => {
    const mainView = gallery.querySelector('.gallery__main');
    const mainImage = mainView.querySelector('.gallery__main-image');
    const closeButton = mainView.querySelector('.close-button');
    const items = gallery.querySelectorAll('.gallery__item');

    items.forEach(item => {
      item.addEventListener('click', () => {
        const img = item.querySelector('img');
        if (!img) return;

        mainImage.src = img.dataset.full;
        mainImage.alt = img.alt;

        mainView.style.display = 'flex';
        gallery.classList.add('gallery--active');
      });
    });

    closeButton.addEventListener('click', () => {
      mainView.style.display = 'none';
      gallery.classList.remove('gallery--active');
    });
  });
});
