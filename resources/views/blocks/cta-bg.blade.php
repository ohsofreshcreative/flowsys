@php
$sectionClass = '';
$sectionClass .= $lightbg ? ' section-light' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
@endphp

<!--- cta-bg -->

<section data-gsap-anim="section" class="s-cta-bg -smt relative {{ $sectionClass }} {{ $section_class }}" style="background-image:linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('{{ $cta_bg['image']['url'] }}'); background-size:cover; background-position:center;">

	<div class="__wrapper c-main section-py text-center">

		<div class="w-full md:w-1/2 mx-auto">
			@if ($cta_bg['header'])
			<h3 data-gsap-element="header" class="text-white">{{ $cta_bg['header'] }}</h3>
			@endif
			@if ($cta_bg['txt'])
			<div data-gsap-element="txt" class="text-white text-2xl mt-1">{!! $cta_bg['txt'] !!}</div>
			@endif
			@if (!empty($cta_bg['button']))
			<a data-gsap-element="btn" class="main-btn m-btn" href="{{ $cta_bg['button']['url'] }}">{{ $cta_bg['button']['title'] }}</a>
			@endif
		</div>

	</div>

	<img class="__bg absolute -top-22 right-1/12 w-44 pointer-events-none" src="/wp-content/uploads/2025/12/sign_small.svg" />
</section>