<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Services extends Block
{
    public $name = 'Usługi (zakładki)';
    public $description = 'Blok wyświetlający wpisy z CPT Usługi w zakładkach.';
    public $slug = 'services';
    public $category = 'formatting';
    public $icon = 'editor-ul';
    public $keywords = ['usługi', 'zakładki', 'tabs'];
    public $mode = 'edit';
    public $supports = [
        'align' => false,
        'mode' => false,
        'jsx' => true,
        'anchor' => true,
        'customClassName' => true,
    ];

    public function fields()
    {
        $services = new FieldsBuilder('services');

        $services
            ->setLocation('block', '==', 'acf/services')
            ->addText('block-title', [
                'label' => 'Tytuł',
                'required' => 0,
            ])
            ->addAccordion('accordion1', [
                'label' => 'Branże',
                'open' => false,
                'multi_expand' => true,
            ])
            ->addTab('Główne', ['placement' => 'top'])
            ->addText('title', ['label' => 'Główny tytuł bloku'])

            /*--- USTAWIENIA BLOKU ---*/
            ->addTab('Ustawienia bloku', ['placement' => 'top'])
            ->addText('section_id', [
                'label' => 'ID',
            ])
            ->addText('section_class', [
                'label' => 'Dodatkowe klasy CSS',
            ])
            ->addTrueFalse('flip', [
                'label' => 'Odwrotna kolejność',
                'ui' => 1,
                'ui_on_text' => 'Tak',
                'ui_off_text' => 'Nie',
            ])
            ->addTrueFalse('wide', [
                'label' => 'Szeroka kolumna',
                'ui' => 1,
                'ui_on_text' => 'Tak',
                'ui_off_text' => 'Nie',
            ])
            ->addTrueFalse('nomt', [
                'label' => 'Usunięcie marginesu górnego',
                'ui' => 1,
                'ui_on_text' => 'Tak',
                'ui_off_text' => 'Nie',
            ])
            ->addTrueFalse('gap', [
                'label' => 'Większy odstęp',
                'ui' => 1,
                'ui_on_text' => 'Tak',
                'ui_off_text' => 'Nie',
            ])
            ->addSelect('background', [
                'label' => 'Kolor tła',
                'choices' => [
                    'none' => 'Brak (domyślne)',
                    'section-white' => 'Białe',
                    'section-light' => 'Jasne',
                    'section-gray' => 'Szare',
                    'section-brand' => 'Marki',
                    'section-gradient' => 'Gradient',
                    'section-dark' => 'Ciemne',
                ],
                'default_value' => 'none',
                'ui' => 0,
                'allow_null' => 0,
            ]);

        return $services->build();
    }

    public function with()
    {
        return [
            'title' => get_field('title'),
            'service_tabs' => $this->getServiceData(),
            'section_id' => get_field('section_id'),
            'section_class' => get_field('section_class'),
            'flip' => get_field('flip'),
            'wide' => get_field('wide'),
            'nomt' => get_field('nomt'),
            'gap' => get_field('gap'),
            'background' => get_field('background'),
        ];
    }

    public function getServiceData()
    {
        $data = [];
        $terms = get_terms([
            'taxonomy' => 'uslugi_category',
            'hide_empty' => true,
        ]);

        if (is_wp_error($terms) || empty($terms)) {
            return [];
        }

        foreach ($terms as $term) {
            $posts_query = new \WP_Query([
                'post_type' => 'uslugi',
                'posts_per_page' => -1,
                'tax_query' => [
                    [
                        'taxonomy' => 'uslugi_category',
                        'field' => 'term_id',
                        'terms' => $term->term_id,
                    ],
                ],
            ]);

            if ($posts_query->have_posts()) {
                $data[] = [
                    'term' => $term,
                    'posts' => $posts_query->posts,
                ];
            }
        }

        return $data;
    }
}