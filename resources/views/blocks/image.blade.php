@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';

$sectionId = $block->data['id'] ?? null;
$customClass = $block->data['className'] ?? '';

@endphp

<section data-gsap-anim="section" @if($sectionId) id="{{ $sectionId }}" @endif class="b-image -smt {{ $customClass }} {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main">

		@if (!empty($g_image['image']))
		<img class="object-cover w-full __img img-xl order1" src="{{ $g_image['image']['url'] }}" alt="{{ $g_image['image']['alt'] ?? '' }}">
		@endif

	</div>

</section>