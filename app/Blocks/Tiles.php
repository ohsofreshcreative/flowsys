<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Tiles extends Block
{
	public $name = 'Tekst + Kafelki';
	public $description = 'tiles';
	public $slug = 'tiles';
	public $category = 'formatting';
	public $icon = 'align-pull-right';
	public $keywords = ['tiles', 'kafelki'];
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
		$tiles = new FieldsBuilder('tiles');

		$tiles
			->setLocation('block', '==', 'acf/tiles') // ważne!
			->addText('block-title', [
				'label' => 'Tytuł',
				'required' => 0,
			])
			->addAccordion('accordion1', [
				'label' => 'Tekst + kafelki',
				'open' => false,
				'multi_expand' => true,
			])

			/*--- TAB #1 ---*/
			->addTab('Treści', ['placement' => 'top'])
			->addGroup('tiles', ['label' => ''])
			->addText('title', ['label' => 'Tytuł'])
			->addText('subtitle', ['label' => 'Śródtytuł'])
			->addTextarea('text', [
				'label' => 'Opis',
				'rows' => 4,
				'placeholder' => 'Wpisz opis...',
				'new_lines' => 'br',
			])
			->endGroup()

			/*--- TAB #2 ---*/
			->addTab('Kafelki', ['placement' => 'top'])
			->addRepeater('repeater', [
				'label' => 'Kafelki',
				'layout' => 'table', // 'row', 'block', albo 'table'
				'min' => 1,
				'max' => 4,
				'button_label' => 'Dodaj kafelek'
			])
			->addImage('card_image', [
				'label' => 'Obraz',
				'return_format' => 'array', // lub 'url', lub 'id'
				'preview_size' => 'medium',
			])
			->addText('card_title', [
				'label' => 'Nagłówek',
			])
			->addTextarea('card_txt', [
				'label' => 'Opis',
			])
			->endRepeater()

			/*--- USTAWIENIA BLOKU ---*/

			->addTab('Ustawienia bloku', ['placement' => 'top'])
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
			->addTrueFalse('lightbg', [
				'label' => 'Jasne tło',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('greybg', [
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
			->addTrueFalse('nomt', [
				'label' => 'Usunięcie marginesu górnego',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			]);

		return $tiles;
	}

	public function with()
	{
		return [
			'tiles' => get_field('tiles'),
			'repeater' => get_field('repeater'),
			'flip' => get_field('flip'),
			'wide' => get_field('wide'),
			'lightbg' => get_field('lightbg'),
			'greybg' => get_field('greybg'),
			'whitebg' => get_field('whitebg'),
			'nomt' => get_field('nomt'),
		];
	}
}
