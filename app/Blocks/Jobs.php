<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Jobs extends Block
{
    public $name = 'Oferty pracy';
    public $description = 'jobs';
    public $slug = 'jobs';
    public $category = 'formatting';
    public $icon = 'businessperson';
    public $keywords = ['oferty pracy', 'jobs', 'cpt'];
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
        $jobs = new FieldsBuilder('jobs');

        $jobs
            ->setLocation('block', '==', 'acf/jobs')
            ->addText('block-title', [
                'label' => 'Tytuł',
                'required' => 0,
            ])
            ->addAccordion('accordion1', [
                'label' => 'Oferty pracy',
                'open' => false,
                'multi_expand' => true,
            ])
            ->addTab('Elementy', ['placement' => 'top'])
            ->addGroup('g_jobs', ['label' => ''])
            ->addText('title', ['label' => 'Tytuł'])
            ->endGroup()

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

        return $jobs;
    }

    public function with()
    {
        return [
            'jobs' => $this->getjobs(),
            'g_jobs' => get_field('g_jobs'),
            'section_id' => get_field('section_id'),
            'section_class' => get_field('section_class'),
            'flip' => get_field('flip'),
            'wide' => get_field('wide'),
            'nomt' => get_field('nomt'),
            'gap' => get_field('gap'),
            'background' => get_field('background'),
        ];
    }

    public function getjobs()
    {
        $args = [
            'post_type' => 'job_offers',
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'DESC',
        ];

        $query = new \WP_Query($args);

        return $query->posts;
    }
}