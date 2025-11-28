<?php

add_action('acf/init', function () {
  if (!function_exists('acf_add_local_field_group')) return;

  acf_add_local_field_group([
    'key' => 'group_product_contact',
    'title' => 'Kontakt',
    'menu_order' => 5,
    'fields' => [
      [
        'key' => 'field_pc_root',
        'label' => '',
        'name' => 'product_contact',
        'type' => 'group',
        'layout' => 'block',
        'sub_fields' => [

          // --- DANE (jak w g_contact_1) ---
          [
            'key' => 'field_pc_g_contact_1',
            'label' => 'Dane',
            'name'  => 'g_contact_1',
            'type'  => 'group',
            'layout'=> 'block',
            'sub_fields' => [
              [
                'key' => 'field_pc_header',
                'label' => 'Tytuł',
                'name'  => 'header',
                'type'  => 'text',
              ],
              [
                'key' => 'field_pc_txt',
                'label' => 'Treść',
                'name'  => 'txt',
                'type'  => 'wysiwyg',
                'tabs'  => 'all',
                'toolbar' => 'full',
                'media_upload' => true,
              ],
              [
                'key' => 'field_pc_image',
                'label' => 'Obraz',
                'name'  => 'image',
                'type'  => 'image',
                'return_format' => 'array',
                'preview_size'  => 'medium',
              ],
            ],
          ],

          // --- FORMULARZ (jak w g_contact_2) ---
          [
            'key' => 'field_pc_g_contact_2',
            'label' => 'Formularz',
            'name'  => 'g_contact_2',
            'type'  => 'group',
            'layout'=> 'block',
            'sub_fields' => [
              [
                'key' => 'field_pc_form_title',
                'label' => 'Tytuł',
                'name'  => 'title',
                'type'  => 'text',
              ],
              [
                'key' => 'field_pc_shortcode',
                'label' => 'Kod formularza',
                'name'  => 'shortcode',
                'type'  => 'text',
                'instructions' => 'Wklej kod, np. [contact-form-7 id="f12c470" title="Contact form 1"]',
                'default_value' => '[contact-form-7 id="f12c470" title="Contact form 1"]',
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
    'style'  => 'default',
  ]);
});
