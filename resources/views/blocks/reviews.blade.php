@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $lightbg ? ' section-light' : '';
$sectionClass .= $graybg ? ' section-gray' : '';
$sectionClass .= $whitebg ? ' section-white' : '';
$sectionClass .= $brandbg ? ' section-brand' : '';
@endphp

<!--- reviews --->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="s-reviews -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main">
		<div class="__content">
			<div data-gsap-element="header" class="__wrapper c-main block pb-20">
				<h3 class="">{{ $g_reviews['title']}}</h3>
			</div>
			<div class="swiper reviews-swiper c-main !overflow-visible">
				<div data-gsap-element="swiper" class="swiper-wrapper">
					@foreach($r_reviews as $card)
					<div class="swiper-slide">
						<div class="__card relative bg-white border-p p-10 pt-20">
							<img class="absolute -top-10 right-10" src="/wp-content/uploads/2025/11/quote.svg" />
							@if(!empty($card['txt']))
							<div class="__txt">{{ $card['txt'] }}</div>
							@endif
							<div class="flex items-center gap-4 mt-6">
								@if(!empty($card['img']))
								<div class="__img">
									{!! wp_get_attachment_image($card['img']['ID'], 'medium', false, ['class' => 'img-fluid']) !!}
								</div>
								@endif
								@if(!empty($card['name']))
								<b class="block">{{ $card['name'] }}</b>
								@endif
							</div>
						</div>
					</div>
					@endforeach
				</div>

				<div data-gsap-element="arrows" class="relative flex gap-2 mt-10">
					<div class="swiper-button-prev rounded-full"></div>
					<div class="swiper-button-next rounded-full"></div>
				</div>
			</div>
		</div>
	</div>

</section>
