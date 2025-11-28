@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $gap ? ' wider-gap' : '';
$sectionClass .= $lightbg ? ' section-light' : '';
$sectionClass .= $graybg ? ' section-gray' : '';
$sectionClass .= $whitebg ? ' section-white' : '';
$sectionClass .= $primarybg ? ' section-primary' : '';
$sectionClass .= $secondarybg ? ' section-secondary' : '';
@endphp

<!--- benefit -->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="benefit relative -smt {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main relative">

		<div class="w-full md:w-1/2">
			@if (!empty($g_benefit['subtitle']))
			<p data-gsap-element="subheader" class="subtitle-s">{{ strip_tags($g_benefit['subtitle']) }}</p>
			@endif
			<h2 data-gsap-element="top" class="">{{ $g_benefit['top'] }}</h2>
		</div>

		<div class="grid grid-cols-1 lg:grid-cols-3 gap-10 mt-10">

			<!-- REPEATER -->
			@if (!empty($r_benefit))
			<div class="flex flex-col justify-between gap-6">
				@foreach ($r_benefit as $item)
				<div data-gsap-element="item" class="__item flex gap-4 items-start">
					@if (!empty($item['image']))
					<img src="{{ $item['image']['sizes']['medium'] ?? $item['image']['url'] }}"
						alt="{{ $item['image']['alt'] ?? '' }}" loading="lazy">
					@endif

					<div class="w-full">
						@if (!empty($item['title']))
						<p class="text-xl p-5 bg-s-400 rounded-lg">{{ $item['title'] }}</p>
						@endif
					</div>
				</div>
				@endforeach
			</div>
			@endif

			<!-- IMG -->
			@if (!empty($g_benefit['image']))
			<div data-gsap-element="img-left" class="__img radius-img order1">
				<img class="img-m w-full radius-img object-cover" src="{{ $g_benefit['image']['url'] }}" alt="{{ $g_benefit['image']['alt'] ?? '' }}">
			</div>
			@endif

			<!-- TXT -->
			<div>
				<h4 data-gsap-element="header" class="m-header">{{ $g_benefit['title'] }}</h4>
				<div data-gsap-element="txt" class="">
					{!! $g_benefit['txt'] !!}
				</div>

				@if (!empty($g_benefit['button']))
				<a data-gsap-element="btn" class="main-btn m-btn" href="{{ $g_benefit['button']['url'] }}">{{ $g_benefit['button']['title'] }}</a>
				@endif
			</div>


		</div>
	</div>
</section>