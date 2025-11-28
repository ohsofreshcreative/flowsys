@php
$sectionClass = '';
$sectionClass .= $nomt ? ' !mt-0' : '';
@endphp

<!--- values --->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-values -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main">

		<h3 class="m-header text-center w-full md:w-1/2 m-auto">{{ strip_tags($g_values['header']) }}</h3>

		@if (!empty($r_values))
		@php
		$itemCount = count($r_values);
		$gridCols = 1;
		if ($itemCount == 2) $gridCols = 2;
		if ($itemCount >= 3) $gridCols = 3;
		$gridClass = $gridCols > 1 ? 'grid-cols-1 lg:grid-cols-' . $gridCols : 'grid-cols-1';
		@endphp

		<div class="grid {{ $gridClass }} gap-8 mt-10">
			@foreach ($r_values as $item)
			<div class="__card relative border-bottom-p pb-10">
				@if (!empty($item['image']['url']))
				<img class="mx-auto mb-6" src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] ?? '' }}" />
				@endif
				@if (!empty($item['title']))
				<h6 class="text-center mb-4">{{ $item['title'] }}</h6>
				@endif
				@if (!empty($item['text']))
				<p class="text-center">{{ $item['text'] }}</p>
				@endif
			</div>
			@endforeach
		</div>
		@endif

	</div>
</section>