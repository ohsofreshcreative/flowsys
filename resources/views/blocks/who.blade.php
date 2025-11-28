@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $gap ? ' wider-gap' : '';
$sectionClass .= $lightbg ? ' section-light' : '';
$sectionClass .= $graybg ? ' section-gray' : '';
$sectionClass .= $whitebg ? ' section-white' : '';
$sectionClass .= $darkbg ? ' section-dark' : '';
$sectionClass .= $brandbg ? ' section-brand' : '';

@endphp

<!--- who -->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="who relative -smt {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main relative">
		<div class="__col grid grid-cols-1 lg:grid-cols-2 gap-10">
			<div class="__first order-2 lg:order-1">
				@if (!empty($g_who['image1']))
				<div data-gsap-element="image" class="__img mb-6">
					<img class="object-cover w-full __img img-xl radius-img" src="{{ $g_who['image1']['url'] }}" alt="{{ $g_who['image1']['alt'] ?? '' }}">
				</div>
				@endif

				<div data-gsap-element="txt" class="">
					{!! $g_who['txt'] !!}
				</div>

				@if (!empty($g_who['button']))
				<a data-gsap-element="btn" class="main-btn m-btn" href="{{ $g_who['button']['url'] }}">{{ $g_who['button']['title'] }}</a>
				@endif
			</div>

			<div class="__second order-1 lg:order-2">
				<p data-gsap-element="title" class="title m-title">{{ $g_who['title'] }}</p>
				<h3 data-gsap-element="header" class="m-header">{{ $g_who['header'] }}</h3>

				@if (!empty($g_who['image2']))
				<div data-gsap-element="image" class="__img hidden lg:block">
					<img class="object-cover w-full __img img-xl radius-img" src="{{ $g_who['image2']['url'] }}" alt="{{ $g_who['image2']['alt'] ?? '' }}">
				</div>
				@endif
			</div>

		</div>

		<div class="b-border-t grid grid-cols-1 lg:grid-cols-3 gap-6 mt-10 pt-10">
    @foreach ($r_who as $item)
			<div class="__card">
				<div class="flex flex-col xl:flex-row gap-6">
					<p class="text-h1">{{ $item['liczba'] }}</p>
					<h6 class="">{{ $item['header'] }}</h6>
				</div>
				<p class="">{{ $item['txt'] }}</p>

			</div>
			@endforeach
		</div>
</section>