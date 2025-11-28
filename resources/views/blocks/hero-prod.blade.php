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

<!-- hero-prod -->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="s-hero-prod relative mt-20 {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper w-full lg:w-4/5">

		<div class="__content w-full sm:w-3/4 relative z-10">
			@if (function_exists('breadcrumbs'))
			{!! breadcrumbs() !!}
			@endif

			<h2 data-gsap-element="header" class="">{{ $g_hero_prod['header'] }}</h2>

			@if (!empty($g_hero_prod['txt']))
			<p data-gsap-element="txt" class="text-xl mt-4">{{ strip_tags($g_hero_prod['txt']) }}</p>
			@endif

			<a data-gsap-element="arrow" href="#" class="__scroll block m-btn">
				<div class="__arrow border-p">
					<svg xmlns="http://www.w3.org/2000/svg" width="14" height="20" viewBox="0 0 20 24" fill="none">
						<path d="M10.7383 22.7454L19.4181 14.0655C19.8264 13.6572 19.8265 12.9932 19.4183 12.585C19.0101 12.1768 18.3461 12.1768 17.9378 12.5851L11.0484 19.4744L11.0476 1.99787C11.0474 1.41913 10.5788 0.95049 10 0.950244C9.42127 0.950596 8.95255 1.41932 8.9522 1.99806L8.953 19.4752L2.06463 12.5869C1.65641 12.1786 0.99242 12.1787 0.584122 12.587C0.175823 12.9953 0.175763 13.6593 0.583987 14.0675L9.25988 22.7434C9.666 23.1537 10.33 23.1537 10.7383 22.7454Z" fill="#00aa4f" />
					</svg>
				</div>
			</a>
		</div>
	</div>
	<img class="absolute -top-170 -right-150" src="{{ $g_hero_prod['image']['url'] }}" alt="{{ $g_hero_prod['image']['alt'] ?? '' }}">

</section>