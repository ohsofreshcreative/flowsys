document.addEventListener('DOMContentLoaded', function() {
  // --- SKRYPT DO PRZEWIJANIA ---
  const scrollArrows = document.querySelectorAll('.__scroll');
  scrollArrows.forEach(arrow => {
    arrow.addEventListener('click', function(event) {
      event.preventDefault();
      // Znajdź najbliższy kontener, który jest <div> lub <section>
      const currentContainer = this.closest('div, section');
      if (currentContainer) {
        const nextElement = currentContainer.nextElementSibling;
        if (nextElement) {
          const offset = 104; // Wysokość nagłówka
          const elementTopPosition = nextElement.getBoundingClientRect().top + window.scrollY;
          const targetPosition = elementTopPosition - offset;
          window.scrollTo({
            top: targetPosition,
            behavior: 'smooth'
          });
        }
      }
    });
  });
});