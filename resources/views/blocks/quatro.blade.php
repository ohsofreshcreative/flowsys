@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $gap ? ' wider-gap' : '';
$sectionClass .= $lightbg ? ' section-light' : '';
$sectionClass .= $graybg ? ' section-gray' : '';
$sectionClass .= $whitebg ? ' section-white' : '';
$sectionClass .= $brandbg ? ' section-brand' : '';

@endphp

<!--- quatro -->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="quatro relative -smt {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main relative">
		<div class="__col grid grid-cols-1 lg:grid-cols-2 items-center gap-10">
			@if (!empty($g_quatro['gallery']))
			<div data-gsap-element="image" class="__img order1">
				<div class="grid grid-cols-2 gap-4">
					@foreach ($g_quatro['gallery'] as $index => $image)
					<img
						src="{{ esc_url($image['url'] ?? '') }}"
						alt="{{ esc_attr($image['alt'] ?? '') }}"
						class="object-cover rounded-xl
      {{ $index === 0 ? 'h-60 w-3/4 justify-self-end' : '' }}
      {{ $index === 1 ? 'h-50 w-full self-end' : '' }}
      {{ $index === 2 ? 'h-50 w-full' : '' }}
      {{ $index === 3 ? 'h-60 w-3/4' : '' }}">
					@endforeach
				</div>
			</div>
			@endif

			<div class="__content order2">
				<h2 data-gsap-element="header" class="">{{ $g_quatro['title'] }}</h2>

				<div data-gsap-element="txt" class="mt-2">
					{!! $g_quatro['txt'] !!}
				</div>

				@if (!empty($g_quatro['button']))
				<a data-gsap-element="btn" class="main-btn m-btn" href="{{ $g_quatro['button']['url'] }}">{{ $g_quatro['button']['title'] }}</a>
				@endif

			</div>

		</div>

</section>