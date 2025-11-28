<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class HeroJob extends Block
{
	public $name = 'Hero - Oferta pracy';
	public $description = 'hero-job';
	public $slug = 'hero-job';
	public $category = 'formatting';
	public $icon = 'align-full-width';
	public $keywords = ['tresc', 'zdjecie'];
	public $mode = 'edit';
	public $supports = [
		'align' => false,
		'mode' => false,
		'jsx' => true,
	];

	public function fields()
	{
		$hero_job = new FieldsBuilder('hero-job');

		$hero_job
			->setLocation('block', '==', 'acf/hero-job') // ważne!
			->addText('block-title', [
				'label' => 'Tytuł',
				'required' => 0,
			])
			->addAccordion('accordion1', [
				'label' => 'Hero - Oferta pracy',
				'open' => false,
				'multi_expand' => true,
			])
			->addTab('Treść', ['placement' => 'top'])
			->addGroup('g_herojob', ['label' => 'Hero - Pojedyncza oferta'])
			->addImage('image', [
				'label' => 'Obraz',
				'return_format' => 'array', // lub 'url', lub 'id'
				'preview_size' => 'thumbnail',
			])
			->addText('title', ['label' => 'Tytuł'])
			->addText('reg', ['label' => 'Region'])
			->addText('city', ['label' => 'Miejsce pracy'])
			->addLink('button', [
				'label' => 'Przycisk',
				'return_format' => 'array',
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

		return $hero_job;
	}

	public function with()
	{
		return [
			'g_herojob' => get_field('g_herojob'),
			'section_id' => get_field('section_id'),
			'section_class' => get_field('section_class'),
			'nomt' => get_field('nomt'),
		];
	}
}
