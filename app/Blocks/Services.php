<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Services extends Block
{
	public $name = 'Oferta - Kafelki';
	public $description = 'services';
	public $slug = 'services';
	public $category = 'formatting';
	public $icon = 'grid-view';
	public $keywords = ['oferta', 'services', 'cpt'];
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
				'label' => 'Oferta - Kafelki',
				'open' => false,
				'multi_expand' => true,
			])
			->addTab('Elementy', ['placement' => 'top'])
			->addGroup('g_services', ['label' => ''])
			->addText('header', ['label' => 'Nagłówek'])
			->endGroup()
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

		return $services;
	}

	public function with()
	{
		return [
			'offer' => $this->getoffer(),
			'g_services' => get_field('g_services'),
			'section_id' => get_field('section_id'),
			'section_class' => get_field('section_class'),
			'flip' => get_field('flip'),
			'wide' => get_field('wide'),
			'nomt' => get_field('nomt'),
			'gap' => get_field('gap'),
			'background' => get_field('background'),
		];
	}

	public function getoffer()
	{
		$args = [
			'post_type' => 'offer',
			'posts_per_page' => -1,
			'orderby' => 'date',
			'order' => 'DESC',
		];

		$query = new \WP_Query($args);

		return $query->posts;
	}
}
