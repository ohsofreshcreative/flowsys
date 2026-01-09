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
        let serviceCost = 0;

        switch (costType) {
          case 'fixed':
            serviceCost = parseFloat(checkbox.dataset.baseCost) || 0;
            break;
          case 'per_meter':
            serviceCost = area * (parseFloat(checkbox.dataset.perMeterCost) || 0);
            break;
          case 'per_room':
            serviceCost = rooms * (parseFloat(checkbox.dataset.perRoomCost) || 0);
            break;
          case 'hybrid':
            serviceCost = (parseFloat(checkbox.dataset.baseCost) || 0) +
                          (area * (parseFloat(checkbox.dataset.perMeterCost) || 0)) +
                          (rooms * (parseFloat(checkbox.dataset.perRoomCost) || 0));
            break;
          
          case 'fixed_tiered': {
            const tiersData = checkbox.dataset.fixedTiers;
            if (tiersData) {
              const tiers = JSON.parse(tiersData);
              const matchingTier = tiers.find(tier => {
                const min = parseFloat(tier.min_area);
                const max = parseFloat(tier.max_area);
                return area >= min && (!max || area <= max);
              });
              if (matchingTier) {
                serviceCost = parseFloat(matchingTier.price);
              }
            }
            break;
          }
            
          case 'per_meter_tiered': {
            const tiersData = checkbox.dataset.perMeterTiers;
            if (tiersData) {
              const tiers = JSON.parse(tiersData);
              const matchingTier = tiers.find(tier => {
                const min = parseFloat(tier.min_area);
                const max = parseFloat(tier.max_area);
                return area >= min && (!max || area <= max);
              });
              if (matchingTier) {
                serviceCost = area * parseFloat(matchingTier.price_per_meter);
              }
            }
            break;
          }
        }
        totalCost += serviceCost;
      }
    });

    // --- NOWA LOGIKA DLA DOFINANSOWAŃ ---
    const selectedSubsidies = Array.from(subsidyCheckboxes)
      .filter(cb => cb.checked)
      .map(cb => {
        const name = cb.value;
        const amount = parseFloat(cb.dataset.amount) || 0;
        return { name, amount };
      });

    // Aktualizacja podsumowania wizualnego
    summary.services.innerHTML = selectedServices.length > 0 ? selectedServices.join('<br>') : 'Brak';
    summary.areaValue.textContent = area > 0 ? `${area} m²` : '';
    summary.floorsValue.textContent = floors > 0 ? floors : '';
    summary.roomsValue.textContent = rooms > 0 ? rooms : '';
    
    // Formatowanie i wyświetlanie dofinansowań w nowym formacie
    if (selectedSubsidies.length > 0) {
      summary.subsidies.innerHTML = selectedSubsidies
        .map(sub => `-${sub.amount.toLocaleString('pl-PL')} zł (${sub.name})`)
        .join('<br>');
    } else {
      summary.subsidies.innerHTML = 'Brak';
    }

    const formattedCost = `${Math.round(totalCost).toLocaleString('pl-PL')} zł`;
    summary.cost.textContent = formattedCost;
    
    // Aktualizacja ukrytego pola z podsumowaniem (summaryInput)
    if (summaryInput) {
      const subsidiesSummaryText = selectedSubsidies.length > 0
        ? selectedSubsidies.map(sub => `-${sub.amount.toLocaleString('pl-PL')} zł (${sub.name})`).join(', ')
        : 'Brak';
      
      let summaryContent = `PODSUMOWANIE:\nUsługi: ${selectedServices.join(', ') || 'Brak'}\nPowierzchnia: ${area} m²\nKondygnacje: ${floors}\nPomieszczenia: ${rooms}\n\nSzacunkowy koszt: ${formattedCost}\nDofinansowania: ${subsidiesSummaryText}`;
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