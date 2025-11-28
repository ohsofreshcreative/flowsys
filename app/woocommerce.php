<?php

/**
 * Theme setup.
 */
// Wyłącz liczniki w widgetach/warstwach Woo
add_filter('woocommerce_layered_nav_count', '__return_false');
add_filter('woocommerce_product_categories_widget_args', function ($args) {
  $args['show_count'] = 0;
  return $args;
});

add_action('wp', function () {
  if (is_product()) {
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
  }
});
