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

<!--- logos -->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-logos relative -smt {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main relative">
		<h4 data-gsap-element="header" class="w-full md:w-1/2">{{ $g_logos['title'] }}</h4>
	</div>

	@if (!empty($g_logos['gallery']))
    <div class="swiper logos-swiper mt-20">
        <div class="swiper-wrapper">
            {{-- Pętla iteruje po $g_logos['gallery'], ponieważ galeria jest wewnątrz grupy --}}
            @foreach ($g_logos['gallery'] as $image)
            <div class="swiper-slide">
                <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}" class="h-12 w-auto">
            </div>
            @endforeach
            {{-- Duplikaty slajdów dla płynnej pętli --}}
            @foreach ($g_logos['gallery'] as $image)
            <div class="swiper-slide">
                <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}" class="h-12 w-auto">
            </div>
            @endforeach
        </div>
    </div>
    @endif

</section>