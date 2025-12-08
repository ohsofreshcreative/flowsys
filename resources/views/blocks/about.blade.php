@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $gap ? ' wider-gap' : '';
$unique_id = 'shape-' . uniqid();

if (!empty($background) && $background !== 'none') {
$sectionClass .= ' ' . $background;
}
@endphp

<!--- about -->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-about relative -smt {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main relative">
		<div class="__col grid grid-cols-1 lg:grid-cols-2 items-center gap-10">
			@if (!empty($g_about['image']))
			<div data-gsap-element="img" class="__img order1">
				<svg class="w-full h-auto relative z-10" viewBox="0 0 600 645" preserveAspectRatio="xMidYMid meet">
					<defs>
						<clipPath id="{{ $unique_id }}">
							<path d="M411.706 644.881L600 163.711L429.451 0L288.212 360.926L248.269 269.063L0 269.064L163.167 645L411.436 644.999L411.706 644.881Z" />
						</clipPath>
					</defs>
					<image clip-path="url(#{{ $unique_id }})" width="100%" height="100%" preserveAspectRatio="xMidYMid slice" href="{{ $g_about['image']['url'] }}" alt="{{ $g_about['image']['alt'] ?? '' }}" />
				</svg>
				<img class="__bg absolute top-0 opacity-10 mix-blend-overlay scale-160 pointer-events-none" src="/wp-content/uploads/2025/12/logo-bg-light.svg" />
			</div>
			@endif

			<div class="__content relative order2">
				<div class="relative z-10">
					<div class="__header">
						<h2 data-gsap-element="header" class="">{{ $g_about['title'] }}</h2>
					</div>
					<div data-gsap-element="txt" class="mt-2">
						{!! $g_about['txt'] !!}
					</div>
					@if (!empty($g_about['button']))
					<a data-gsap-element="btn" class="main-btn m-btn align-self-bottom" href="{{ $g_about['button']['url'] }}">{{ $g_about['button']['title'] }}</a>
					@endif
				</div>

				<img data-gsap-element="bg" class="__bg absolute -top-10 -left-20 pointer-events-none" src="/wp-content/uploads/2025/12/aboutus-bg.svg" />
			</div>

		</div>
	</div>

</section>