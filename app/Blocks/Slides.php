<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Slides extends Block
{
	public $name = 'Slider - Kafelki';
	public $description = 'slides';
	public $slug = 'slides';
	public $category = 'formatting';
	public $icon = 'image-flip-horizontal';
	public $keywords = ['slides', 'kafelki'];
	public $mode = 'edit';
	public $supports = [
		'align' => false,
		'mode' => false,
		'jsx' => true,
	];

	public function fields()
	{
		$slides = new FieldsBuilder('slides');

		$slides
			->setLocation('block', '==', 'acf/slides') // ważne!
			->addText('block-title', [
				'label' => 'Tytuł',
				'required' => 0,
			])
			->addAccordion('accordion1', [
				'label' => 'Slider - Kafelki',
				'open' => false,
				'multi_expand' => true,
			])
			/*--- FIELDS ---*/
			->addTab('Treści', ['placement' => 'top'])
			->addGroup('g_slides', ['label' => ''])

			->addText('title', ['label' => 'Tytuł'])

			->addRepeater('repeater', [
				'label' => 'Slider - Kafelki',
				'layout' => 'table', // 'row', 'block', albo 'table'
				'min' => 1,
				'max' => 10,
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
				'rows' => 4,
				'new_lines' => 'br',
			])
			->addLink('button', [
				'label' => 'Przycisk',
				'return_format' => 'array',
			])
			->endRepeater()

			->endGroup()

			/*--- USTAWIENIA BLOKU ---*/

			->addTab('Ustawienia bloku', ['placement' => 'top'])
			->addTrueFalse('flip', [
				'label' => 'Odwrotna kolejność',
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
			->addTrueFalse('nomt', [
				'label' => 'Usunięcie marginesu górnego',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			]);

		return $slides;
	}

	public function with()
	{
		return [
			'g_slides' => get_field('g_slides'),
			'slides' => get_field('g_slides')['repeater'] ?? [],
			'flip' => get_field('flip'),
			'lightbg' => get_field('lightbg'),
			'nomt' => get_field('nomt'),
		];
	}
}
