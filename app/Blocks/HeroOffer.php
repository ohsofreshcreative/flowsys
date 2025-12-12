<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class HeroOffer extends Block
{
	public $name = 'Hero - Oferta';
	public $description = 'hero-offer';
	public $slug = 'hero-offer';
	public $category = 'formatting';
	public $icon = 'align-full-width';
	public $keywords = ['hero', 'oferta'];
	public $mode = 'edit';
	public $supports = [
		'align' => false,
		'mode' => false,
		'jsx' => true,
	];

	public function fields()
	{
		$hero_offer = new FieldsBuilder('hero-offer');

		$hero_offer
			->setLocation('block', '==', 'acf/hero-offer') // ważne!
			->addText('block-title', [
				'label' => 'Tytuł',
				'required' => 0,
			])
			->addAccordion('accordion1', [
				'label' => 'Hero - Oferta',
				'open' => false,
				'multi_expand' => true,
			])
			->addTab('Treść', ['placement' => 'top'])
			->addGroup('g_hero_offer', ['label' => 'Hero - Produkt'])
			->addImage('image', [
				'label' => 'Obraz',
				'return_format' => 'array', // lub 'url', lub 'id'
				'preview_size' => 'thumbnail',
				'required' => 1,
			])
			->addText('header', [
				'label' => 'Nagłówek',
				'required' => 1,
			])
			->addTextarea('txt', [
				'label' => 'Opis',
				'rows' => 4,
				'new_lines' => 'br',
			])
			->addLink('button1', [
				'label' => 'Przycisk #1',
				'return_format' => 'array',
			])
			->addLink('button2', [
				'label' => 'Przycisk #2',
				'return_format' => 'array',
			])

			->endGroup()

			->addTab('Ustawienia bloku', ['placement' => 'top'])

			->addTrueFalse('flip', [
				'label' => 'Odwrotna kolejność',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('gfx_top', [
				'label' => 'Grafika górna',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('gfx_bottom', [
				'label' => 'Grafika dolna',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			]);

		return $hero_offer;
	}

	public function with()
	{
		return [
			'g_hero_offer' => get_field('g_hero_offer'),
			'section_id' => get_field('section_id'),
			'section_class' => get_field('section_class'),
			'flip' => get_field('flip'),
			'wide' => get_field('wide'),
			'nomt' => get_field('nomt'),
			'gap' => get_field('gap'),
			'lightbg' => get_field('lightbg'),
			'graybg' => get_field('graybg'),
			'whitebg' => get_field('whitebg'),
			'brandbg' => get_field('brandbg'),
		];
	}
}
