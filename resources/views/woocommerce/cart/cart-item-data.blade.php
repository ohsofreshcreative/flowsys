@php defined('ABSPATH') || exit; @endphp

<dl class="variation flex gap-2 text-xs">
  @foreach ($item_data as $data)
    <dt class="{{ sanitize_html_class('variation-' . $data['key']) }}">
      {!! wp_kses_post($data['key']) !!}:
    </dt>
    <dd class="{{ sanitize_html_class('variation-' . $data['key']) }}">
      {!! wp_kses_post( wpautop($data['display']) ) !!}
    </dd>
  @endforeach
</dl>
