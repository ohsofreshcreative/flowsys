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

<!--- cta --->

<section @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-cta bg-background-brand radius mt-20 {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper relative radius grid grid-cols-1 lg:grid-cols-2 items-center section-gap z-10 p-10">
		@if (!empty($g_cta['image']))
		<div class="__img order1">
			<img data-gsap-element="img" class="object-cover w-full __img radius-img" src="{{ $g_cta['image']['url'] }}" alt="{{ $g_cta['image']['alt'] ?? '' }}">
		</div>
		@endif
		<div class="__content">

			<h3 data-gsap-element="header" class="text-white mt-6">{{ $g_cta['header'] }}</h3>
			<p data-gsap-element="text" class="text-white">{!! strip_tags($g_cta['text']) !!}</p>

			@if (!empty($g_cta['button']))
			<a data-gsap-element="btn" class="main-btn m-btn" href="{{ $g_cta['button']['url'] }}">{{ $g_cta['button']['title'] }}</a>
			@endif
		</div>

	</div>

	<img class="__bg absolute max-w-[360px] -bottom-16 -right-16 pointer-events-none" src="/wp-content/uploads/2025/12/logo-stroke.svg" />
</section>