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

<!--- quote -->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-quote relative -smt {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main relative z-10">

		<div class="__content order2">
			<h5 data-gsap-element="header" class="subtitle-p">{{ $g_quote['title'] }}</h5>
			<div data-gsap-element="text" class="text-h4 mt-4">{!! $g_quote['txt'] !!}</div>

			<div class="__signature flex flex-col md:flex-row items-start md:items-center gap-6 mt-6">
				@if (!empty($g_quote['image']))
				<div data-gsap-element="img" class="__img order1">
					<img class="object-cover w-full __img radius-img max-h-24 aspect-square" src="{{ $g_quote['image']['url'] }}" alt="{{ $g_quote['image']['alt'] ?? '' }}">
				</div>
				@endif
				<div data-gsap-element="text" class="text-h6">{{ $g_quote['signature'] }}</div>
			</div>

		</div>
	</div>
	<img class="__bg absolute -top-22 right-1/12 w-44 pointer-events-none" src="/wp-content/uploads/2025/12/sign_small.svg" />
</section>