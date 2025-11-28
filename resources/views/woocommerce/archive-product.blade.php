@extends('layouts.app')

@section('content')

<header class="woocommerce-products-header">
	@if (apply_filters('woocommerce_show_page_title', true))
	<h1 class="woocommerce-products-header__title page-title">{!! woocommerce_page_title(false) !!}</h1>
	@endif
</header>

@php
do_action('woocommerce_archive_description');
@endphp

<div class="flex flex-wrap lg:flex-nowrap gap-x-8">

	@if (is_active_sidebar('sidebar-shop'))
	<aside class="sidebar w-full lg:w-1/4">
		@php dynamic_sidebar('sidebar-shop') @endphp
	</aside>
	@endif

	<div class="content-products w-full {{ is_active_sidebar('sidebar-shop') ? 'lg:w-3/4' : 'lg:w-full' }}">
		@if (woocommerce_product_loop())
		@php
		do_action('woocommerce_before_shop_loop');
		woocommerce_product_loop_start();
		@endphp

		@if (wc_get_loop_prop('total'))
		@while (have_posts())
		@php
		the_post();
		wc_get_template_part('content', 'product');
		@endphp
		@endwhile
		@endif

		@php
		woocommerce_product_loop_end();
		do_action('woocommerce_after_shop_loop');
		@endphp
		@else
		@php do_action('woocommerce_no_products_found') @endphp
		@endif
	</div> {{-- Koniec .content-products --}}

</div> 


@php $term = get_queried_object() @endphp
@if ($term instanceof WP_Term && $term->taxonomy === 'product_cat')
<section class="shop-term-intro mt-8">
	@if (!empty(get_field('header', $term)))
	<h4 class="shop-term-heading">{{ get_field('header', $term) }}</h4>
	@endif
	@if (!empty(term_description($term->term_id, 'product_cat')))
	<div class="shop-term-description">{!! term_description($term->term_id, 'product_cat') !!}</div>
	@endif
</section>
@endif

@php
do_action('woocommerce_after_main_content');
do_action('get_footer', 'shop');
@endphp
@endsection