{{-- resources/views/woocommerce/single-product/related.blade.php --}}

@php
  // Zabezpieczenie przed pustą listą
  $has_related = !empty($related_products);

  // Nagłówek sekcji
  $heading = apply_filters('woocommerce_product_related_products_heading', __('Related products', 'woocommerce'));

  // Ustal nadrzędną (root) kategorię bieżącego produktu
  $parent_cat_link = '';
  $parent_cat_name = '';

  if (function_exists('wc_get_product')) {
    global $product;

    if ($product instanceof \WC_Product) {
      $terms = get_the_terms($product->get_id(), 'product_cat');

      if ($terms && !is_wp_error($terms)) {
        $top_candidate = null;

        foreach ($terms as $t) {
          $ancestors = get_ancestors($t->term_id, 'product_cat'); // od najbliższego do najdalszego
          $top_id    = $ancestors ? end($ancestors) : $t->term_id; // ostatni to root
          $candidate = get_term($top_id, 'product_cat');

          if ($candidate && !is_wp_error($candidate)) {
            $top_candidate = $candidate;
            break; // bierzemy pierwszą znalezioną root-kategorię
          }
        }

        if ($top_candidate) {
          $link = get_term_link($top_candidate, 'product_cat');
          if (!is_wp_error($link)) {
            $parent_cat_link = $link;
            $parent_cat_name = $top_candidate->name;
          }
        }
      }
    }
  }
@endphp

@if ($has_related)
  <section class="related products b-border-t pt-14">

    @if ($heading)
      <div class="mb-14 flex items-center justify-between gap-4">
        <h2 class="m-0">{{ esc_html($heading) }}</h2>

        @if ($parent_cat_link)
          <a href="{{ esc_url($parent_cat_link) }}"
             class="underline-btn"
             aria-label="{{ esc_attr(sprintf(__('Show all in %s', 'woocommerce'), $parent_cat_name)) }}">
            Pokaż wszystkie
            <span class="sr-only">w kategorii {{ esc_html($parent_cat_name) }}</span>
          </a>
        @endif
      </div>
    @endif

    @php woocommerce_product_loop_start(); @endphp

      @foreach ($related_products as $related_product)
        @php
          $post_object = get_post($related_product->get_id());
          setup_postdata($GLOBALS['post'] = $post_object); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found
          wc_get_template_part('content', 'product');
        @endphp
      @endforeach

    @php woocommerce_product_loop_end(); @endphp

  </section>

  @php wp_reset_postdata(); @endphp
@endif
