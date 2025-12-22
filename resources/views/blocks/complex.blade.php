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

<!--- complex --->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-complex -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main">

		<div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
			<div class="__content">
				<h3 data-gsap-element="header" class="m-header">{{ strip_tags($g_complex['header']) }}</h3>
				<div data-gsap-element="text">{!! $g_complex['text'] !!}</div>
			</div>

			@if (!empty($g_complex['image']))
			<div data-gsap-element="img" class="__img order1">
				<img class="object-cover w-full __img radius-img" src="{{ $g_complex['image']['url'] }}" alt="{{ $g_complex['image']['alt'] ?? '' }}">
			</div>
			@endif
		</div>

		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-10">
			@foreach ($r_complex as $item)
			<div data-gsap-element="card" class="__card relative bg-gray radius flex items-center gap-6 p-10">
				@if (!empty($item['image']['url']))
				<img class="" src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] ?? '' }}" />
				@endif
				@if (!empty($item['title']))
				<h6 class="">{{ $item['title'] }}</h6>
				@endif
			</div>
			@endforeach
		</div>

	</div>
</section>