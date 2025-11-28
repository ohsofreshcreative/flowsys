@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $lightbg ? ' section-light' : '';
$sectionClass .= $greybg ? ' section-grey' : '';
$sectionClass .= $whitebg ? ' section-white' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
@endphp

<section data-gsap-anim="section" class="cards -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main">
		<div class="">

			<div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-end">
				@if (!empty($tiles['title']))
				<h2 class="font-medium">{{ strip_tags($tiles['title']) }}</h2>
				@endif

				<div>
					@if (!empty($tiles['subtitle']))
					<h4 class="font-medium">{{ strip_tags($tiles['subtitle']) }}</h4>
					@endif

					@if (!empty($tiles['text']))
					<p class="__txt text-xl pb-2">{{ strip_tags($tiles['text']) }}</p>
					@endif
				</div>
			</div>

			<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mt-10">

				@foreach ($repeater as $item)
				<div class="__card bg-secondary p-10">
					<img class="m-img" src="{{ $item['card_image']['url'] }}" alt="{{ $item['card_image']['alt'] ?? '' }}" />
					<h6 class="text-white">{{ $item['card_title'] }}</h6>
					<p class="text-white">{{ $item['card_txt'] }}</p>
				</div>
				@endforeach
			</div>

		</div>
	</div>

</section>