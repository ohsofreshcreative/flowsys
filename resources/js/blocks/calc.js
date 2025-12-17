document.addEventListener('DOMContentLoaded', () => {
  const calculatorApp = document.getElementById('calculator-app');
  if (!calculatorApp) {
    // Jeśli nie ma elementu kalkulatora, nic więcej nie rób.
    return;
  }

  console.log('[Kalkulator] Inicjalizacja...');

  // 1. SPRAWDZENIE DANYCH
  if (typeof calculatorData === 'undefined' || !calculatorData.services) {
    console.error('[Kalkulator] BŁĄD KRYTYCZNY: Dane cennika (calculatorData) nie istnieją. Sprawdź `wp_add_inline_script` w `app/Blocks/calc.php`.');
    return;
  }
  console.log('[Kalkulator] Dane cennika załadowane:', calculatorData.services);

  // 2. PRZYPISANIE ELEMENTÓW
  const pricing = calculatorData.services;
  const areaInput = document.getElementById('calc-area');
  const roomsInput = document.getElementById('calc-rooms');
  const summaryCostEl = document.getElementById('summary-cost');
  const summaryServicesEl = document.getElementById('summary-services');

  if (!areaInput || !roomsInput || !summaryCostEl || !summaryServicesEl) {
    console.error('[Kalkulator] BŁĄD KRYTYCZNY: Brakuje podstawowych elementów HTML (np. #calc-area, #summary-cost). Sprawdź ID w formularzu CF7.');
    return;
  }

  // 3. GŁÓWNA FUNKCJA PRZELICZAJĄCA
  function calculateAndRender() {
    console.log('%c--- Przeliczanie ---', 'color: yellow; background: #333;');
    let totalCost = 0;
    const area = parseFloat(areaInput.value) || 0;
    const rooms = parseInt(roomsInput.value) || 0;
    let summaryServicesText = '<ul>';

    const selectedServices = calculatorApp.querySelectorAll('input[name="zainteresowania[]"]:checked');
    console.log(`Znaleziono zaznaczonych usług: ${selectedServices.length}`);

    if (selectedServices.length === 0) {
        console.log('Brak zaznaczonych usług. Koszt = 0.');
    }

    selectedServices.forEach(serviceCheckbox => {
      const serviceTitle = serviceCheckbox.value;
      console.log(`%cPrzetwarzam: "${serviceTitle}"`, 'color: blue; font-weight: bold;');

      const serviceData = pricing.find(p => p.title.trim() === serviceTitle.trim());

      if (!serviceData) {
        console.warn(`%cOSTRZEŻENIE: Nie znaleziono danych cennika dla "${serviceTitle}". Sprawdź, czy nazwy w ACF i formularzu są identyczne.`, 'color: orange;');
        return; // przejdź do następnej usługi
      }

      let serviceCost = 0;
      console.log(` > Typ kalkulacji: ${serviceData.calculation_type}`);
      console.log(` > Podana powierzchnia: ${area} m², Pokoje: ${rooms}`);

      switch (serviceData.calculation_type) {
        case 'area_tiered':
          if (!serviceData.area_tiers || serviceData.area_tiers.length === 0) { console.warn(' > Brak zdefiniowanych progów `area_tiers`'); break; }
          const areaTier = serviceData.area_tiers.find(t => area >= parseFloat(t.from_area) && area <= parseFloat(t.to_area));
          if (areaTier) {
            serviceCost = area * parseFloat(areaTier.price_per_meter);
            console.log(` > Znaleziono próg (${areaTier.from_area}-${areaTier.to_area} m²). Koszt usługi: ${serviceCost.toFixed(2)} zł`);
          } else {
            console.log(' > Nie dopasowano żadnego progu cenowego dla podanej powierzchni.');
          }
          break;

        case 'fixed_tiered':
          if (!serviceData.fixed_tiers || serviceData.fixed_tiers.length === 0) { console.warn(' > Brak zdefiniowanych progów `fixed_tiers`'); break; }
          const fixedTier = serviceData.fixed_tiers.find(t => area >= parseFloat(t.from_area) && area <= parseFloat(t.to_area));
          if (fixedTier) {
            serviceCost = parseFloat(fixedTier.price);
            console.log(` > Znaleziono próg (${fixedTier.from_area}-${fixedTier.to_area} m²). Koszt usługi: ${serviceCost.toFixed(2)} zł`);
          } else {
            console.log(' > Nie dopasowano żadnego progu cenowego dla podanej powierzchni.');
          }
          break;

        case 'per_room':
          serviceCost = rooms * parseFloat(serviceData.price_per_room);
          console.log(` > Ilość pokoi: ${rooms}. Koszt usługi: ${serviceCost.toFixed(2)} zł`);
          break;
        
        default:
            console.log(` > Nieznany typ kalkulacji: "${serviceData.calculation_type}" lub brak dopasowania.`);
      }

      if (serviceCost > 0) {
        totalCost += serviceCost;
        summaryServicesText += `<li>${serviceTitle}: <strong>od ${serviceCost.toFixed(0)} zł</strong></li>`;
      }
    });

    summaryServicesText += '</ul>';
    
    console.log(`%c--- KOSZT CAŁKOWITY: ${totalCost.toFixed(2)} zł ---`, 'color: green; font-size: 14px;');

    summaryServicesEl.innerHTML = summaryServicesText;
    summaryCostEl.textContent = `od ${totalCost.toFixed(0)} zł`;
  }

  // 4. NASŁUCHIWANIE NA ZMIANY
  calculatorApp.addEventListener('input', calculateAndRender);
  
  // Pierwsze wywołanie, aby zainicjować stan (np. gdy formularz ma już jakieś wartości)
  calculateAndRender();
});