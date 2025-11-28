@extends('layouts.app')

@section('content')
<main id="main" class="main c-main -spt">
	@php do_action('woocommerce_before_main_content') @endphp

	<header class="woocommerce-products-header">
		@if(apply_filters('woocommerce_show_page_title', true))
		<h1 class="woocommerce-products-header__title page-title">{!! woocommerce_page_title(false) !!}</h1>
		@endif
		@php do_action('woocommerce_archive_description') @endphp
	</header>


	{{-- Po prostu pętla z produktami, bez dodatkowych wrapperów --}}
	@if(woocommerce_product_loop())
	<div class="products_grid grid mb-22">
		@php
		do_action('woocommerce_before_shop_loop');
		woocommerce_product_loop_start();
		@endphp
	</div>

	@if(wc_get_loop_prop('total'))
	@while(have_posts())
	@php the_post(); wc_get_template_part('content', 'product'); @endphp
	@endwhile
	@endif

	@php
	woocommerce_product_loop_end();
	do_action('woocommerce_after_shop_loop');
	@endphp
	@else
	@php do_action('woocommerce_no_products_found') @endphp
	@endif

	@php do_action('woocommerce_after_main_content') @endphp
</main>
@endsection