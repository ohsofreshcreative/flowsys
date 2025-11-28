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

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="partners relative -smt {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main flex flex-col lg:flex-row items-start lg:items-end gap-8">
		<div class="__content">
			<h3 data-gsap-element="header" class="m-header">{{ $g_partners['header']}}</h3>
			<p data-gsap-element="txt" class="">{{ $g_partners['txt']}}</p>
		</div>

		@if (!empty($g_partners['button']))
		<a data-gsap-element="btn" class="main-btn" href="{{ $g_partners['button']['url'] }}">{{ $g_partners['button']['title'] }}</a>
		@endif
	</div>

	<div class="swiper usage-swiper c-main !overflow-visible !mt-8">

		<div data-gsap-element="swiper" class="swiper-wrapper">

			@foreach ($r_partners as $item)
			<div class="swiper-slide">
				<div class="__card radius-img p-6 !pt-40 md:p-8" style="background: linear-gradient(180deg, rgba(18, 20, 26, 0.30) 0%, #12141A 100%), url('{{ $item['image']['url'] }}') lightgray 50% / cover no-repeat;">

					@if(!empty($item['title']))
					<h6 class="block text-white">{{ $item['title'] }}</h6>
					@endif

					@if(!empty($item['txt']))
					<div class="__txt text-white mt-2">{{ $item['txt'] }}</div>
					@endif

					@if(!empty($item['button']))
					<a href="{{ $item['button']['url'] }}" class="main-btn m-btn" target="{{ $item['button']['target'] }}">
						{{ $item['button']['title'] }}
					</a>
					@endif
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>


<!-- 	<div class="swiper">
  <div class="swiper-wrapper">
    <div class="swiper-slide">Slide 1</div>
    <div class="swiper-slide">Slide 2</div>
    <div class="swiper-slide">Slide 3</div>
  </div>

  <div class="swiper-pagination"></div>
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
</div> -->