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


<!--- numbers --->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="numbers -smt {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main">
		<div class="">
			<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
				@if (!empty($g_numbers['header']))
				<h3 class="">{{ strip_tags($g_numbers['header']) }}</h3>
				@endif
				<div data-gsap-element="txt" class="mt-2">
					{!! $g_numbers['txt'] !!}
				</div>
			</div>

			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 border-top-p pt-10 mt-20">
				@foreach ($g_numbers['r_numbers'] as $item)
				<div class="__card relative border-right-p pr-4">
					<p class="text-h1">{{ $item['title'] }}</p>
					<p class="">{{ $item['txt'] }}</p>
				</div>
				@endforeach
			</div>

		</div>
	</div>

</section>