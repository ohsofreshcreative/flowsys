const initializeCalculator = () => {
  const calculatorBlock = document.getElementById('calculator-block');
  if (!calculatorBlock || calculatorBlock.dataset.initialized === 'true') {
    return;
  }
  calculatorBlock.dataset.initialized = 'true';

  const serviceCheckboxes = calculatorBlock.querySelectorAll('input[name="selected_service[]"]');
  const subsidyCheckboxes = calculatorBlock.querySelectorAll('input[name="subsidies[]"]');

  const summary = {
    services: document.getElementById('summary-services'),
    areaValue: document.getElementById('summary-area-value'),
    floorsValue: document.getElementById('summary-floors-value'),
    roomsValue: document.getElementById('summary-rooms-value'),
    subsidies: document.getElementById('summary-subsidies'),
    cost: document.getElementById('summary-cost'),
  };

  const updateSummary = () => {
    const areaInput = calculatorBlock.querySelector('input[name="total-area"]');
    const floorsInput = calculatorBlock.querySelector('input[name="floors"]');
    const roomsInput = calculatorBlock.querySelector('input[name="rooms"]');
    const summaryInput = calculatorBlock.querySelector('input[name="summary-data"]');

    const area = parseFloat(areaInput?.value) || 0;
    const floors = parseInt(floorsInput?.value) || 0;
    const rooms = parseInt(roomsInput?.value) || 0;

    let totalCost = 0;
    const selectedServices = [];

    serviceCheckboxes.forEach(checkbox => {
      const label = document.querySelector(`label[for="${checkbox.id}"]`);
      if (label) {
        const dot = label.querySelector('.indicator-dot');
        if (dot) dot.classList.toggle('opacity-100', checkbox.checked);
      }

      if (checkbox.checked) {
        selectedServices.push(checkbox.value);
        const costType = checkbox.dataset.costType;
        const baseCost = parseFloat(checkbox.dataset.baseCost) || 0;
        const perMeterCost = parseFloat(checkbox.dataset.perMeterCost) || 0;
        const perRoomCost = parseFloat(checkbox.dataset.perRoomCost) || 0;

        let serviceCost = 0;
        
        // NOWA LOGIKA OBLICZENIOWA
        switch (costType) {
          case 'fixed': // Tylko koszt stały (np. Fotowoltaika)
            serviceCost = baseCost;
            break;
          case 'per_meter': // Koszt zależny od powierzchni (np. Podłogówka)
            serviceCost = area * perMeterCost;
            break;

          case 'per_room': // Koszt zależny od liczby pokoi (np. Klimatyzacja)
            serviceCost = rooms * perRoomCost;
            break;
          
          case 'hybrid': // Koszt mieszany (np. Pompa ciepła, Hydraulika)
            serviceCost = baseCost + (area * perMeterCost) + (rooms * perRoomCost);
            break;
        }
        totalCost += serviceCost;
      }
    });

    // Aktualizacja podsumowania wizualnego
    summary.services.innerHTML = selectedServices.length > 0 ? selectedServices.join('<br>') : 'Brak';
    summary.areaValue.textContent = area > 0 ? `${area} m²` : '';
    summary.floorsValue.textContent = floors > 0 ? floors : '';
    summary.roomsValue.textContent = rooms > 0 ? rooms : '';
    
    const selectedSubsidies = Array.from(subsidyCheckboxes).filter(cb => cb.checked).map(cb => cb.value);
    summary.subsidies.innerHTML = selectedSubsidies.length > 0 ? selectedSubsidies.join('<br>') : 'Brak';

    const formattedCost = `${Math.round(totalCost).toLocaleString('pl-PL')} zł`;
    summary.cost.textContent = formattedCost;

    // Wypełnienie ukrytego pola
    if (summaryInput) {
      let summaryContent = `PODSUMOWANIE:\nUsługi: ${selectedServices.join(', ') || 'Brak'}\nPowierzchnia: ${area} m²\nKondygnacje: ${floors}\nPomieszczenia: ${rooms}\nDofinansowania: ${selectedSubsidies.join(', ') || 'Brak'}\n\nKOSZT: ${formattedCost}`;
      summaryInput.value = summaryContent;
    }
  };

  calculatorBlock.addEventListener('input', updateSummary);
  calculatorBlock.addEventListener('change', updateSummary);
  updateSummary();
};

const setupCalculator = () => {
    const cf7Form = document.querySelector('#calculator-block .wpcf7-form');
    if (cf7Form && cf7Form.classList.contains('init')) {
        initializeCalculator();
    } else {
        document.addEventListener('wpcf7init', initializeCalculator, { once: true });
    }
};

document.addEventListener('DOMContentLoaded', setupCalculator);