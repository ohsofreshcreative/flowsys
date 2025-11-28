@php
  // Pobierz repeater ACF z produktu
  $extras = get_field('product_extras', get_the_ID());
@endphp

@if (!empty($extras))
  <section class="product-extras pt-6 mt-6 space-y-3 b-border-t">
    @foreach ($extras as $row)
      @php
        $img = $row['image'] ?? null;
        $txt = $row['text'] ?? '';
      @endphp

      <article class="product-extra flex gap-3 items-start">
        <div class="product-extra__media">
          @if ($img && !empty($img['url']))
            <img src="{{ esc_url($img['url']) }}" alt="{{ esc_attr($img['alt'] ?? '') }}">
          @endif
        </div>

        <div class="product-extra__content">
          {!! nl2br(e($txt)) !!}
          {{-- Jeśli subpole jest WYSIWYG, użyj po prostu: {!! $txt !!} --}}
        </div>
      </article>
    @endforeach
  </section>
@endif
