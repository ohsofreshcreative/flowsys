<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class HomeAbout extends Block
{
	public $name = 'Strona główna - O nas';
	public $description = 'home-about';
	public $slug = 'home-about';
	public $category = 'formatting';
	public $icon = 'screenoptions';
	public $keywords = ['O nas', 'Strona glowna'];
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
		$home_about = new FieldsBuilder('home-about');

		$home_about
			->setLocation('block', '==', 'acf/home-about') // ważne!
			->addText('block-title', [
				'label' => 'Tytuł',
				'required' => 0,
			])
			->addAccordion('accordion1', [
				'label' => 'Strona główna - O nas',
				'open' => false,
				'multi_expand' => true,
			])
			/*--- GRUPA #1 ---*/
			->addTab('Sekcja 1', ['placement' => 'top'])
			->addGroup('about1', ['label' => ''])
			->addImage('image', [
				'label' => 'Obraz',
				'return_format' => 'array', // lub 'url', lub 'id'
				'preview_size' => 'medium',
			])
			->addText('title', ['label' => 'Tytuł'])
			->addWysiwyg('content', [
				'label' => 'Treść',
				'tabs' => 'all', // 'visual', 'text', 'all'
				'toolbar' => 'full', // 'basic', 'full'
				'media_upload' => true,
				'wpautop' => false,
			])
			->addLink('cta', [
				'label' => 'Przycisk',
				'return_format' => 'array',
			])
			->endGroup()

			/*--- GRUPA #2 ---*/
			->addTab('Sekcja 2', ['placement' => 'top'])
			->addGroup('about2', ['label' => ''])
			->addImage('image2', [
				'label' => 'Obraz',
				'return_format' => 'array', // lub 'url', lub 'id'
				'preview_size' => 'medium',
			])
			->addText('title2', ['label' => 'Tytuł'])
			->addWysiwyg('content2', [
				'label' => 'Treść',
				'tabs' => 'all', // 'visual', 'text', 'all'
				'toolbar' => 'full', // 'basic', 'full'
				'media_upload' => true,
				'wpautop' => false,
			])
			->addLink('cta2', [
				'label' => 'Przycisk',
				'return_format' => 'array',
			])
			->endGroup()

			/*--- USTAWIENIA BLOKU ---*/

			->addTab('Ustawienia bloku', ['placement' => 'top'])
			->addTrueFalse('flip', [
				'label' => 'Odwrotna kolejność',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			]);



		return $home_about;
	}

	public function with()
	{
		return [
			'about1' => get_field('about1'),
			'about2' => get_field('about2'),
			'flip' => get_field('flip'),
		];
	}
}
