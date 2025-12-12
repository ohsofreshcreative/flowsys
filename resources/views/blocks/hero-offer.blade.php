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
@endphp

<!-- hero-offer -->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	class="b-hero-offer bg-secondary relative overflow-hidden {{ $sectionClass }} {{ $section_class }}" style="background-image:linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('{{ $g_hero_offer['image']['url'] }}'); background-size:cover; background-position:center;">

	<div class="__wrapper c-main gap-8 items-end relative z-20 py-20">
		<div class="__content w-full md:w-2/3 mx-auto pt-20 pb-10 md:py-30">

				<h1 data-gsap-element="header" class=" text-white text-center">
					{{ $g_hero_offer['header'] }}
				</h1>
				<div data-gsap-element="txt" class="text-2xl text-white mt-2 text-center">
					{!! $g_hero_offer['txt'] !!}
				</div>
				@if (!empty($g_hero_offer['button1']))
				<div class="inline-buttons justify-center text-center mx-auto m-btn">
					<a data-gsap-element="button" class="white-btn left-btn"
						href="{{ $g_hero_offer['button1']['url'] }}"
						target="{{ $g_hero_offer['button1']['target'] }}">
						{{ $g_hero_offer['button1']['title'] }}
					</a>
					@if (!empty($g_hero_offer['button2']))
					<a data-gsap-element="button" class="main-btn"
						href="{{ $g_hero_offer['button2']['url'] }}"
						target="{{ $g_hero_offer['button2']['target'] }}">
						{{ $g_hero_offer['button2']['title'] }}
					</a>
					@endif
				</div>
				@endif
		</div>

	</div>

	<img class="absolute right-0 bottom-0" src="/wp-content/uploads/2025/12/hero_bg.svg" />

</section>