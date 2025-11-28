<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Video extends Block
{
	public $name = 'Wideo';
	public $description = 'video';
	public $slug = 'video';
	public $category = 'formatting';
	public $icon = 'video-alt3';
	public $keywords = ['video', 'wideo'];
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
		$video = new FieldsBuilder('video');

		$video
			->setLocation('block', '==', 'acf/video') // ważne!
			->addText('block-title', [
				'label' => 'Tytuł',
				'required' => 0,
			])
			->addAccordion('accordion1', [
				'label' => 'Wideo',
				'open' => false,
				'multi_expand' => true,
			])
			/*--- GROUP ---*/
			->addTab('Elementy', ['placement' => 'top'])
			->addGroup('g_video', ['label' => ''])

			->addText('title', ['label' => 'Tytuł'])
			->addFile('video', [
				'label' => 'Wideo',
				'return_format' => 'url',
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

		return $video;
	}

	public function with()
	{
		return [
			'g_video' => get_field('g_video'),
			'flip' => get_field('flip'),
			'whitebg' => get_field('whitebg'),
			'lightbg' => get_field('lightbg'),
			'nomt' => get_field('nomt'),
		];
	}
}
