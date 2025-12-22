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

<section data-gsap-anim="section" class="cards -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main">

		<div class="w-full lg:w-1/2">
			@if (!empty($g_team['subtitle']))
			<p data-gsap-element="subheader" class="subtitle-s">{{ strip_tags($g_team['subtitle']) }}</p>
			@endif
			<h2 data-gsap-element="header" class="m-header">{{ strip_tags($g_team['title']) }}</h2>
			<div data-gsap-element="txt" class="">
				{!! $g_team['content'] !!}
			</div>
		</div>

		@if (!empty($repeater))
		@php
		$itemCount = count($repeater);
		$gridCols = 1; // Domyślna wartość

		if ($itemCount == 2 || $itemCount == 3) {
		$gridCols = $itemCount;
		} elseif ($itemCount >= 4) {
		$gridCols = 2;
		}

		$gridClass = 'grid-cols-1'; // Domyślna klasa
		if ($gridCols > 1) {
		$gridClass = 'grid-cols-1 lg:grid-cols-' . $gridCols;
		}
		@endphp

		<div class="grid {{ $gridClass }} pt-14 gap-8">
			@foreach ($repeater as $item)
			<div data-gsap-element="card" class="__card relative">
			<div data-gsap-element="img" class="radius-img">
				<img class="img-xl w-full radius-img object-cover mb-6" src="{{ $item['card_image']['url'] }}" alt="{{ $item['card_image']['alt'] ?? '' }}" />
				</div>

				<div class="">
					<h4 class="">{{ $item['card_title'] }}</h4>
					<p class="text-gray block mt-2">{{ $item['card_function'] }}</p>
					<a class="primary" href="mailto:{{ $item['card_mail'] }}">{{ $item['card_mail'] }}</a>
				</div>

			</div>
			@endforeach
		</div>
		@endif

	</div>

</section>