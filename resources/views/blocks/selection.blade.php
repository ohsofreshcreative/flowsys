@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $gap ? ' wider-gap' : '';
$sectionClass .= $lightbg ? ' section-light' : '';
$sectionClass .= $graybg ? ' section-gray' : '';
$sectionClass .= $whitebg ? ' section-white' : '';
$sectionClass .= $brandbg ? ' section-brand' : '';
$sectionClass .= $darkbg ? ' section-dark' : '';

$title = $g_selection['title'] ?? '';
$category_id = $g_selection['selection'] ?? null;

if (!$category_id) {
    if (is_admin()) {
        echo '<p>Wybierz kategorię w ustawieniach bloku.</p>';
    }
    return;
}

$args = [
    'post_type' => 'product',
    'posts_per_page' => -1, 
    'tax_query' => [
        [
            'taxonomy' => 'product_cat',
            'field' => 'term_id',
            'terms' => $category_id,
        ],
    ],
];

$products_query = new WP_Query($args);
@endphp

<!--- selection -->
<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="s-selection relative -smt {{ $sectionClass }} {{ $section_class }}">
    <div class="c-main">
        @if($title)
            <h3 class="m-header mb-16">{{ $title }}</h3>
        @endif

        @if ($products_query->have_posts())
            <div class="products_grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                @while ($products_query->have_posts()) @php $products_query->the_post() @endphp
                    @php wc_get_template_part('content', 'product') @endphp
                @endwhile
            </div>
            @php wp_reset_postdata() @endphp
        @else
            <p class="text-center">Nie znaleziono produktów w tej kategorii.</p>
        @endif
    </div>
</section>