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

<!--- inspirations -->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="inspirations relative -smt {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main relative z-10">
		<div class="__col relative grid grid-cols-1 lg:grid-cols-2 items-center gap-10  z-10">
			<div class="__content order2">
				<h2 data-gsap-element="header" class="">{{ $g_inspirations['title'] }}</h2>

				<div data-gsap-element="txt" class="mt-2">
					{!! $g_inspirations['txt'] !!}
				</div>

				@if (!empty($g_inspirations['button']))
				<a data-gsap-element="btn" class="main-btn m-btn" href="{{ $g_inspirations['button']['url'] }}">{{ $g_inspirations['button']['title'] }}</a>
				@endif

			</div>

		</div>


		<div class="__photos relative z-9">
			@if (!empty($g_photos['image1']))
			<div data-gsap-element="image" class="__img1">
				<img class="object-cover w-full __img img-xl radius-img" src="{{ $g_photos['image1']['url'] }}" alt="{{ $g_photos['image1']['alt'] ?? '' }}">
			</div>
			@endif
			@if (!empty($g_photos['image2']))
			<div data-gsap-element="image" class="__img2">
				<img class="radius-img" src="{{ $g_photos['image2']['url'] }}" alt="{{ $g_photos['image2']['alt'] ?? '' }}">
			</div>
			@endif
			@if (!empty($g_photos['image3']))
			<div data-gsap-element="image" class="__img3">
				<img class="radius-img" src="{{ $g_photos['image3']['url'] }}" alt="{{ $g_photos['image3']['alt'] ?? '' }}">
			</div>
			@endif
			@if (!empty($g_photos['image4']))
			<div data-gsap-element="image" class="__img4">
				<img class="radius-img" src="{{ $g_photos['image4']['url'] }}" alt="{{ $g_photos['image4']['alt'] ?? '' }}">
			</div>
			@endif
		</div>

		<div class="__glow"></div>
	</div>
</section>