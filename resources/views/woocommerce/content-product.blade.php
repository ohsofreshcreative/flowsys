@php
defined('ABSPATH') || exit;
@endphp

@php global $product; @endphp

<li {!! wc_product_class(' border-left-p bg-white block !px-10 !py-14', $product) !!}>
	<!--<figure class="woocommerce-product-figure relative">
		@if($product && $product->is_on_sale())
		<span class="onsale">Promocja!</span>
		@endif

		  <a href="{{ get_permalink() }}">
      <img src="{{ get_the_post_thumbnail_url($product->get_id(), 'large') }}"
           alt="{{ get_the_title() }}" class="img-m" />
    </a>
	</figure> -->

	<h6 class="woocommerce-loop-product__title">
		<a href="{{ get_permalink() }}">{!! get_the_title() !!}</a>
	</h6>

	<a href="{{ get_permalink() }}" class="underline-btn mt-4">Zobacz produkty</a>
	@php do_action('woocommerce_after_shop_loop_item_title') @endphp
</li>