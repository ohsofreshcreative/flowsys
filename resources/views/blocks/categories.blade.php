@php
$sectionClass = collect([
$nomt ? '!mt-0' : '',
$lightbg ? 'section-light' : '',
$graybg ? 'section-gray' : '',
$whitebg ? 'section-white' : '',
$brandbg ? 'section-brand' : '',
$darkbg ? 'section-dark' : '',
])->filter()->implode(' ');
@endphp

<!--- categories --->

<section
	data-gsap-anim="section"
	@if (!empty($section_id)) id="{{ $section_id }}" @endif
	class="b-categories relative -smt  {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main relative">
		<div class="w-100 md:w-2/3 lg:w-1/2">
			@if (!empty($g_categories['title']))
			<h3 data-gsap-element="header" class="m-header">{{ $g_categories['title'] }}</h3>
			@endif
			@if (!empty($g_categories['txt']))
			<div data-gsap-element="header" class="">
				{!! $g_categories['txt'] !!}
			</div>
			@endif
		</div>

		 <div data-gsap-element="swiper" class="swiper offer-swiper !overflow-visible mt-10">
            <div class="swiper-wrapper">
                @foreach ($categories as $category)
                    @if ($category['name'] !== 'Wszystkie produkty')
                        <div class="swiper-slide">
                            <a href="{{ $category['url'] }}">
                                <div class="__card bg-white border-left-p p-8 md:px-10 md:py-14">
                                    <div class="">
                                        <img
                                            src="{{ $category['image_url'] }}"
                                            alt="{{ $category['name'] }}"
                                            class="__Img __img w-full object-cover transition-transform duration-300 group-hover:scale-105"
                                            loading="lazy">
                                    </div>
                                    <div class="mt-4">
                                        <h6 class="">{{ $category['name'] }}</h6>
                                    </div>
                                    <p class="underline-btn mt-6">Zobacz produkty</p>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

		<div data-gsap-element="arrows" class="relative flex gap-2 mt-10">
			<div class="swiper-button-prev rounded-full"></div>
			<div class="swiper-button-next rounded-full"></div>
		</div>

	</div>
</section>