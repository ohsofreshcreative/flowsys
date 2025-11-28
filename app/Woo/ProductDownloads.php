<?php

add_action('acf/init', function () {
	if (!function_exists('acf_add_local_field_group')) return;

	acf_add_local_field_group([
		'key' => 'product_downloads',
		'title' => 'Materiały do pobrania',
		'menu_order' => 3,
		'fields' => [
			[
				'key' => 'field_product_downloads',
				'label' => '',
				'name' => 'product_downloads',
				'type' => 'group',
				'layout' => 'table',
				'sub_fields' => [
					[
						'key' => 'g_downloads',
						'label' => 'Materialy do pobrania',
						'name' => 'g_downloads',
						'type' => 'group',
						'layout' => 'block',
						'sub_fields' => [
							[
								'key' => 'section_header',
								'label' => 'Nagłówek sekcji',
								'name' => 'section_header',
								'type' => 'text',
							],
							[
								'key' => 'section_text',
								'label' => 'Tekst pod nagłówkiem',
								'name' => 'section_text',
								'type' => 'textarea',
								'new_lines' => 'br', // zachowaj \n jako <br>, ewentualnie 'wpautop'
								'rows' => 4,
							],
							[
								'key' => 'r_downloads',
								'label' => 'Slajdy',
								'name' => 'r_downloads',
								'type' => 'repeater',
								'layout' => 'row',
								'button_label' => 'Dodaj slajd',
								'sub_fields' => [
									[
										'key' => 'file',
										'label' => 'Plik',
										'name' => 'file',
										'type' => 'file',
										'return_format' => 'array', // lub 'url' / 'id' jak wolisz
										'library' => 'all', // lub 'uploadedTo' jeśli ma ograniczać do bieżącego posta
										'mime_types' => '', // np. 'pdf,doc,docx,jpg,png' jeśli chcesz ograniczyć
									],
									[
										'key' => 'header',
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
