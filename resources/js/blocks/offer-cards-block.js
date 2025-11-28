/**
 * Funkcja wyzwalająca animację CSS i dynamicznie ustawiająca siatkę (grid).
 */
function animateCards(panel) {
  if (!panel) return;

  const grid = panel.querySelector('.__grid');
  const cards = panel.querySelectorAll('.__card');

  // --- NOWA LOGIKA DYNAMICZNEJ SIATKI ---
  if (grid) {
    const count = cards.length;
    
    // Lista możliwych klas kolumn, które będziemy usuwać
    const columnClassesToRemove = ['md:grid-cols-2', 'md:grid-cols-3', 'md:grid-cols-4', 'md:grid-cols-5'];
    grid.classList.remove(...columnClassesToRemove);

    // Domyślna liczba kolumn (np. dla 1 lub >5 kart)
    let newClass = 'md:grid-cols-3'; 

    if (count >= 2 && count <= 5) {
      // Jeśli kart jest od 2 do 5, użyj ich liczby do ustawienia siatki
      newClass = `md:grid-cols-${count}`;
    }
    
    grid.classList.add(newClass);
    console.log(`Ustawiono siatkę na: ${newClass} dla ${count} kart.`);
  }
  // --- KONIEC LOGIKI SIATKI ---


  // Logika animacji (bez zmian)
  cards.forEach((card, index) => {
    card.classList.remove('is-visible');
    card.style.transitionDelay = `${index * 100}ms`;
    setTimeout(() => {
      card.classList.add('is-visible');
    }, 20); 
  });
}

/**
 * Obsługa bloków z zakładkami (Tabs) dla ofert.
 */
function initializeOfferTabs(blockRoot) {
  const nav = blockRoot.querySelector('.offer-tabs__nav');
  const tabs = blockRoot.querySelectorAll('.offer-tab');
  const panels = blockRoot.querySelectorAll('.offer-tabpanel');

  if (!nav || tabs.length === 0 || panels.length === 0) {
    return;
  }

  // Animuj karty w początkowo aktywnym panelu
  const initialActivePanel = blockRoot.querySelector('.offer-tabpanel:not(.hidden)');
  if (initialActivePanel) {
    animateCards(initialActivePanel);
  }

  nav.addEventListener('click', (event) => {
    const tab = event.target.closest('.offer-tab');
    if (!tab || !nav.contains(tab) || tab.classList.contains('is-active')) {
      return;
    }

    tabs.forEach(t => {
      t.classList.remove('is-active');
      t.setAttribute('aria-selected', 'false');
    });
    tab.classList.add('is-active');
    tab.setAttribute('aria-selected', 'true');

    panels.forEach(panel => {
      panel.classList.add('hidden');
    });

    const targetPanelId = tab.getAttribute('aria-controls');
    const targetPanel = blockRoot.querySelector(`#${targetPanelId}`);
    
    if (targetPanel) {
      targetPanel.classList.remove('hidden');
      animateCards(targetPanel);
    }
  });
}

// Uruchomienie skryptu po załadowaniu DOM
document.addEventListener('DOMContentLoaded', () => {
  const allOfferTabBlocks = document.querySelectorAll('[data-offer-tabs-root]');
  allOfferTabBlocks.forEach(block => {
    initializeOfferTabs(block);
  });
});