<?php

add_action('acf/init', function () {
  if (!function_exists('acf_add_local_field_group')) return;

  acf_add_local_field_group([
    'key' => 'group_product_extras',
    'title' => 'Sekcja hero',
	'menu_order' => 1,   
    'fields' => [
      [
        'key' => 'field_product_extras',
        'label' => '',
        'name' => 'product_extras',
        'type' => 'group',
        'layout' => 'block',
        'sub_fields' => [
          [
            'key' => 'field_product_extras_image',
            'label' => 'Obraz',
            'name' => 'image',
            'type' => 'image',
            'return_format' => 'array',
          ],
          [
            'key' => 'field_product_extras_content',
            'label' => 'Treść',
            'name' => 'content',
            'type' => 'wysiwyg',
            'tabs' => 'all',
            'toolbar' => 'full',
            'media_upload' => 0,
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
