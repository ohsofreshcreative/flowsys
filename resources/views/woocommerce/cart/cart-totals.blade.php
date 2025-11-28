@php defined('ABSPATH') || exit; @endphp

<div class="cart_totals {{ WC()->customer->has_calculated_shipping() ? 'calculated_shipping' : '' }}">

  @php do_action('woocommerce_before_cart_totals'); @endphp

  <div class="bg-white b-border rounded-2xl p-6">
    <p class="text-xl font-medium !mb-4">{{ esc_html__('Cart totals', 'woocommerce') }}</p>

    <table cellspacing="0" class="shop_table shop_table_responsive">
      <tr class="cart-subtotal">
        <th>{{ esc_html__('Subtotal', 'woocommerce') }}</th>
        <td data-title="{{ esc_attr__('Subtotal', 'woocommerce') }}">
          {!! wc_cart_totals_subtotal_html() !!}
        </td>
      </tr>

      @foreach (WC()->cart->get_coupons() as $code => $coupon)
        <tr class="cart-discount coupon-{{ esc_attr(sanitize_title($code)) }}">
          <th>{!! wc_cart_totals_coupon_label($coupon) !!}</th>
          <td data-title="{{ esc_attr(wc_cart_totals_coupon_label($coupon, false)) }}">
            {!! wc_cart_totals_coupon_html($coupon) !!}
          </td>
        </tr>
      @endforeach

      @if (WC()->cart->needs_shipping() && WC()->cart->show_shipping())
        @php do_action('woocommerce_cart_totals_before_shipping'); @endphp
        {!! wc_cart_totals_shipping_html() !!}
        @php do_action('woocommerce_cart_totals_after_shipping'); @endphp
      @elseif (WC()->cart->needs_shipping() && 'yes' === get_option('woocommerce_enable_shipping_calc'))
        <tr class="shipping">
          <th>{{ esc_html__('Shipping', 'woocommerce') }}</th>
          <td data-title="{{ esc_attr__('Shipping', 'woocommerce') }}">
            @php woocommerce_shipping_calculator(); @endphp
          </td>
        </tr>
      @endif

      @foreach (WC()->cart->get_fees() as $fee)
        <tr class="fee">
          <th>{{ esc_html($fee->name) }}</th>
          <td data-title="{{ esc_attr($fee->name) }}">
            {!! wc_cart_totals_fee_html($fee) !!}
          </td>
        </tr>
      @endforeach

      @php
        $tax_enabled = wc_tax_enabled() && ! WC()->cart->display_prices_including_tax();
      @endphp
      @if ($tax_enabled)
        @php
          $taxable_address = WC()->customer->get_taxable_address();
          $estimated_text  = '';
          if (WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping()) {
            $estimated_text = sprintf(
              ' <small>' . esc_html__('(estimated for %s)', 'woocommerce') . '</small>',
              WC()->countries->estimated_for_prefix($taxable_address[0]) . WC()->countries->countries[$taxable_address[0]]
            );
          }
        @endphp

        @if ('itemized' === get_option('woocommerce_tax_total_display'))
          @foreach (WC()->cart->get_tax_totals() as $code => $tax)
            <tr class="tax-rate tax-rate-{{ esc_attr(sanitize_title($code)) }}">
              <th>{!! esc_html($tax->label) . $estimated_text !!}</th>
              <td data-title="{{ esc_attr($tax->label) }}">{!! wp_kses_post($tax->formatted_amount) !!}</td>
            </tr>
          @endforeach
        @else
          <tr class="tax-total">
            <th>{!! esc_html(WC()->countries->tax_or_vat()) . $estimated_text !!}</th>
            <td data-title="{{ esc_attr(WC()->countries->tax_or_vat()) }}">
              {!! wc_cart_totals_taxes_total_html() !!}
            </td>
          </tr>
        @endif
      @endif

      @php do_action('woocommerce_cart_totals_before_order_total'); @endphp
      <tr class="order-total">
        <th>{{ esc_html__('Total', 'woocommerce') }}</th>
        <td data-title="{{ esc_attr__('Total', 'woocommerce') }}">
          {!! wc_cart_totals_order_total_html() !!}
        </td>
      </tr>
      @php do_action('woocommerce_cart_totals_after_order_total'); @endphp
    </table>

  <div class="wc-proceed-to-checkout">
    @php do_action('woocommerce_proceed_to_checkout'); @endphp
  </div>

  @php do_action('woocommerce_after_cart_totals'); @endphp
  </div>
</div>
