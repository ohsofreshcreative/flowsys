import Swiper from 'swiper';
// Zaimportuj potrzebne moduły JS
import { Navigation } from 'swiper/modules';

document.addEventListener('DOMContentLoaded', () => {
  const swipers = document.querySelectorAll('.offer-swiper');

  if (swipers.length > 0) {
    swipers.forEach((container) => {
      const swiper = new Swiper(container, {
        // KROK 1: Zarejestruj moduł nawigacji.
        modules: [Navigation],

        // KROK 2: Wyłącz wbudowaną pętlę, aby uniknąć przeskoków.
        loop: false,

        slidesPerView: 'auto', // Pozostaw 'auto' dla elastyczności
        spaceBetween: 0,

        // KROK 3: Skonfiguruj freeMode, aby nie przyciągał do slajdów.
        freeMode: {
          enabled: true,
          sticky: false, // Zapobiega przyciąganiu do slajdów.
          momentum: false, // Zapobiega dodatkowemu ruchowi po przeciągnięciu.
        },

        navigation: {
          nextEl: ".__next",
          prevEl: ".__prev",
        },
        breakpoints: {
          0: { slidesPerView: 1.2, spaceBetween: 20 },
          768: { slidesPerView: 2.5, spaceBetween: 30 },
          1024: { slidesPerView: 3.2, spaceBetween: 32 },
        },
        on: {
          init: function () {
            updateFirstVisibleSlide(this, container);
          },
          slideChange: function () {
            updateFirstVisibleSlide(this, container);
          },
        },
      });

      // Helper function to update first visible slide
      function updateFirstVisibleSlide(swiperInstance, swiperContainer) {
        const allSlides = swiperContainer.querySelectorAll('.swiper-slide');
        allSlides.forEach((slide) => {
          slide.classList.remove('first-visible-slide');
        });

        if (swiperInstance.slides[swiperInstance.activeIndex]) {
          swiperInstance.slides[swiperInstance.activeIndex].classList.add(
            'first-visible-slide'
          );
        }
      }
    });
  }
});