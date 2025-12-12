@php
$sectionClass = '';
$sectionClass .= !empty($flip) && $flip ? ' order-flip' : '';

$sectionId = $block->data['id'] ?? null;
$customClass = $block->data['className'] ?? '';

$hasImage1 = !empty($g_image['image']);
$hasImage2 = !empty($g_image['image2']);
$gridClass = ($hasImage1 && $hasImage2) ? 'grid-cols-1 md:grid-cols-2' : 'grid-cols-1';
$imageClass = ($hasImage1 && $hasImage2) ? 'img-l' : 'img-xl';
@endphp

<section @if($sectionId) id="{{ $sectionId }}" @endif class="b-image mt-10 {{ $customClass }} {{ $sectionClass }} {{ !empty($section_class) ? $section_class : '' }}">

    <div class="__wrapper grid {{ $gridClass }} items-center gap-8">

        @if ($hasImage1)
        <img data-gsap-element="image" class="object-cover radius-img w-full __img {{ $imageClass }} order1" src="{{ $g_image['image']['url'] }}" alt="{{ $g_image['image']['alt'] ?? '' }}">
        @endif

        @if ($hasImage2)
        <img data-gsap-element="image" class="object-cover radius-img w-full __img {{ $imageClass }} order1" src="{{ $g_image['image2']['url'] }}" alt="{{ $g_image['image2']['alt'] ?? '' }}">
        @endif

    </div>

</section>