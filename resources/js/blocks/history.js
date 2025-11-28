import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

const main = () => {
  const historySection = document.querySelector('.history');

  if (historySection) {
    gsap.to('.timeline-line', {
      scaleY: 1,
      scrollTrigger: {
        trigger: '.history .__cards',
        start: 'top center',
        end: 'bottom bottom-=200px', 
        scrub: 1.5, 
      },
    });
  }
};

window.addEventListener('load', main);