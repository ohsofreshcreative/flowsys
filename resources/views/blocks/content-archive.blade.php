@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $lightbg ? ' section-light' : '';
@endphp

<section data-gsap-anim="section" class="cards -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main">
		<div class="">
			
			@if (!empty($tiles['title']))
			<h2 class="mb-10 font-medium text-center __txt">{{ strip_tags($tiles['title']) }}</h2>
			@endif

			@if (!empty($tiles['repeater']))
			<div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

				@foreach ($tiles['repeater'] as $item)
				<div class="text-center __card">
					<img class="mx-auto m-img" src="{{ $item['card_image']['url'] }}" alt="{{ $item['card_image']['alt'] ?? '' }}" />
					<h6 class="">{{ $item['card_title'] }}</h6>
					<p class="">{{ $item['card_txt'] }}</p>
				</div>
				@endforeach
			</div>
			@endif

		</div>
	</div>

</section>