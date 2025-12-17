<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
// Nie potrzebujemy `use function App\vite;` - będziemy wołać globalną funkcję

class calc extends Block
{
    public $name = 'Kalkulator';
    public $description = 'calc';
    public $slug = 'calc';
    public $category = 'formatting';
    public $icon = 'email';
    public $keywords = ['formularz', 'kontakt'];
    public $mode = 'edit';
    public $enqueue_script = 'resources/js/blocks/calc.js';

    public $supports = [
        'align' => false,
        'mode' => false,
        'jsx' => true,
        'anchor' => true,
        'customClassName' => true,
    ];

    public function init()
    {
        add_action('wpcf7_init', [$this, 'add_cf7_calculator_options_shortcode']);
    }

    public function add_cf7_calculator_options_shortcode()
    {
        if (function_exists('wpcf7_add_form_tag')) {
            wpcf7_add_form_tag('cf7_calculator_options', [$this, 'render_cf7_calculator_options']);
        }
    }

    public function render_cf7_calculator_options()
    {
        $services = get_field('services', 'option');
        if (empty($services)) {
            return '<!-- Brak skonfigurowanych usług -->';
        }

        $output = '<span class="wpcf7-form-control-wrap zainteresowania"><span class="wpcf7-form-control wpcf7-checkbox">';
        foreach ($services as $service) {
            $title = esc_html($service['title']);
            $value = esc_attr($service['title']);
            $output .= sprintf(
                '<span class="wpcf7-list-item"><label><input type="checkbox" name="zainteresowania[]" value="%s" /> %s</label></span>',
                $value,
                $title
            );
        }
        $output .= '</span></span>';

        return $output;
    }

    public function enqueue()
    {
        // 1. Zarejestruj skrypt, wołając globalną funkcję vite()
        //    ZMIANA TUTAJ: dodaliśmy \ przed vite()
        $entrypoint = \vite()->withEntryPoints([$this->enqueue_script]);
        $entrypoint->enqueue();

        // 2. Pobierz dane z pól opcji
        $services = get_field('services', 'option') ?: [];
        $subsidies = get_field('subsidies', 'option') ?: [];

        $calculator_data = [
            'services' => $services,
            'subsidies' => $subsidies,
        ];

        // 3. Przekaż dane do JS za pomocą wp_add_inline_script
        wp_add_inline_script(
            $entrypoint->getHandle(),
            'window.calculatorData = ' . wp_json_encode($calculator_data) . ';',
            'before'
        );
    }

    public function fields()
    {
        $calc = new FieldsBuilder('calc');
        $calc
            ->setLocation('block', '==', 'acf/calc')
            ->addTab('Kalkulator', ['placement' => 'top'])
                ->addGroup('g_calc', ['label' => ''])
                    ->addText('title', ['label' => 'Tytuł'])
                    ->addText('shortcode', [
                        'label' => 'Kod formularza',
                        'instructions' => 'Wklej kod formularza: [contact-form-7 id="..."]',
                    ])
                ->endGroup()
            ->addTab('Ustawienia bloku', ['placement' => 'top'])
                ->addText('section_id', ['label' => 'ID'])
                ->addText('section_class', ['label' => 'Dodatkowe klasy CSS'])
                ->addSelect('background', [
                    'label' => 'Kolor tła',
                    'choices' => [
                        'none' => 'Brak',
                        'section-white' => 'Białe',
                        'section-light' => 'Jasne',
                    ],
                ]);

        return $calc->build();
    }

    public function with()
    {
        return [
            'g_calc' => get_field('g_calc'),
            'section_id' => get_field('section_id'),
            'section_class' => get_field('section_class'),
            'background' => get_field('background'),
        ];
    }
}