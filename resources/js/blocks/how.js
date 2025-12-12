document.addEventListener('DOMContentLoaded', () => {
  const howSection = document.querySelector('#how-cards');
  if (!howSection) {
    return;
  }

  const cards = howSection.querySelectorAll('.how-card');
  const imagesLeft = howSection.querySelectorAll('.how-images-left .how-image');
  const imagesRight = howSection.querySelectorAll('.how-images-right .how-image2');

  cards.forEach(card => {
    card.addEventListener('click', () => {
      const selectedIndex = card.getAttribute('data-index');

      // Zaktualizuj aktywną kartę
      cards.forEach(c => c.classList.remove('active'));
      card.classList.add('active');

      // Pokaż odpowiednie obrazy i ukryj resztę
      imagesLeft.forEach(img => {
        if (img.getAttribute('data-index') === selectedIndex) {
          img.classList.remove('opacity-0');
          img.classList.add('opacity-100');
        } else {
          img.classList.remove('opacity-100');
          img.classList.add('opacity-0');
        }
      });

      imagesRight.forEach(img => {
        if (img.getAttribute('data-index') === selectedIndex) {
          img.classList.remove('opacity-0');
          img.classList.add('opacity-100');
        } else {
          img.classList.remove('opacity-100');
          img.classList.add('opacity-0');
        }
      });
    });
  });
});