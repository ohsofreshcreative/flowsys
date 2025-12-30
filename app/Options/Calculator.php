<?php

namespace App\Options;

use Log1x\AcfComposer\Options as Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Calculator extends Field
{
    public $name = 'Kalkulator';
    public $title = 'Ustawienia Kalkulatora | Opcje';

    public function fields()
    {
        $calculator = new FieldsBuilder('calculator_settings');

        $calculator
            ->addTab('Usługi i Cenniki')
                ->addRepeater('services', [
                    'label' => 'Usługi w kalkulatorze',
                    'button_label' => 'Dodaj usługę',
                    'layout' => 'block'
                ])
                    ->addImage('icon', ['label' => 'Ikona', 'return_format' => 'array'])
                    ->addText('title', ['label' => 'Nazwa usługi'])
                    ->addSelect('cost_type', [
                        'label' => 'Typ kosztu',
                        'choices' => [
                            'fixed' => 'Stały (fixed)',
                            'per_meter' => 'Za metr (per_meter)',
                            'per_room' => 'Za pokój (per_room)',
                            'hybrid' => 'Mieszany (hybrid)',
                            'fixed_tiered' => 'Stały z progami (fixed_tiered)', // NOWY TYP
                            'per_meter_tiered' => 'Za metr z progami (per_meter_tiered)', // NOWY TYP
                        ],
                        'default_value' => 'fixed',
                        'ui' => 1,
                    ])
                    
                    // --- Pola dla prostych typów kosztów ---
                    ->addNumber('base_cost', ['label' => 'Koszt stały (base_cost)', 'prepend' => 'zł'])->conditional('cost_type', '==', 'fixed')->or('cost_type', '==', 'hybrid')
                    ->addNumber('per_meter_cost', ['label' => 'Koszt za m² (per_meter_cost)', 'prepend' => 'zł'])->conditional('cost_type', '==', 'per_meter')->or('cost_type', '==', 'hybrid')
                    ->addNumber('per_room_cost', ['label' => 'Koszt za pokój (per_room_cost)', 'prepend' => 'zł'])->conditional('cost_type', '==', 'per_room')->or('cost_type', '==', 'hybrid')

                    // --- NOWE: Pola dla "Stały z progami" ---
                    ->addRepeater('fixed_tiers', [
                        'label' => 'Progi cenowe (dla kosztu stałego)',
                        'button_label' => 'Dodaj próg',
                        'layout' => 'table',
                    ])
                        ->conditional('cost_type', '==', 'fixed_tiered')
                        ->addNumber('min_area', ['label' => 'Powierzchnia OD (m²)', 'default_value' => 0])
                        ->addNumber('max_area', ['label' => 'Powierzchnia DO (m²)', 'default_value' => 100])
                        ->addNumber('price', ['label' => 'Cena stała "od"', 'prepend' => 'zł'])
                    ->endRepeater()

                    // --- NOWE: Pola dla "Za metr z progami" ---
                    ->addRepeater('per_meter_tiers', [
                        'label' => 'Progi cenowe (dla kosztu za m²)',
                        'button_label' => 'Dodaj próg',
                        'layout' => 'table',
                    ])
                        ->conditional('cost_type', '==', 'per_meter_tiered')
                        ->addNumber('min_area', ['label' => 'Powierzchnia OD (m²)', 'default_value' => 0])
                        ->addNumber('max_area', ['label' => 'Powierzchnia DO (m²)', 'default_value' => 100])
                        ->addNumber('price_per_meter', ['label' => 'Cena za m²', 'prepend' => 'zł'])
                    ->endRepeater()

                ->endRepeater()

            ->addTab('Dofinansowania')
                ->addRepeater('subsidies', ['label' => 'Dostępne dofinansowania', 'button_label' => 'Dodaj dofinansowanie', 'layout' => 'block'])
                    ->addText('subsidy_name', ['label' => 'Nazwa (np. Moje Ciepło)'])
                ->endRepeater();

        return $calculator->build();
    }
}