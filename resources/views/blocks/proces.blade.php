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

<!--- proces --->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="proces -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main">
		<h2 class="w-full md:w-1/2">{{ $header }}</h2>
		@if (!empty($r_proces))
		<div class="__repeater">
			@foreach ($r_proces as $item)
			<div class="__card grid grid-cols-1 lg:grid-cols-2 section-gap items-center border-top-p pt-20 mt-20">
				<img class="__img w-full img-l object-cover" src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] ?? '' }}" />
				<div class="__content">
					<h3>{{ $loop->iteration }}.</h3>
					<h5 class="mt-4">{{ $item['header'] }}</h5>
					<p class="mt-2">{{ $item['txt'] }}</p>
				</div>
			</div>
			@endforeach
		</div>
		@endif
	</div>

</section>