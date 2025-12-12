<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Connect extends Block

{
	public $name = 'Kontakt - Podstrona';
	public $description = 'connect';
	public $slug = 'connect';
	public $category = 'formatting';
	public $icon = 'email';
	public $keywords = ['formularz', 'kontakt'];
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
		$connect = new FieldsBuilder('connect');

		$connect
			->setLocation('block', '==', 'acf/connect') // ważne!
			/*--- FIELDS ---*/
			->addText('block-title', [
				'label' => 'Tytuł',
				'required' => 0,
			])
			->addAccordion('accordion1', [
				'label' => 'Kontakt - Podstrona',
				'open' => false,
				'multi_expand' => true,
			])
			/*--- TAB #1 ---*/
			->addTab('Dane', ['placement' => 'top'])
			->addGroup('g_connect_1', ['label' => ''])
			->addText('header', ['label' => 'Nagłówek'])
			->addTextarea('txt', [
				'label' => 'Opis',
				'rows' => 1,
				'new_lines' => 'br',
			])
			->addText('phone', ['label' => 'Telefon'])
			->addText('email', ['label' => 'Email'])
			->addText('name', ['label' => 'Nazwa firmy'])
			->addTextarea('address', [
				'label' => 'Adres',
				'rows' => 2,
				'new_lines' => 'br',
			])
			->addImage('image', [
				'label' => 'Obraz w tle',
				'return_format' => 'array',
				'preview_size' => 'medium',
			])
			->endGroup()
			/*--- TAB #2 ---*/
			->addTab('Formularz', ['placement' => 'top'])
			->addGroup('g_connect_2', ['label' => ''])
			->addText('title', ['label' => 'Tytuł'])
			->addText('shortcode', [
				'label' => 'Kod formularza',
				'instructions' => 'Wklej kod formularza:  [connect-form-7 id="f12c470" title="connect form 1"]',
				'default_value' => '[connect-form-7 id="f12c470" title="connect form 1"]',
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
			->addTrueFalse('nomt', [
				'label' => 'Usunięcie marginesu górnego',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			]);


		return $connect;
	}

	public function with()
	{
		return [
			'g_connect_1' => get_field('g_connect_1'),
			'g_connect_2' => get_field('g_connect_2'),
			'section_id' => get_field('section_id'),
			'section_class' => get_field('section_class'),
			'nomt' => get_field('nomt'),
		];
	}
}
