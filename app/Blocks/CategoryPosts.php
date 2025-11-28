<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class CategoryPosts extends Block
{
    public $name = 'Baza wiedzy - Ostatnie wpisy';
    public $description = 'category-posts';
    public $slug = 'category-posts';
    public $category = 'formatting';
    public $icon = 'admin-post';
    public $keywords = ['posts', 'category', 'wpisy', 'kategoria'];
    public $mode = 'edit';
    public $supports = [
        'align' => false,
        'mode' => false,
        'jsx' => true,
    ];

    public function fields()
    {
        $categoryPosts = new FieldsBuilder('category-posts');

        $categoryPosts
            ->setLocation('block', '==', 'acf/category-posts') // ważne!
            ->addText('block-title', [
                'label' => 'Tytuł bloku',
                'required' => 0,
            ])
            ->addAccordion('accordion1', [
                'label' => 'Baza wiedzy - Ostatnie wpisy',
                'open' => true,
                'multi_expand' => true,
            ])
            /*--- FIELDS ---*/
            ->addTab('Treści', ['placement' => 'top'])
            ->addGroup('posts_settings', ['label' => ''])
            
			->addText('title', ['label' => 'Tytuł'])
            ->addTaxonomy('category', [
                'label' => 'Wybierz kategorię',
                'taxonomy' => 'category',
                'field_type' => 'select',
                'allow_null' => 0,
                'add_term' => 0,
                'save_terms' => 0,
                'load_terms' => 0,
                'return_format' => 'id',
                'multiple' => 0,
                'required' => 1,
            ])
            
            ->addNumber('posts_count', [
                'label' => 'Liczba postów do wyświetlenia',
                'default_value' => 3,
                'min' => 1,
                'max' => 12,
                'required' => 1,
            ])
            
            ->addTrueFalse('show_image', [
                'label' => 'Pokaż obrazek',
                'default_value' => 1,
                'ui' => 1,
                'ui_on_text' => 'Tak',
                'ui_off_text' => 'Nie',
            ])
            
            ->addTrueFalse('show_excerpt', [
                'label' => 'Pokaż fragment treści',
                'default_value' => 1,
                'ui' => 1,
                'ui_on_text' => 'Tak',
                'ui_off_text' => 'Nie',
            ])
            
            ->endGroup()

            /*--- USTAWIENIA BLOKU ---*/

            ->addTab('Ustawienia bloku', ['placement' => 'top'])
            ->addSelect('layout', [
                'label' => 'Układ',
                'choices' => [
                    'grid' => 'Siatka',
                    'list' => 'Lista',
                ],
                'default_value' => 'grid',
                'ui' => 1,
            ])
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
			->addTrueFalse('lightbg', [
				'label' => 'Jasne tło',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('graybg', [
				'label' => 'Szare tło',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('whitebg', [
				'label' => 'Białe tło',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('brandbg', [
				'label' => 'Tło marki',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			]);

        return $categoryPosts;
    }

    public function with()
    {
        $posts_settings = get_field('posts_settings');
        $category_id = $posts_settings['category'] ?? 0;
        $posts_count = $posts_settings['show_count'] ?? 3;
        $show_image = $posts_settings['show_image'] ?? true;
        $show_excerpt = $posts_settings['show_excerpt'] ?? true;
        
        // Get posts from the selected category
        $args = [
            'post_type' => 'post',
            'posts_per_page' => $posts_count,
            'cat' => $category_id,
            'post_status' => 'publish',
        ];
        
        $query = new \WP_Query($args);
        $posts = $query->posts;
        
        return [
			'posts_settings' => get_field('posts_settings'),
            'category_id' => $category_id,
            'posts' => $posts,
            'show_image' => $show_image,
            'show_excerpt' => $show_excerpt,
            'layout' => get_field('layout'),
			'section_id' => get_field('section_id'),
			'section_class' => get_field('section_class'),
			'flip' => get_field('flip'),
			'wide' => get_field('wide'),
			'nomt' => get_field('nomt'),
			'gap' => get_field('gap'),
			'lightbg' => get_field('lightbg'),
			'graybg' => get_field('graybg'),
			'whitebg' => get_field('whitebg'),
			'brandbg' => get_field('brandbg'),
        ];
    }
}