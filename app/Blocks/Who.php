<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Who extends Block
{
	public $name = 'Kim jesteśmy';
	public $description = 'who';
	public $slug = 'who';
	public $category = 'formatting';
	public $icon = 'align-pull-left';
	public $keywords = ['kim', 'jestesmy'];
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
		$who = new FieldsBuilder('who');

		$who
			->setLocation('block', '==', 'acf/who') // ważne!
			->addText('block-title', [
				'label' => 'Tytuł',
				'required' => 0,
			])
			->addAccordion('accordion1', [
				'label' => 'Kim jesteśmy',
				'open' => false,
				'multi_expand' => true,
			])
			/*--- GROUP ---*/
			->addTab('Elementy', ['placement' => 'top'])
			->addGroup('g_who', ['label' => ''])
			->addImage('image1', [
				'label' => 'Obraz #1',
				'return_format' => 'array', 
				'preview_size' => 'medium',
			])
			->addImage('image2', [
				'label' => 'Obraz #2',
				'return_format' => 'array',
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
			->addLink('button', [
				'label' => 'Przycisk',
				'return_format' => 'array',
			])
			->endGroup()

			/*--- FIELDS ---*/
			->addTab('Liczby', ['placement' => 'top'])

			->addRepeater('r_who', [
				'label' => 'Liczby',
				'layout' => 'table', // 'row', 'block', albo 'table'
				'min' => 1,
				'max' => 3,
				'button_label' => 'Dodaj kafelek'
			])
			->addText('liczba', [
				'label' => 'Liczba',
			])
			->addText('header', [
				'label' => 'Nagłówek',
			])
			->addTextarea('txt', [
				'label' => 'Opis',
				'rows' => 2,
				'new_lines' => 'br',
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
			->addTrueFalse('darkbg', [
				'label' => 'Ciemne tło',
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

		return $who;
	}

	public function with()
	{
		return [
			'g_who' => get_field('g_who'),
			'r_who' => get_field('r_who'),
			'section_id' => get_field('section_id'),
			'section_class' => get_field('section_class'),
			'flip' => get_field('flip'),
			'wide' => get_field('wide'),
			'nomt' => get_field('nomt'),
			'gap' => get_field('gap'),
			'lightbg' => get_field('lightbg'),
			'graybg' => get_field('graybg'),
			'whitebg' => get_field('whitebg'),
			'darkbg' => get_field('darkbg'),
			'brandbg' => get_field('brandbg'),
		];
	}
}
