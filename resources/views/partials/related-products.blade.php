@php
// Pobierz ID bieżącego produktu
$current_product_id = get_the_ID();

// Pobierz ID kategorii, do których należy bieżący produkt
$term_ids = wp_get_post_terms($current_product_id, 'product_cat', ['fields' => 'ids']);

// Przygotuj zapytanie tylko jeśli produkt ma kategorie
if (!empty($term_ids) && !is_wp_error($term_ids)) {
    $args = [
        'post_type' => 'product',
        'posts_per_page' => 4, // Ile podobnych produktów pokazać
        'post__not_in' => [$current_product_id], // Wyklucz bieżący produkt z listy
        'tax_query' => [
            [
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => $term_ids,
            ],
        ],
    ];

    $related_products_query = new WP_Query($args);
}
@endphp

{{-- Wyświetl sekcję tylko jeśli znaleziono podobne produkty --}}
@if(isset($related_products_query) && $related_products_query->have_posts())
<section class="related-products s-selection relative -smt">
    <div class="c-main">
        <h3 class="m-header">Pozostałe z tej kategorii</h3>

        <div class="products_grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
            @while ($related_products_query->have_posts()) @php $related_products_query->the_post() @endphp
                @php wc_get_template_part('content', 'product') @endphp
            @endwhile
        </div>
        @php wp_reset_postdata() @endphp
    </div>
</section>
@endif