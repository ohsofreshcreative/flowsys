@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $gap ? ' wider-gap' : '';
$sectionClass .= $lightbg ? ' section-light' : '';
$sectionClass .= $slightbg ? ' section-s-light' : '';
$sectionClass .= $whitebg ? ' section-white' : '';
$sectionClass .= $brandbg ? ' section-brand' : '';
@endphp

<!--- path --->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="path -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main">
		<div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-10">
			<div class="__content">
				@if (!empty($g_path['subtitle']))
				<p data-gsap-element="subheader" class="subtitle-s">{{ strip_tags($g_path['subtitle']) }}</p>
				@endif
				@if (!empty($g_path['title']))
				<h2 data-gsap-element="header" class="m-header">{{ strip_tags($g_path['title']) }}</h2>
				@endif
				<div data-gsap-element="txt" class="">{{ strip_tags($g_path['txt']) }}</div>
			</div>
			@if (!empty($g_path['image']))
			<div data-gsap-element="img" class="__img order1">
				<img class="object-cover w-full h-full __img radius-img" src="{{ $g_path['image']['url'] }}" alt="{{ $g_path['image']['alt'] ?? '' }}">
			</div>
			@endif
		</div>

		@if (!empty($r_path))
			<div class="__repeater gap-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 mt-16">

			@foreach ($r_path as $item)
			<div data-gsap-element="stagger" class="flex flex-col bg-white rounded-3xl border-s-light px-6 py-10 md:px-8 md:py-20">
					<img class="" src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] ?? '' }}" />
					<h5 class="mt-4">{{ $item['title'] }}</h5>
					<p class="mt-2">{{ $item['txt'] }}</p>
				</div>
			@endforeach
		</div>
		<div class="__line absolute bg-primary z-0 origin-left scale-x-0"></div>
		@endif
	</div>

</section>