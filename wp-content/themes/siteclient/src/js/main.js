const donateSection = document.body.querySelector('.js-qr-section');
const donateButton = document.body.querySelector('.js-qr-section-button');


if (donateButton instanceof HTMLElement && donateSection instanceof HTMLElement) {
  donateButton.addEventListener('click', () => {
    console.log('test');
    donateSection.classList.toggle('qr-section--hide');
  });
}
