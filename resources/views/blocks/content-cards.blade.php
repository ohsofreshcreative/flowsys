@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $whitebg ? ' section-white' : '';
$sectionClass .= $lightbg ? ' section-light' : '';
@endphp

<section data-gsap-anim="section" class="cards -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main">

		<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">

			<div class="__content order2 w-3/4">
				<h3 data-gsap-element="header" class="">{{ $textimg['title'] }}</h3>

				<div data-gsap-element="header" class="mt-2 prose">
					{!! $textimg['content'] !!}
				</div>
				@if (!empty($textimg['button']))
				<a class="main-btn m-btn" href="{{ $textimg['button']['url'] }}">{{ $textimg['button']['title'] }}</a>
				@endif
			</div>

			@if (!empty($textimg['image']))
			<img class="object-cover w-full __img img-s order1" src="{{ $textimg['image']['url'] }}" alt="{{ $textimg['image']['alt'] ?? '' }}">
			@endif
			
		</div>

		@if (!empty($tiles['repeater']))
		<div class="grid grid-cols-1 lg:grid-cols-4 gap-8 mt-10">

			@foreach ($tiles['repeater'] as $item)
			<div class="__card p-6 b-border bg-lighter">
				<img class="m-img" src="{{ $item['card_image']['url'] }}" alt="{{ $item['card_image']['alt'] ?? '' }}" />
				<h6 class="">{{ $item['card_title'] }}</h6>
				<p class="">{{ $item['card_txt'] }}</p>
			</div>
			@endforeach
		</div>
		@endif
	</div>

</section>