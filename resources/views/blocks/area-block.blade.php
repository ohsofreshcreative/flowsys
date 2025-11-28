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

$sectionId = $block->data['id'] ?? null;
$customClass = $block->data['className'] ?? '';

@endphp

<!-- area-block -->

<section data-gsap-anim="section" @if($sectionId) id="{{ $sectionId }}" @endif class="area relative -smt {{ $block->classes }} {{ $customClass }} {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main relative">
		<div class="__col grid grid-cols-1 lg:grid-cols-2 items-center gap-10">
			@if (!empty($g_area['image']))
			<div data-gsap-element="image" class="__img order1">
				<img class="object-cover w-full __img img-xl" src="{{ $g_area['image']['url'] }}" alt="{{ $g_area['image']['alt'] ?? '' }}">
			</div>
			@endif

			<div class="__content order2">
				<h2 data-gsap-element="header" class="">{{ $g_area['title'] }}</h2>

				<div data-gsap-element="txt" class="mt-2">
					{!! $g_area['content'] !!}
				</div>

				@if (!empty($g_area['button']))
				<a class="main-btn m-btn" href="{{ $g_area['button']['url'] }}">{{ $g_area['button']['title'] }}</a>
				@endif

			</div>

		</div>

</section>