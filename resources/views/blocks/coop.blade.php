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

<section data-gsap-anim="section" class="coop  -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main relative">
		<h2 class="m-header">{{ strip_tags($g_coop['header']) }}</h2>

		<div class="">
			@foreach ($g_coop['r_coop'] as $item)
			<div class="__card border-top-p grid grid-cols-1 md:grid-cols-4 items-center gap-6 pt-6 mt-6">
				<p class="text-h4">{{ $item['title'] }}</p>
				<p class="">{{ $item['text'] }}</p>
				<a class="__phone" href="tel:{{ $item['phone'] }}" class="link link-arrow mt-2 inline-block">{{ $item['phone'] }}</a>
				<a class="__mail" href="mailto:{{ $item['mail'] }}" class="link link-arrow mt-2 inline-block">{{ $item['mail'] }}</a>
			</div>
			@endforeach
		</div>
	<div class="__glow"></div>
	</div>
</section>