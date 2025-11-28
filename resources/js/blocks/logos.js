import Swiper from 'swiper';
import { Autoplay } from 'swiper/modules';

import 'swiper/css';

const initLogosSwiper = () => {
  const logosSlider = document.querySelector('.logos-swiper');
  if (!logosSlider) {
    return;
  }

  new Swiper(logosSlider, {
    modules: [Autoplay],
    loop: false,
    freeMode: true,
    slidesPerView: 'auto',
    spaceBetween: 60,
    autoplay: {
      delay: 0,
      disableOnInteraction: false,
      pauseOnMouseEnter: true,
    },
    speed: 4000,
  });

  // KROK 2: Usuń ręczne event listenery, ponieważ nie są już potrzebne.
};

document.addEventListener('DOMContentLoaded', initLogosSwiper);

