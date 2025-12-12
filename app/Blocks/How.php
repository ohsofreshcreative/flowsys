<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class How extends Block
{
	public $name = 'Jak pracujemy';
	public $description = 'how';
	public $slug = 'how';
	public $category = 'formatting';
	public $icon = 'table-col-delete';
	public $keywords = ['how', 'kafelki'];
	public $mode = 'edit';
	public $supports = [
		'align' => false,
		'mode' => false,
		'jsx' => true,
	];

	public function fields()
	{
		$how = new FieldsBuilder('how');

		$how
			->setLocation('block', '==', 'acf/how') // ważne!
			->addText('block-title', [
				'label' => 'Tytuł',
				'required' => 0,
			])
			->addAccordion('accordion1', [
				'label' => 'Jak pracujemy',
				'open' => false,
				'multi_expand' => true,
			])
			/*--- TAB #1 ---*/
			->addTab('Treści', ['placement' => 'top'])
			->addGroup('g_how', ['label' => ''])
			->addText('header', ['label' => 'Nagłówek'])
			->addTextarea('text', [
				'label' => 'Opis',
				'rows' => 4,
				'new_lines' => 'br',
			])
			->addLink('button', [
				'label' => 'Przycisk',
				'return_format' => 'array',
			])
			->endGroup()

			/*--- TAB #2 ---*/
			->addTab('Kafelki', ['placement' => 'top'])
			->addRepeater('r_how', [
				'label' => 'Kafelki',
				'layout' => 'table', // 'row', 'block', albo 'table'
				'min' => 1,
				'button_label' => 'Dodaj kafelek'
			])
			->addImage('image', [
				'label' => 'Obraz #1',
				'return_format' => 'array', // lub 'url', lub 'id'
				'preview_size' => 'thumbnail',
			])
			->addImage('image2', [
				'label' => 'Obraz #2',
				'return_format' => 'array', // lub 'url', lub 'id'
				'preview_size' => 'thumbnail',
			])
			->addText('title', [
				'label' => 'Nagłówek',
			])
			->addTextarea('text', [
				'label' => 'Opis',
			])
			->endRepeater()

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
                'ui' => 0, // Ulepszony interfejs
                'allow_null' => 0,
            ]);

		return $how;
	}

	public function with()
	{
		return [
			'g_how' => get_field('g_how'),
			'r_how' => get_field('r_how'),
			'section_id' => get_field('section_id'),
			'section_class' => get_field('section_class'),
			'flip' => get_field('flip'),
			'wide' => get_field('wide'),
			'nomt' => get_field('nomt'),
			'gap' => get_field('gap'),
			'background' => get_field('background'),
		];
	}
}
