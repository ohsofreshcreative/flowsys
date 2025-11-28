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

<!--- wysiwyg -->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="wysiwyg relative pt-10 {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main relative">
		@if (!empty($g_wysiwyg['header']))
		<h2 data-gsap-element="header" class="">{{ $g_wysiwyg['header'] }}</h2>
		@endif

		<div data-gsap-element="txt" class="">
			{!! $g_wysiwyg['txt'] !!}
		</div>

		@if (!empty($g_wysiwyg['button']))
		<a data-gsap-element="btn" class="main-btn m-btn" href="{{ $g_wysiwyg['button']['url'] }}">{{ $g_wysiwyg['button']['title'] }}</a>
		@endif
	</div>

</section>