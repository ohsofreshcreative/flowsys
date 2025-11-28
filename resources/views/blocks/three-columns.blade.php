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
$sectionClass .= $darkbg ? ' section-dark' : '';
@endphp

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="three-columns -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main">
		<div class="grid grid-cols-1 lg:grid-cols-[1.5fr_1fr_1fr] gap-8">


			<div class="__first">
				<h3 data-gsap-element="header" class="m-header">{{ strip_tags($threecols['header']) }}</h3>
				<p data-gsap-element="txt" class="">{{ strip_tags($threecols['text']) }}</p>

				@if (!empty($threecols['button']))
				<a data-gsap-element="btn" class="main-btn m-btn" href="{{ $threecols['button']['url'] }}">{{ $threecols['button']['title'] }}</a>
				@endif
				@if (!empty($threecols['image1']))
				<img data-gsap-element="img" class="relative radius-img img-xs mt-10 ml-auto" src="{{ $threecols['image1']['url'] }}" alt="{{ $threecols['image1']['alt'] ?? '' }}">
				@endif
			</div>

			<div class="__second">
				@if (!empty($threecols['image2']))
				<img data-gsap-element="img" class="radius-img" src="{{ $threecols['image2']['url'] }}" alt="{{ $threecols['image2']['alt'] ?? '' }}">
				@endif
			</div>
			<div class="__third self-end">
				@if (!empty($threecols['image3']))
				<img data-gsap-element="img" class="radius-img" src="{{ $threecols['image3']['url'] }}" alt="{{ $threecols['image3']['alt'] ?? '' }}">
				@endif

				<p data-gsap-element="txt" class="mt-6">{{ strip_tags($threecols['text2']) }}</p>
			</div>

		</div>
	</div>
</section>