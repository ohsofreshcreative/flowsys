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

<!--- steps -->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-steps relative -smt {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main">
		<div class="__top">
			@if (!empty($g_steps['title']))
			<h2 data-gsap-element="header" class="m-header">{{ strip_tags($g_steps['title']) }}</h2>
			@endif
			<div data-gsap-element="txt" class="">{{ strip_tags($g_steps['txt']) }}</div>
		</div>

		@if (!empty($r_steps))
		<div class="__repeater grid grid-cols-1	md:grid-cols-2 lg:grid-cols-4 gap-6 h-full">

			@foreach ($r_steps as $item)
			<div data-gsap-element="stagger" class="flex gap-6 bg-gradient-light rounded-lg px-8 py-16">
				<div class="__content">
					<p class="text-h2 text-p-light">{{ $item['title'] }}</p>
					<h6 class="mt-6">{{ $item['header'] }}</h6>
					<p class="mt-4">{{ $item['txt'] }}</p>
				</div>
			</div>
			@endforeach
		</div>
		@endif

	</div>

</section>