<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Tlc extends Block
{
	public $name = 'O TLC';
	public $description = 'tlc';
	public $slug = 'tlc';
	public $category = 'formatting';
	public $icon = 'admin-users';
	public $keywords = ['tlc', 'o nas'];
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
		$tlc = new FieldsBuilder('tlc');

		$tlc
			->setLocation('block', '==', 'acf/tlc') // ważne!
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
			->addGroup('g_tlc', ['label' => ''])
			->addImage('image', [
				'label' => 'Obraz #1',
				'return_format' => 'array', // lub 'url', lub 'id'
				'preview_size' => 'medium',
			])
			->addText('header', ['label' => 'Nagłówek'])
			->addWysiwyg('txt', [
				'label' => 'Treść',
				'tabs' => 'all', // 'visual', 'text', 'all'
				'toolbar' => 'full', // 'basic', 'full'
				'media_upload' => false,
			])
			->addLink('button', [
				'label' => 'Przycisk',
				'return_format' => 'array',
			])
			->addImage('image2', [
				'label' => 'Obraz #2',
				'return_format' => 'array', // lub 'url', lub 'id'
				'preview_size' => 'medium',
			])
			->endGroup()
			/*--- REPEATER ---*/
			->addTab('Wartości', ['placement' => 'top'])
			->addRepeater('r_tlc', [
				'label' => 'Wartości',
				'layout' => 'table',
				'min' => 1,
				'max' => 4,
				'button_label' => 'Dodaj wartość',
			])
			->addImage('image', [
				'label' => 'Obraz',
				'return_format' => 'array', // lub 'url', lub 'id'
				'preview_size' => 'medium',
			])
			->addText('title', [
				'label' => 'Nagłówek',
			])
			->addTextarea('txt', [
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

		return $tlc;
	}

	public function with()
	{
		return [
			'g_tlc' => get_field('g_tlc'),
			'r_tlc' => get_field('r_tlc'),
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
