@php
  defined('ABSPATH') || exit;
  do_action('woocommerce_before_cart');
@endphp

<div class="flex flex-col lg:flex-row gap-10">
  <div class="flex-1">
	<form class="woocommerce-cart-form" action="{{ esc_url( wc_get_cart_url() ) }}" method="post">
	  @php do_action('woocommerce_before_cart_table'); @endphp
	  <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
		<thead>
		  <tr>
			<th class="product-remove"><span class="screen-reader-text">{{ esc_html__('Remove item', 'woocommerce') }}</span></th>
			<th class="product-thumbnail"><span class="screen-reader-text">{{ esc_html__('Thumbnail image', 'woocommerce') }}</span></th>
			<th scope="col" class="product-name">{{ esc_html__('Product', 'woocommerce') }}</th>
			<th scope="col" class="product-price">{{ esc_html__('Price', 'woocommerce') }}</th>
			<th scope="col" class="product-quantity">{{ esc_html__('Quantity', 'woocommerce') }}</th>
			<th scope="col" class="product-subtotal">{{ esc_html__('Subtotal', 'woocommerce') }}</th>
		  </tr>
		</thead>
		<tbody>
		  @php do_action('woocommerce_before_cart_contents'); @endphp
		  @foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item)
			@php
			  $_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
			  $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
			  $product_name = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);
			@endphp
			@if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key))
			  @php
				$product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
			  @endphp
			  <tr class="woocommerce-cart-form__cart-item {{ esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)) }}">
				<td class="product-remove">
				  {!! apply_filters(
					  'woocommerce_cart_item_remove_link',
					  sprintf(
						'<a role="button" href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
						esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
						esc_attr( sprintf( __('Remove %s from cart', 'woocommerce'), wp_strip_all_tags( $product_name ) ) ),
						esc_attr( $product_id ),
						esc_attr( $_product->get_sku() )
					  ),
					  $cart_item_key
					)
				  !!}
				</td>
				<td class="product-thumbnail">
				  @php
					$thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
				  @endphp
				  @if (!$product_permalink)
					{!! $thumbnail !!}
				  @else
					<a href="{{ esc_url($product_permalink) }}">{!! $thumbnail !!}</a>
				  @endif
				</td>
				<th scope="row" class="product-name" data-title="{{ esc_attr__('Product', 'woocommerce') }}">
				  @if (!$product_permalink)
					{!! wp_kses_post($product_name . '&nbsp;') !!}
				  @else
					{!! wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key)) !!}
				  @endif
				  @php do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key); @endphp
				  {!! wc_get_formatted_cart_item_data($cart_item) !!}
				  @if ( $_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity']) )
					{!! wp_kses_post( apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>', $product_id) ) !!}
				  @endif
				</th>
				<td class="product-price" data-title="{{ esc_attr__('Price', 'woocommerce') }}">
				  {!! apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key) !!}
				</td>
				<td class="product-quantity" data-title="{{ esc_attr__('Quantity', 'woocommerce') }}">
				  @php
					if ( $_product->is_sold_individually() ) {
					  $min_quantity = 1;
					  $max_quantity = 1;
					} else {
					  $min_quantity = 0;
					  $max_quantity = $_product->get_max_purchase_quantity();
					}
					$product_quantity = woocommerce_quantity_input(
					  [
						'input_name'   => "cart[{$cart_item_key}][qty]",
						'input_value'  => $cart_item['quantity'],
						'max_value'    => $max_quantity,
						'min_value'    => $min_quantity,
						'product_name' => $product_name,
					  ],
					  $_product,
					  false
					);
				  @endphp
				  {!! apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item) !!}
				</td>
				<td class="product-subtotal" data-title="{{ esc_attr__('Subtotal', 'woocommerce') }}">
				  {!! apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key) !!}
				</td>
			  </tr>
			@endif
		  @endforeach
		  @php do_action('woocommerce_cart_contents'); @endphp
		  <tr>
			<td colspan="6" class="actions !pt-8 b-border-t">
			  @if ( wc_coupons_enabled() )
				<div class="coupon">
				  <label for="coupon_code" class="screen-reader-text">{{ esc_html__('Coupon:', 'woocommerce') }}</label>
				  <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="{{ esc_attr__('Coupon code', 'woocommerce') }}" />
				  <button type="submit" class="button{{ esc_attr( wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : '' ) }}" name="apply_coupon" value="{{ esc_attr__('Apply coupon', 'woocommerce') }}">
					{{ esc_html__('Apply coupon', 'woocommerce') }}
				  </button>
				  @php do_action('woocommerce_cart_coupon'); @endphp
				</div>
			  @endif
			  <button type="submit" class="button{{ esc_attr( wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : '' ) }}" name="update_cart" value="{{ esc_attr__('Update cart', 'woocommerce') }}">
				{{ esc_html__('Update cart', 'woocommerce') }}
			  </button>
			  @php do_action('woocommerce_cart_actions'); @endphp
			  @php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); @endphp
			</td>
		  </tr>
		  @php do_action('woocommerce_after_cart_contents'); @endphp
		</tbody>
	  </table>
	  @php do_action('woocommerce_after_cart_table'); @endphp
	</form>
  </div>

  <div class="w-auto">
	@php do_action('woocommerce_before_cart_collaterals'); @endphp
	<div class="cart-collaterals">
	  @php
		/**
		 * @hooked woocommerce_cross_sell_display
		 * @hooked woocommerce_cart_totals - 10
		 */
		do_action('woocommerce_cart_collaterals');
	  @endphp
	</div>
  </div>
</div>

@php do_action('woocommerce_after_cart'); @endphp
