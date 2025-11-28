<?php

add_action('acf/init', function () {
	if (!function_exists('acf_add_local_field_group')) return;

	acf_add_local_field_group([
		'key' => 'product_shop',
		'title' => 'Kup online',
		'menu_order' => 2, 
		'fields' => [
			[
				'key' => 'field_product_shop',
				'label' => '',
				'name' => 'product_shop',
				'type' => 'group',
				'layout' => 'block',
				'sub_fields' => [

					[
						'key' => 'image',
						'label' => 'Obraz',
						'name' => 'image',
						'type' => 'image',
						'return_format' => 'array',
					],
					[
						'key' => 'icon',
						'label' => 'Ikona',
						'name' => 'icon',
						'type' => 'image',
						'return_format' => 'array',
						'preview_size'  => 'thumbnail'
					],
					[
						'key' => 'title',
						'label' => 'Tytuł',
						'name' => 'title',
						'type' => 'text',
					],
					[
						'key' => 'header',
						'label' => 'Nagłówek',
						'name' => 'header',
						'type' => 'text',
					],
					[
						'key' => 'link',
						'label' => 'Link',
						'name' => 'link',
						'type' => 'link',
						'return_format' => 'array',
					],
				],
			],
		],
		'location' => [[
			['param' => 'post_type', 'operator' => '==', 'value' => 'product'],
		]],
		'position' => 'normal',
		'active' => true,
	]);
});
