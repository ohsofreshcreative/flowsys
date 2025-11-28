<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Categories extends Block
{
	public $name = 'Kategorie produktów';
	public $description = 'categories';
	public $slug = 'categories';
	public $category = 'formatting';
	public $icon = 'category';
	public $keywords = ['kategorie', 'produkty'];
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
		$categories = new FieldsBuilder('categories');

		$categories
			->setLocation('block', '==', 'acf/categories')
			->addText('block-title', [
				'label' => 'Tytuł',
				'required' => 0,
			])
			->addAccordion('accordion1', [
				'label' => 'Kategorie produktów',
				'open' => false,
				'multi_expand' => true,
			])
			->addTab('Elementy', ['placement' => 'top'])
			->addGroup('g_categories', ['label' => ''])
			->addText('title', ['label' => 'Tytuł'])
			->addWysiwyg('txt', [
				'label' => 'Treść',
				'tabs' => 'all', // 'visual', 'text', 'all'
				'toolbar' => 'full', // 'basic', 'full'
				'media_upload' => true,
			])
			->addTaxonomy('selected_categories', [
				'label' => 'Wybierz kategorie',
				'instructions' => 'Wybierz kategorie do wyświetlenia w sliderze. Jeśli zostawisz puste, wyświetlą się wszystkie główne kategorie.',
				'taxonomy' => 'product_cat',
				'field_type' => 'checkbox',
				'add_term' => 0,
				'load_terms' => 1,
				'save_terms' => 0,
				'return_format' => 'id',
			])
			->addTrueFalse('hide_empty', [
				'label' => 'Ukryj puste kategorie',
				'instructions' => 'Czy ukryć kategorie, które nie mają przypisanych produktów?',
				'ui' => 1,
				'default_value' => 1,
			])
			->endGroup()
			->addTab('Ustawienia bloku', ['placement' => 'top'])
			->addText('section_id', [
				'label' => 'ID',
			])
			->addText('section_class', [
				'label' => 'Dodatkowe klasy CSS',
			])
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
			->addTrueFalse('nomt', [
				'label' => 'Usunięcie marginesu górnego',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('gap', [
				'label' => 'Większy odstęp',
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
			->addTrueFalse('graybg', [
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
			->addTrueFalse('brandbg', [
				'label' => 'Tło marki',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('darkbg', [
				'label' => 'Ciemne tło',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			]);

		return $categories;
	}

	public function getCategories()
	{
		$group = get_field('g_categories');

		if (empty($group)) {
			return [];
		}

		$selected_ids = $group['selected_categories'] ?? [];
		$hide_empty = $group['hide_empty'] ?? true;

		$args = [
			'taxonomy'   => 'product_cat',
			'orderby'    => 'name',
			'order'      => 'ASC',
			'hide_empty' => $hide_empty,
		];

		if (!empty($selected_ids)) {
			$args['include'] = $selected_ids;
			$args['orderby'] = 'include';
		} else {
			$args['parent'] = 0;
		}

		$product_categories = get_terms($args);

		if (is_wp_error($product_categories) || empty($product_categories)) {
			return [];
		}

		return array_map(function ($term) {
			$thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
			$image_url = $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : wc_placeholder_img_src('woocommerce_thumbnail');

			return [
				'name' => $term->name,
				'url' => get_term_link($term),
				'image_url' => $image_url,
			];
		}, $product_categories);
	}

	public function with()
	{
		return [
			'g_categories' => get_field('g_categories'),
			'categories' => $this->getCategories(),
			'section_id' => get_field('section_id'),
			'section_class' => get_field('section_class'),
			'nomt' => get_field('nomt'),
			'lightbg' => get_field('lightbg'),
			'graybg' => get_field('graybg'),
			'whitebg' => get_field('whitebg'),
			'darkbg' => get_field('darkbg'),
			'brandbg' => get_field('brandbg'),
		];
	}
}
