@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $nolist ? ' no-list' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $gap ? ' wider-gap' : '';

if (!empty($background) && $background !== 'none') {
$sectionClass .= ' ' . $background;
}
@endphp

<!--- tiles -->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-tiles relative -spt overflow-hidden {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main relative z-10">

		<h2 data-gsap-element="header" class="w-full md:w-1/2">{{ $g_tiles['header'] }}</h2>

		<div class="__col grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16 mt-10">
			@if (!empty($g_tiles['image']))
			<div data-gsap-element="img" class="__img order1">
				<img class="object-cover w-full h-full radius-img" src="{{ $g_tiles['image']['url'] }}" alt="{{ $g_tiles['image']['alt'] ?? '' }}">
			</div>
			@endif

			<div class="__content order2">

				<h4 data-gsap-element="title" class="">{{ $g_tiles['title'] }}</h4>
				<div data-gsap-element="txt" class="__txt mt-2">
					{!! $g_tiles['txt'] !!}
				</div>

				@if (!empty($g_tiles['button']))
				<a data-gsap-element="btn" class="main-btn m-btn align-self-bottom" href="{{ $g_tiles['button']['url'] }}">{{ $g_tiles['button']['title'] }}</a>
				@endif

			</div>

		</div>
	</div>

	<img data-gsap-element="bg" class="__bg absolute w-[400px] -top-52 right-0 pointer-events-none" src="/wp-content/uploads/2025/12/sign_small.svg" />
</section>