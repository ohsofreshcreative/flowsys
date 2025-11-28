@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $gap ? ' wider-gap' : '';

if (!empty($background) && $background !== 'none') {
    $sectionClass .= ' ' . $background;
}
@endphp

<!--- cards --->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-cards -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main">
		<div class="">

			<div class="relative grid grid-cols-1 lg:grid-cols-[1fr_2fr] items-center">
				<div class="__content">
					<h2 class="m-header">{{ strip_tags($g_cards['header']) }}</h2>
					<p>{{ $g_cards['text'] }}</p>
				</div>
			</div>

			@if (!empty($r_cards))
			@php
			$itemCount = count($r_cards);
			$gridCols = 1;
			if ($itemCount == 2) $gridCols = 2;
			if ($itemCount == 3) $gridCols = 3;
			if ($itemCount >= 4) $gridCols = 4; // Twój dotychczasowy warunek
			$gridClass = $gridCols > 1 ? 'grid-cols-1 lg:grid-cols-' . $gridCols : 'grid-cols-1';
			@endphp

			<div class="grid {{ $gridClass }} gap-8 mt-10">
				@foreach ($r_cards as $item)
				<div class="__card relative border-right-p">
					@if (!empty($item['image']['url']))
					<img class="mb-6" src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] ?? '' }}" />
					@endif
					@if (!empty($item['title']))
					<h6 class="mb-4">{{ $item['title'] }}</h6>
					@endif
					@if (!empty($item['text']))
					<p class="">{{ $item['text'] }}</p>
					@endif
				</div>
				@endforeach
			</div>
			@endif

		</div>
	</div>
</section>