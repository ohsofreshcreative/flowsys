<?php

namespace App\Options;

use Log1x\AcfComposer\Options as Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Calculator extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Kalkulator';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Ustawienia Kalkulatora | Opcje';

    /**
     * The option page field group.
     *
     * @return array
     */
    public function fields()
    {
        $calculator = new FieldsBuilder('calculator_settings');

        $calculator
            ->addTab('Usługi i Cenniki')
                ->addRepeater('services', [
                    'label' => 'Usługi w kalkulatorze',
                    'instructions' => 'Dodaj usługi, które pojawią się jako kafelki do wyboru.',
                    'button_label' => 'Dodaj usługę',
                    'layout' => 'block'
                ])
                    ->addImage('icon', [
                        'label' => 'Ikona',
                        'return_format' => 'array',
                        'required' => 1,
                    ])
                    ->addText('title', [
                        'label' => 'Nazwa usługi',
                        'required' => 1,
                    ])
                    ->addSelect('cost_type', [
                        'label' => 'Typ kosztu',
                        'choices' => [
                            'fixed' => 'Koszt stały (Fixed)',
                            'per_meter' => 'Za metr kwadratowy (Per Meter)',
                            'per_room' => 'Za pomieszczenie (Per Room)',
                            'hybrid' => 'Mieszany (Hybrid)',
                        ],
                        'default_value' => 'per_meter',
                        'required' => 1,
                    ])
                    ->addNumber('base_cost', [
                        'label' => 'Koszt bazowy',
                        'instructions' => 'Używany przy typie "Fixed" i "Hybrid".',
                        'default_value' => 0,
                    ])
                    ->addNumber('per_meter_cost', [
                        'label' => 'Koszt za metr kwadratowy',
                        'instructions' => 'Używany przy typie "Per Meter" i "Hybrid".',
                        'default_value' => 0,
                    ])
                    ->addNumber('per_room_cost', [
                        'label' => 'Koszt za pomieszczenie',
                        'instructions' => 'Używany przy typie "Per Room" i "Hybrid".',
                        'default_value' => 0,
                    ])
                ->endRepeater()

            ->addTab('Dofinansowania')
                ->addRepeater('subsidies', [
                    'label' => 'Dostępne dofinansowania',
                    'instructions' => 'Dodaj opcje, które pojawią się jako checkboxy.',
                    'button_label' => 'Dodaj dofinansowanie',
                ])
                    ->addText('subsidy_name', [
                        'label' => 'Nazwa (np. Moje Ciepło)',
                        'required' => 1,
                    ])
                ->endRepeater();

        return $calculator->build();
    }
}