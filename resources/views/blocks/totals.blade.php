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

@endphp

<!--- totals -->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="totals relative -smt {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main relative">
		<div class="grid grid-cols-1 lg:grid-cols-[2fr_1fr] items-center gap-10 mt-10">
			<div class="__content order2 lg:mr-20">

				<h2 data-gsap-element="header" class="m-header">{{ $g_totals['title'] }}</h2>
				<div data-gsap-element="txt" class="">
					{!! $g_totals['txt'] !!}
				</div>

				@if (!empty($r_totals))
				<div class="flex flex-col md:flex-row gap-6 md:gap-20 mt-10">
					@foreach ($r_totals as $item)
					<div data-gsap-element="item" class="__item">
						@if (!empty($item['title']))
						<p class="font-medium text-h1">{{ $item['title'] }}<span class="text-s-light">+</span></p>
						@endif
						@if (!empty($item['txt']))
						<div class="">{!! $item['txt'] !!}</div>
						@endif
					</div>
					@endforeach
				</div>
				@endif
			</div>

			@if (!empty($g_totals['image']))
			<div data-gsap-element="img-right" class="__img radius-img order1">
				<img class="object-cover w-full __img img-2xl radius-img" src="{{ $g_totals['image']['url'] }}" alt="{{ $g_totals['image']['alt'] ?? '' }}">
			</div>
			@endif
		</div>
	</div>
</section>