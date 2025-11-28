@php
$sectionClass = '';
$sectionClass .= $lightbg ? ' section-light' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
@endphp

<!--- cta-bg -->

<section data-gsap-anim="section" class="s-cta-bg c-main -smt {{ $sectionClass }} {{ $section_class }}">

	<div data-gsap-element="bg" class="__wrapper radius grid grid-cols-1 lg:grid-cols-[2fr_1fr] items-center section-gap p-10 md:px-14 md:py-20" style="background-image:linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('{{ $cta_bg['image']['url'] }}'); background-size:cover; background-position:center;">

		<div data-gsap-element="txt" class="__content">
			@if ($cta_bg['title'])
			<p class="primary">{{ strip_tags($cta_bg['subtitle']) }}</p>
			<h3 class="text-white mt-6">{{ $cta_bg['title'] }}</h3>
			@endif
		</div>

		@if (!empty($cta_bg['button']))
		<a data-gsap-element="btn" class="main-btn m-btn" href="{{ $cta_bg['button']['url'] }}">{{ $cta_bg['button']['title'] }}</a>
		@endif
		
	</div>

</section>