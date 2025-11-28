@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $gap ? ' wider-gap' : '';

if (!empty($background) && $background !== 'none') {
    $sectionClass .= ' ' . $background;
}

@endphp

<!--- order -->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="s-order c-main relative -smt">

	<div class="__wrapper relative radius {{ $sectionClass }} {{ $section_class }}">
		<div class="__col grid grid-cols-1 lg:grid-cols-2 items-center gap-10">
			@if (!empty($g_order['image']))
			<div data-gsap-element="image" class="__img order1">
				<img class="__img img-2xl object-cover radius-left" src="{{ $g_order['image']['url'] }}" alt="{{ $g_order['image']['alt'] ?? '' }}">
			</div>
			@endif

			<div class="__content order2 w-10/12 md:w-3/4 m-auto mb-20">

				<img data-gsap-element="icon" class="__icon" src="{{ $g_order['icon']['url'] }}" alt="{{ $g_order['icon']['alt'] ?? '' }}">
				<p data-gsap-element="subtitle" class="primary text-2xl mt-4">{{ $g_order['subtitle'] }}</p>
				<h3 data-gsap-element="header" class="mt-4">{{ $g_order['header'] }}</h3>

				@if (!empty($g_order['button']))
				<a data-gsap-element="btn" class="main-btn m-btn" href="{{ $g_order['button']['url'] }}">{{ $g_order['button']['title'] }}</a>
				@endif

			</div>

		</div>

</section>