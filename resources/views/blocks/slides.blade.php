@php
$sectionClass = '';
$sectionId = $block->data['id'] ?? null;
$customClass = $block->data['className'] ?? '';
@endphp

<section data-gsap-anim="section" @if($sectionId) id="{{ $sectionId }}" @endif class="slides -smt {{ $block->classes }} {{ $customClass }} {{ $sectionClass }} {{ $section_class }}">
	<div class="{{ $block->classes }}">

		<div class="__wrapper c-main block">
			<h2 class="w-3/4 mb-10">{{ $g_slides['title']}}</h2>
		</div>

		<div class="swiper usage-swiper c-main !overflow-visible">
			
			<div class="swiper-wrapper">

				@foreach($slides as $card)
				<div class="swiper-slide">
					<div class="__card">
						<div class="__rectangle absolute"></div>
						@if(!empty($card['card_image']))
						<div class="__img img-xs m-img">
							{!! wp_get_attachment_image($card['card_image']['ID'], 'medium', false, ['class' => 'img-fluid']) !!}
						</div>
						@endif

						@if(!empty($card['card_title']))
						<h5 class="block m-header">{{ $card['card_title'] }}</h5>
						@endif

						@if(!empty($card['card_txt']))
						<div class="__txt">{{ $card['card_txt'] }}</div>
						@endif

						@if(!empty($card['button']))
						<a href="{{ $card['button']['url'] }}" class="main-btn m-btn" target="{{ $card['button']['target'] }}">
							{{ $card['button']['title'] }}
						</a>
						@endif
					</div>
				</div>
				@endforeach
			</div>
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