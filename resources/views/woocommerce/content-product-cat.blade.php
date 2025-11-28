{{-- resources/views/woocommerce/content-product_cat.blade.php --}}
@php
if (empty($category)) {
return;
}

if (isset($category->name) && $category->name === 'Wszystkie produkty') {
    return;
}

// Pobranie klas kategorii i zamiana na string jeśli tablica
$classes = wc_get_product_cat_class('product-category product', $category);
if (is_array($classes)) {
$classes = implode(' ', $classes);
}
@endphp



<li class="__product border-left-p">

	@php do_action('woocommerce_before_subcategory', $category); @endphp

	<a href="{{ esc_url(get_term_link($category, 'product_cat')) }}"
		class="woocommerce-LoopCategory-link woocommerce-loop-category__link block h-full !px-10 !py-14 bg-white hover:bg-green-50"
		aria-label="{{ esc_attr($category->name) }}">

		@php do_action('woocommerce_before_subcategory_title', $category); @endphp

		<h2 class="woocommerce-loop-category__title text-left text-h6 !mt-8">
			{{ $category->name }}

			@if (!empty($category->count))
			{!! apply_filters(
			'woocommerce_subcategory_count_html',
			' <mark class="count">' . intval($category->count) . '</mark>',
			$category
			) !!}
			@endif
		</h2>

		<p class="underline-btn mt-4">Zobacz produkty</p>

		@php do_action('woocommerce_after_subcategory_title', $category); @endphp
	</a>

	@php do_action('woocommerce_after_subcategory', $category); @endphp
</li>