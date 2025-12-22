import Swiper from 'swiper';
// Jeśli Twój bundler nie obsługuje automatycznie CSS z JS, upewnij się, że importujesz go w głównym pliku CSS/SCSS.
// import 'swiper/css'; 

const initCategorySlider = () => {
  const swiperContainer = document.querySelector('.category-swiper');

  if (!swiperContainer) {
    return;
  }

  new Swiper(swiperContainer, {
    slidesPerView: 'auto',
    spaceBetween: 16,
    slidesPerGroup: 1,
    longSwipes: false, // Kluczowa zmiana: wyłącza "rzucanie" suwakiem
    slideToClickedSlide: true, // Opcjonalnie: pozwala kliknąć slajd, aby go wyśrodkować
  });
};

// Uruchom przy ładowaniu strony
if (document.readyState === 'complete') {
  initCategorySlider();
} else {
  document.addEventListener('DOMContentLoaded', initCategorySlider);
}