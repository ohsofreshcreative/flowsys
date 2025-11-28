@php defined('ABSPATH') || exit; @endphp

<div class="quantity flex items-center">
    <button type="button" class="qty-btn __first minus px-2 py-1 " aria-label="Zmniejsz ilość">-</button>
    
    <input
        type="number"
        id="{{ esc_attr( $input_id ) }}"
        class="input-text qty text w-16 text-center py-1"
        name="{{ esc_attr( $input_name ) }}"
        value="{{ esc_attr( $input_value ) }}"
        aria-label="{{ esc_attr_x( 'Product quantity', 'Product quantity input tooltip', 'woocommerce' ) }}"
        size="4"
        min="{{ esc_attr( $min_value ) }}"
        max="{{ esc_attr( $max_value ) ?: '' }}"
        step="{{ esc_attr( $step ) }}"
        placeholder="{{ esc_attr( $placeholder ) }}"
        inputmode="{{ esc_attr( $inputmode ) }}"
        autocomplete="{{ esc_attr( isset($autocomplete) ? $autocomplete : 'on' ) }}"
    />

    <button type="button" class="qty-btn __second plus px-2 py-1" aria-label="Zwiększ ilość">+</button>
</div>
