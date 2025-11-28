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

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-cta mt-20 {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper radius grid grid-cols-1 lg:grid-cols-2 items-center section-gap p-10 md:px-14 md:py-20" style="background-image:linear-gradient(90deg, rgba(0, 83, 39,0.2), rgba(0, 83, 39,0.7) 30%, rgba(0, 83, 39,1) 50%), url('{{ $g_cta['image']['url'] }}'); background-size:cover; background-position:center;">
	<div></div>
		<div class="__content">
			@if ($g_cta['title'])
			<p class="primary">{{ strip_tags($g_cta['title']) }}</p>
			@endif
			<h3 class="text-white mt-6">{{ $g_cta['header'] }}</h3>
			<p class="text-white">{{ strip_tags($g_cta['text']) }}</p>

			@if (!empty($g_cta['button']))
			<a class="main-btn m-btn" href="{{ $g_cta['button']['url'] }}">{{ $g_cta['button']['title'] }}</a>
			@endif
		</div>

	</div>

</section>