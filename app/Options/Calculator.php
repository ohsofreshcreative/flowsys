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
                'layout' => 'block',
            ])
                ->addImage('icon', ['label' => 'Ikona', 'return_format' => 'url'])
                ->addText('title', ['label' => 'Nazwa usługi'])
                ->addSelect('calculation_type', [
                    'label' => 'Typ kalkulacji',
                    'choices' => [
                        'area_tiered' => 'Cena progowa za m²',
                        'fixed_tiered' => 'Cena progowa stała',
                        'per_room' => 'Cena za pomieszczenie',
                        'package' => 'Pakiety do wyboru',
                    ],
                ])

                // --- Cennik progowy za m² (np. Ogrzewanie podłogowe, Instalacja elektryczna) ---
                ->addRepeater('area_tiers', [
                    'label' => 'Progi cenowe (za m²)',
                    'instructions' => 'Np. od 0 do 100m², cena 100zł/m². Kolejny próg: od 100 do 250m², cena 90zł/m².',
                    'button_label' => 'Dodaj próg',
                ])
                    ->conditional('calculation_type', '==', 'area_tiered')
                    ->addNumber('from_area', ['label' => 'Powierzchnia OD (m²)', 'default_value' => 0])
                    ->addNumber('to_area', ['label' => 'Powierzchnia DO (m²)', 'append' => 'm²'])
                    ->addNumber('price_per_meter', ['label' => 'Cena za m²', 'append' => 'zł'])
                ->endRepeater()

                // --- Cennik progowy stały (np. Pompa ciepła, Rekuperacja) ---
                ->addRepeater('fixed_tiers', [
                    'label' => 'Progi cenowe (stałe)',
                ])
                    ->conditional('calculation_type', '==', 'fixed_tiered')
                    ->addNumber('from_area', ['label' => 'Powierzchnia OD (m²)', 'default_value' => 0])
                    ->addNumber('to_area', ['label' => 'Powierzchnia DO (m²)', 'append' => 'm²'])
                    ->addNumber('price', ['label' => 'Cena "od"', 'append' => 'zł'])
                ->endRepeater()

                // --- Cena za pomieszczenie (np. Klimatyzacja) ---
                ->addNumber('price_per_room', ['label' => 'Cena za pomieszczenie', 'append' => 'zł'])
                    ->conditional('calculation_type', '==', 'per_room')

                // --- Pakiety (np. Fotowoltaika) ---
                ->addRepeater('packages', [
                    'label' => 'Pakiety',
                ])
                    ->conditional('calculation_type', '==', 'package')
                    ->addText('package_name', ['label' => 'Nazwa pakietu'])
                    ->addNumber('package_price', ['label' => 'Cena "od"', 'append' => 'zł'])
                ->endRepeater()

                // --- Opcje dodatkowe dla usługi ---
                ->addRepeater('sub_options', [
                    'label' => 'Opcje dodatkowe do tej usługi',
                    'button_label' => 'Dodaj opcję podrzędną',
                ])
                    ->addText('option_name', ['label' => 'Nazwa opcji (np. Smart Home)'])
                    ->addNumber('option_price', ['label' => 'Cena "od"', 'append' => 'zł'])
                    ->addTrueFalse('requires_thickness', ['label' => 'Wymaga podania grubości styropianu?'])
                ->endRepeater()

            ->endRepeater()

            ->addTab('Dofinansowania')
            ->addRepeater('subsidies', [
                'label' => 'Dofinansowania',
                'button_label' => 'Dodaj dofinansowanie',
            ])
                ->addText('subsidy_name', ['label' => 'Nazwa (np. Moje Ciepło)'])
            ->endRepeater();


        return $calculator->build();
    }
}