/*--- GŁÓWNE IMPORTY ---*/
// Importujemy tylko Alpine, resztę bibliotek (GSAP) ładujemy globalnie

import Alpine from 'alpinejs';

// Importy zasobów dla Vite (np. obrazy, fonty)
import.meta.glob(['../images/**', '../fonts/**']);

// Twoje niestandardowe moduły JS
import './menubar.js';
import './footer-accordion.js';
import './swiper.js';
import './blocks/categories.js';
import './blocks/logos.js';
import './blocks/map.js';

/*--- INICJALIZACJA BIBLIOTEK ---*/
// Uruchom Alpine.js
window.Alpine = Alpine;
Alpine.start();


/*--- SKRYPTY URUCHAMIANE PO ZAŁADOWANIU STRONY ---*/

document.addEventListener('DOMContentLoaded', function () {

  // Sprawdzenie, czy globalny GSAP istnieje. Jeśli nie, nic nie robimy, aby uniknąć błędów.
  if (typeof gsap === 'undefined') {
    console.error('GSAP nie został załadowany globalnie. Sprawdź plik app/setup.php lub functions.php');
    return;
  }

  // --- TWOJE ISTNIEJĄCE ANIMACJE GSAP (TERAZ POWINNY DZIAŁAĆ) ---
  gsap.utils.toArray("[data-gsap-anim='section']").forEach((section) => {
    const standardImages = section.querySelectorAll("[data-gsap-element='img']");
    standardImages.forEach((img) => {
      gsap.from(img, {
        opacity: 0,
        y: 50,
        filter: 'blur(15px)',
        duration: 1,
        ease: 'power2.out',
        scrollTrigger: {
          trigger: img,
          start: 'top 90%',
          toggleActions: 'play none none none',
          once: true,
        },
      });
    });

    const otherElements = section.querySelectorAll(
      "[data-gsap-element]:not([data-gsap-element*='img']):not([data-gsap-element='stagger'])"
    );
    otherElements.forEach((element, index) => {
      gsap.from(element, {
        opacity: 0,
        y: 50,
        filter: 'blur(15px)',
        duration: 1,
        ease: 'power2.out',
        delay: index * 0.1,
        scrollTrigger: {
          trigger: element,
          start: 'top 90%',
          toggleActions: 'play none none none',
          once: true,
        },
      });
    });

    const staggerElements = section.querySelectorAll("[data-gsap-element='stagger']");
    if (staggerElements.length > 0) {
      const sorted = [...staggerElements].sort((a, b) => {
        const getDelay = (el) => {
          const attr = el.getAttribute('data-gsap-edit');
          return (attr && attr.startsWith('delay-')) ? parseFloat(attr.replace('delay-', '')) || 0 : 0;
        };
        return getDelay(a) - getDelay(b);
      });

      gsap.set(sorted, { opacity: 0, y: 50 });

      gsap.to(sorted, {
        opacity: 1,
        y: 0,
        filter: 'blur(0px)',
        duration: 1,
        ease: 'power2.out',
        stagger: { amount: 1.5, each: 0.1 },
        scrollTrigger: {
          trigger: section,
          start: 'top 80%',
          toggleActions: 'play none none none',
          once: true,
        },
      });
    }
  });
});