<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Gallery extends Block
{
	public $name = 'Galeria';
	public $description = 'gallery';
	public $slug = 'gallery';
	public $category = 'formatting';
	public $icon = 'format-gallery';
	public $keywords = ['gallery', 'kafelki'];
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
		$gallery = new FieldsBuilder('gallery');

		$gallery
			->setLocation('block', '==', 'acf/gallery') // ważne!
			->addText('block-title', [
				'label' => 'Tytuł',
				'required' => 0,
			])
			->addAccordion('accordion1', [
				'label' => 'Galeria',
				'open' => false,
				'multi_expand' => true,
			])
			/*--- FIELDS ---*/
			->addTab('Galeria', ['placement' => 'top'])
			->addGroup('group1', ['label' => ''])

			->addText('title', ['label' => 'Tytuł'])

			->addGallery('gallery', [
				'label' => 'Galeria',
				'preview_size' => 'medium',
				'library' => 'all',
				'min' => 1,
				'max' => 10,
			])

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

		return $gallery;
	}

	public function with()
	{
		return [
			'group1' => get_field('group1'),
			'flip' => get_field('flip'),
			'lightbg' => get_field('lightbg'),
			'nomt' => get_field('nomt'),
		];
	}
}
