<?php

add_action('acf/init', function () {
	if (!function_exists('acf_add_local_field_group')) return;

	acf_add_local_field_group([
		'key' => 'product_usage',
		'title' => 'Zastosowanie',
		'menu_order' => 4, 
		'fields' => [
			[
				'key' => 'field_product_usage',
				'label' => '',
				'name' => 'product_usage',
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
						'key' => 'header',
						'label' => 'Nagłówek',
						'name' => 'header',
						'type' => 'text',
					],
					[
						'key' => 'content',
						'label' => 'Treść',
						'name' => 'content',
						'type' => 'wysiwyg',
						'tabs' => 'all',
						'toolbar' => 'full',
						'media_upload' => false,
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
