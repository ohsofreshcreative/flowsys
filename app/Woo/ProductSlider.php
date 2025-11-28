<?php

add_action('acf/init', function () {
	if (!function_exists('acf_add_local_field_group')) return;

	acf_add_local_field_group([
		'key' => 'product_slider',
		'title' => 'Slider',
		'menu_order' => 3,
		'fields' => [
			[
				'key' => 'field_product_slider',
				'label' => '',
				'name' => 'product_slider',
				'type' => 'group',
				'layout' => 'table',
				'sub_fields' => [
					[
						'key' => 'field_pa_swiper',
						'label' => 'Sekcja slider',
						'name' => 'swiper_section',
						'type' => 'group',
						'layout' => 'block',
						'sub_fields' => [
							[
								'key' => 'field_pa_swiper_header',
								'label' => 'Nagłówek sekcji',
								'name' => 'section_header',
								'type' => 'text',
							],
							[
								'key' => 'field_pa_swiper_text',
								'label' => 'Tekst pod nagłówkiem',
								'name' => 'section_text',
								'type' => 'textarea',
								'new_lines' => 'br', // zachowaj \n jako <br>, ewentualnie 'wpautop'
								'rows' => 4,
							],
							[
								'key' => 'field_pa_swiper_items',
								'label' => 'Slajdy',
								'name' => 'slides',
								'type' => 'repeater',
								'layout' => 'row',
								'button_label' => 'Dodaj slajd',
								'sub_fields' => [
									[
										'key' => 'field_pa_swiper_item_image',
										'label' => 'Obraz',
										'name' => 'image',
										'type' => 'image',
										'return_format' => 'array',
										'preview_size' => 'thumbnail',
									],
									[
										'key' => 'field_pa_swiper_item_header',
										'label' => 'Nagłówek',
										'name' => 'header',
										'type' => 'text',
									],
								],
							],
						],
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
