<?php

add_action('acf/init', function () {
    if (!function_exists('acf_add_local_field_group')) return;

    acf_add_local_field_group([
        'key' => 'product_about',
        'title' => 'O produkcie',
        'menu_order' => 2, 
        'fields' => [
            [
                'key' => 'field_product_about',
                'label' => '',
                'name' => 'product_about',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => [
                    [
                        'key' => 'field_product_about_main_header', // Zmieniony klucz dla unikalności
                        'label' => 'Nagłówek główny',
                        'name' => 'header',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_product_about_repeater',
                        'label' => 'Elementy',
                        'name' => 'items',
                        'type' => 'repeater',
                        'layout' => 'table',
                        'button_label' => 'Dodaj element',
                        'sub_fields' => [
                            [
                                'key' => 'field_product_about_repeater_title',
                                'label' => 'Tytuł',
                                'name' => 'title',
                                'type' => 'text',
                            ],
                            [
                                'key' => 'field_product_about_repeater_header',
                                'label' => 'Nagłówek',
                                'name' => 'header',
                                'type' => 'text',
                            ],
                            [
                                'key' => 'field_product_about_repeater_content',
                                'label' => 'Treść',
                                'name' => 'content',
                                'type' => 'wysiwyg',
                                'tabs' => 'all',
                                'toolbar' => 'full',
                                'media_upload' => false,
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