@php
  defined('ABSPATH') || exit;

  // Ochrona dla starszych WC
  if (!function_exists('wc_get_gallery_image_html')) {
    return;
  }

  global $product;

  $columns           = apply_filters('woocommerce_product_thumbnails_columns', 4);
  $post_thumbnail_id = $product ? $product->get_image_id() : 0;

  $wrapper_classes = apply_filters(
    'woocommerce_single_product_image_gallery_classes',
    [
      'woocommerce-product-gallery',
      'woocommerce-product-gallery--' . ($post_thumbnail_id ? 'with-images' : 'without-images'),
      'woocommerce-product-gallery--columns-' . absint($columns),
      'images',
    ]
  );

  $wrapper_class_attr = implode(' ', array_map('sanitize_html_class', $wrapper_classes));
@endphp

<div class="{{ $wrapper_class_attr }}" data-columns="{{ esc_attr($columns) }}" style="opacity: 0; transition: opacity .25s ease-in-out;">
  <div class="woocommerce-product-gallery__wrapper">
    @php
      if ($post_thumbnail_id) {
        // Główne zdjęcie
        $html = wc_get_gallery_image_html($post_thumbnail_id, true);
      } else {
        // Placeholder (zmienna jeśli produkt typu variable ma wariacje ze zdjęciem)
        $wrapper_classname = ($product && $product->is_type('variable') && !empty($product->get_available_variations('image')))
          ? 'woocommerce-product-gallery__image woocommerce-product-gallery__image--placeholder'
          : 'woocommerce-product-gallery__image--placeholder';

        $html  = sprintf('<div class="%s">', esc_attr($wrapper_classname));
        $html .= sprintf(
          '<img src="%s" alt="%s" class="wp-post-image" />',
          esc_url(wc_placeholder_img_src('woocommerce_single')),
          esc_html__('Awaiting product image', 'woocommerce')
        );
        $html .= '</div>';
      }

      // Filtr dla HTML miniatury głównej
      echo apply_filters('woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id);

      // Galeria / miniatury pod spodem
      do_action('woocommerce_product_thumbnails');
    @endphp
  </div>
</div>
