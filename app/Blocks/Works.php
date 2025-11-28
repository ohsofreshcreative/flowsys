<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Works extends Block
{
	public $name = 'Realizacje - Galeria';
	public $description = 'works';
	public $slug = 'works';
	public $category = 'formatting';
	public $icon = 'format-gallery';
	public $keywords = ['works', 'kafelki'];
	public $mode = 'edit';
	public $supports = [
		'align' => false,
		'mode' => false,
		'jsx' => true,
	];

	public function fields()
	{
		$works = new FieldsBuilder('works');

		$works
			->setLocation('block', '==', 'acf/works') // ważne!
			->addText('block-title', [
				'label' => 'Tytuł',
				'required' => 0,
			])
			->addAccordion('accordion1', [
				'label' => 'Realizacje - Galeria',
				'open' => false,
				'multi_expand' => true,
			])
			/*--- FIELDS ---*/
			->addTab('Treści', ['placement' => 'top'])
			->addGroup('tiles', ['label' => ''])

			->addText('title', ['label' => 'Tytuł'])

			->addRepeater('repeater', [
				'label' => 'Slider',
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

			->endGroup()

			/*--- USTAWIENIA BLOKU ---*/

			->addTab('Ustawienia bloku', ['placement' => 'top'])
			->addTrueFalse('flip', [
				'label' => 'Odwrotna kolejność',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			]);



		return $works;
	}

	public function with()
	{
		return [
			'tiles' => get_field('tiles'),
			'about2' => get_field('about2'),
			'flip' => get_field('flip'),
		];
	}
}
