@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $gap ? ' wider-gap' : '';

$bgClass = [
'light' => ' section-light',
'gray' => ' section-gray',
'white' => ' section-white',
'brand' => ' section-brand',
'dark' => ' section-dark',
'' => '',
null => '',
];

$sectionClass .= $bgClass[$bg ?? ''] ?? '';
@endphp

<!--- about -->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="about relative -smt {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main relative">
		<div class="grid grid-cols-1 lg:grid-cols-[1fr_2fr] section-gap">
			<div class="__first">
				@if (!empty($g_about['image']))
				<div data-gsap-element="img" class="__img radius-img order1">
					<img class="object-cover w-full __img img-xl radius-img" src="{{ $g_about['image']['url'] }}" alt="{{ $g_about['image']['alt'] ?? '' }}">
				</div>
				@endif
				<div data-gsap-element="card" class="radius border-p px-8 py-6 mt-10">
					<h3 data-gsap-element="number" class="primary">{{ $g_about['nr'] }}</h3>
					<p data-gsap-element="desc" class="text-white">{{ $g_about['description'] }}</p>
				</div>
			</div>

			<div class="__second flex flex-col justify-between">
				<div class="__content relative grid grid-cols-1 md:grid-cols-2 items-end gap-8 z-10">
					<div>
						<p data-gsap-element="title" class="primary m-title">{{ $g_about['title'] }}</p>
						<h3 data-gsap-element="header" class="">{{ $g_about['header'] }}</h3>
					</div>
					<div data-gsap-element="txt" class="">
						{!! $g_about['txt'] !!}
					</div>
				</div>
				@if (!empty($g_about['image2']))
				<div data-gsap-element="img" class="__img relative radius-img order1 z-10">
					<img class="object-cover w-full __img img-xl radius-img" src="{{ $g_about['image2']['url'] }}" alt="{{ $g_about['image2']['alt'] ?? '' }}">
				</div>
				@endif
				<div class="__glow"></div>
			</div>
		</div>
	</div>
</section>