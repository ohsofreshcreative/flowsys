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

<!--- tlc -->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-tlc relative -smt {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main relative">
		<div class="__top relative grid grid-cols-1 md:grid-cols-2 gap-10">
			<h3 data-gsap-element="header" class="">{{ $g_tlc['header'] }}</h3>
			<div data-gsap-element="txt" class="">
				{!! $g_tlc['txt'] !!}
			</div>
			<img class="absolute -top-16 -left-10" src="/wp-content/uploads/2025/11/tlc.svg" />
		</div>

		<div data-gsap-element="img" class="__content relative grid grid-cols-1 lg:grid-cols-2 gap-10 mt-18">
			@if (!empty($g_tlc['image']))
			<figure class="__img">
				<picture class="">
					@if (!empty($g_tlc['image']['mime_type']) && $g_tlc['image']['mime_type'] === 'image/webp')
					<source srcset="{{ $g_tlc['image']['url'] }}" type="image/webp">
					@endif
					<source srcset="{{ $g_tlc['image']['url'] }}" type="{{ $g_tlc['image']['mime_type'] ?? 'image/jpeg' }}">
					<img class="radius-img" src="{{ $g_tlc['image']['url'] }}" alt="{{ $g_tlc['image']['alt'] ?? '' }}" loading="lazy">
				</picture>
			</figure>
			@endif

			@if (!empty($r_tlc))
			<div class="__cards relative grid gap-10">
				@foreach ($r_tlc as $item)

				<div data-gsap-element="card" class="__card border-right-p pr-6">
					<img src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] ?? '' }}">
					<h6 class="mt-6">{{ $item['title'] }}</h6>
					<div class="mt-4">{{ $item['txt'] }}</div>
				</div>
				@endforeach
				<img class="absolute mix-blend-multiply -top-34 -right-10" src="/wp-content/uploads/2025/11/bearings-1.png" />
			</div>
			@endif
		</div>
	</div>
</section>