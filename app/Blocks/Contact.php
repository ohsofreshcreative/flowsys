<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Contact extends Block

{
	public $name = 'Kontakt - Footer';
	public $description = 'Contact';
	public $slug = 'contact';
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
		$contact = new FieldsBuilder('contact');

		$contact
			->setLocation('block', '==', 'acf/contact') // ważne!
			/*--- FIELDS ---*/
			->addText('block-title', [
				'label' => 'Tytuł',
				'required' => 0,
			])
			->addAccordion('accordion1', [
				'label' => 'Kontakt - Footer',
				'open' => false,
				'multi_expand' => true,
			])
			/*--- TAB #1 ---*/
			->addTab('Dane', ['placement' => 'top'])
			->addGroup('g_contact_1', ['label' => ''])
			->addText('header', ['label' => 'Tytuł'])
			->addWysiwyg('txt', [
				'label' => 'Treść',
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => true,
			])
			->addImage('image', [
				'label' => 'Obraz',
				'return_format' => 'array',
				'preview_size' => 'medium',
			])
			->endGroup()
			/*--- TAB #2 ---*/
			->addTab('Formularz', ['placement' => 'top'])
			->addGroup('g_contact_2', ['label' => ''])
			->addText('title', ['label' => 'Tytuł'])
			->addText('shortcode', [
				'label' => 'Kod formularza',
				'instructions' => 'Wklej kod formularza:  [contact-form-7 id="f12c470" title="Contact form 1"]',
				'default_value' => '[contact-form-7 id="f12c470" title="Contact form 1"]',
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


		return $contact;
	}

	public function with()
	{
		return [
			'g_contact_1' => get_field('g_contact_1'),
			'g_contact_2' => get_field('g_contact_2'),
			'tiles' => get_field('tiles'),
			'flip' => get_field('flip'),
			'lightbg' => get_field('lightbg'),
		];
	}
}
