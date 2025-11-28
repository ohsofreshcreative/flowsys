<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Area extends Field
{
	public $name = 'Obszar działania';
	public $description = 'o-area';
	public $slug = 'o-area';
	public $category = 'formatting';
	public $icon = 'admin-site';
	public $keywords = ['tresc', 'zdjecie'];
	public $mode = 'edit';
	public $supports = [
		'align' => false,
		'mode' => false,
		'jsx' => true,
		'anchor' => true,
		'customClassName' => true,
	];

	public function fields(): array
	{
		$o_area = new FieldsBuilder('o_area');

		$o_area
			->setLocation('options_page', '==', 'o-area') // ważne!
			/*--- GROUP ---*/
			->addGroup('g_area', ['label' => ''])
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
			])
			->addLink('button', [
				'label' => 'Przycisk',
				'return_format' => 'array',
			])
			->endGroup();

		return [$o_area];
	}
}

