<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class About extends Block
{
	public $name = 'O nas';
	public $description = 'about';
	public $slug = 'about';
	public $category = 'formatting';
	public $icon = 'admin-users';
	public $keywords = ['about', 'o nas'];
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
		$about = new FieldsBuilder('about');

		$about
			->setLocation('block', '==', 'acf/about') // ważne!
			->addText('block-title', [
				'label' => 'Tytuł',
				'required' => 0,
			])
			->addAccordion('accordion1', [
				'label' => 'O nas',
				'open' => false,
				'multi_expand' => true,
			])
			/*--- GROUP ---*/
			->addTab('Elementy', ['placement' => 'top'])
			->addGroup('g_about', ['label' => ''])
			->addAccordion('accordion2', [
				'label' => 'Lewa strona',
				'open' => false,
				'multi_expand' => false,
			])
			->addImage('image', [
				'label' => 'Obraz #1',
				'return_format' => 'array', // lub 'url', lub 'id'
				'preview_size' => 'medium',
			])
			->addText('nr', ['label' => 'Liczba'])
			->addText('description', ['label' => 'Opis'])
			
			->addAccordion('accordion3', [
				'label' => 'Prawa strona',
				'open' => false,
				'multi_expand' => false,
			])
			->addImage('image2', [
				'label' => 'Obraz #2',
				'return_format' => 'array', // lub 'url', lub 'id'
				'preview_size' => 'medium',
			])
			->addText('title', ['label' => 'Tytuł'])
			->addText('header', ['label' => 'Nagłówek'])
			->addWysiwyg('txt', [
				'label' => 'Treść',
				'tabs' => 'all', // 'visual', 'text', 'all'
				'toolbar' => 'full', // 'basic', 'full'
				'media_upload' => true,
			])
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
			->addSelect('bg', [
				'label' => 'Tło sekcji',
				'choices' => [
					'x' => '— brak —',
					'light' => 'Jasne tło',
					'gray' => 'Szare tło',
					'white' => 'Białe tło',
					'brand' => 'Tło marki',
					'dark' => 'Ciemne tło',
				],
				'default_value' => '',
				'allow_null'    => 0,
				'multiple'      => 0,
				'ui'            => 1,
			]);

		return $about;
	}

	public function with()
	{
		return [
			'g_about' => get_field('g_about'),
			'section_id' => get_field('section_id'),
			'section_class' => get_field('section_class'),
			'flip' => get_field('flip'),
			'wide' => get_field('wide'),
			'nomt' => get_field('nomt'),
			'gap' => get_field('gap'),
			'bg' => get_field('bg'),
		];
	}
}
