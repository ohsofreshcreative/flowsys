<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Catalogues extends Block
{
	public $name = 'Katalogi';
	public $description = 'catalogues';
	public $slug = 'catalogues';
	public $category = 'formatting';
	public $icon = 'open-folder';
	public $keywords = ['catalogues', 'kafelki'];
	public $mode = 'edit';
	public $supports = [
		'align' => false,
		'mode' => false,
		'jsx' => true,
	];

	public function fields()
	{
		$catalogues = new FieldsBuilder('catalogues');

		$catalogues
			->setLocation('block', '==', 'acf/catalogues') // ważne!
			->addText('block-title', [
				'label' => 'Tytuł',
				'required' => 0,
			])
			->addAccordion('accordion1', [
				'label' => 'Katalogi',
				'open' => false,
				'multi_expand' => true,
			])
			/*--- TAB #1 ---*/
			->addTab('Treści', ['placement' => 'top'])
			->addGroup('g_catalogues', ['label' => ''])
			->addText('header', ['label' => 'Nagłówek'])
			->addTextarea('text', [
				'label' => 'Opis',
				'rows' => 4,
				'new_lines' => 'br',
			])
			->addLink('button', [
				'label' => 'Przycisk #1',
				'return_format' => 'array',
			])
			->addLink('button2', [
				'label' => 'Przycisk #2',
				'return_format' => 'array',
			])
			->endGroup()

			/*--- TAB #2 ---*/
			->addTab('Katalogi TLC', ['placement' => 'top'])
			->addText('header1', ['label' => 'Nagłówek'])
			->addRepeater('r_catalogues', [
				'label' => 'Katalogi TLC',
				'layout' => 'table', // 'row', 'block', albo 'table'
				'min' => 1,
				'button_label' => 'Dodaj katalog'
			])
			->addFile('file', [
				'label' => 'Plik',
				'return_format' => 'array',
			])
			->addText('title', [
				'label' => 'Nagłówek',
			])
			->endRepeater()

			/*--- TAB #3 ---*/
			->addTab('Katalogi producentów', ['placement' => 'top'])
			->addText('header2', ['label' => 'Nagłówek'])
			->addRepeater('r_catalogues_2', [
				'label' => 'Katalogi producentów',
				'layout' => 'table', // 'row', 'block', albo 'table'
				'min' => 1,
				'button_label' => 'Dodaj katalog'
			])
			->addFile('file', [
				'label' => 'Plik',
				'return_format' => 'array',
			])
			->addText('title', [
				'label' => 'Nagłówek',
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

		return $catalogues;
	}

	public function with()
	{
		return [
			'g_catalogues' => get_field('g_catalogues'),
			'r_catalogues' => get_field('r_catalogues'),
			'r_catalogues_2' => get_field('r_catalogues_2'),
			'header1' => get_field('header1'),
			'header2' => get_field('header2'),
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
