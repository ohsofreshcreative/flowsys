@php
  defined('ABSPATH') || exit;
  do_action('woocommerce_before_checkout_form', $checkout);
@endphp

@if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() )
  {!! esc_html( apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')) ) !!}
  @php return; @endphp
@endif

<form
  name="checkout"
  method="post"
  class="checkout woocommerce-checkout"
  action="{{ esc_url( wc_get_checkout_url() ) }}"
  enctype="multipart/form-data"
  aria-label="{{ esc_attr__( 'Checkout', 'woocommerce' ) }}"
>
  @if ( $checkout->get_checkout_fields() )
    @php do_action('woocommerce_checkout_before_customer_details'); @endphp

    {{-- Layout: lewa/prawa kolumna --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-start">

      {{-- LEWA: dane klienta + wysyłka na inny adres + uwagi --}}
      <div id="customer_details" class="space-y-8">
        <div class="col-1 space-y-4">
          @php do_action('woocommerce_checkout_billing'); @endphp
        </div>

        <div class="col-2 space-y-4">
          {{-- W tym hooku WooCommerce renderuje:
               - checkbox „Wyślij na inny adres?”
               - pola adresu wysyłki (jeśli zaznaczone)
               - UWAGI do zamówienia (jeśli włączone w ustawieniach)
          --}}
          @php do_action('woocommerce_checkout_shipping'); @endphp
        </div>
      </div>

      {{-- PRAWA: podsumowanie zamówienia + wysyłka + płatność + przycisk Zamów --}}
      <div class="order-review sticky top-6">
        @php do_action('woocommerce_checkout_before_order_review_heading'); @endphp

        <h3 id="order_review_heading" class="text-xl font-semibold mb-4">
          {{ esc_html__('Your order', 'woocommerce') }}
        </h3>

        @php do_action('woocommerce_checkout_before_order_review'); @endphp

        <div id="order_review" class="woocommerce-checkout-review-order">
          {{-- To wyświetla:
               - listę pozycji
               - metody wysyłki
               - podsumowanie kwot
               - metody płatności
               - przycisk „Place order” (zmienimy na „Zamów” filtrem poniżej, jeśli chcesz)
          --}}
          @php do_action('woocommerce_checkout_order_review'); @endphp
        </div>

        @php do_action('woocommerce_checkout_after_order_review'); @endphp
      </div>

    </div>

    @php do_action('woocommerce_checkout_after_customer_details'); @endphp
  @endif
</form>

@php do_action('woocommerce_after_checkout_form', $checkout); @endphp
