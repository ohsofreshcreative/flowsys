@php
$sectionClass = '';
$sectionClass .= $nomt ? ' !mt-0' : '';
@endphp

<!-- hero-brand --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	class="b-hero-brand bg-background-brand relative overflow-hidden {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-wide grid grid-cols-1 lg:grid-cols-[2fr_1fr] gap-8 items-end relative z-20 py-20">
		<div class="__content pt-20 pb-10 md:py-30">

			<div>
				<h1 data-gsap-element="header" class=" text-white">
					{{ $g_hero_brand['title'] }}
				</h1>
				<div data-gsap-element="txt" class="text-xl md:text-2xl text-white mt-2 w-full md:w-2/3">
					{!! $g_hero_brand['txt'] !!}
				</div>
				@if (!empty($g_hero_brand['button1']))
				<div class="inline-buttons m-btn">
					<a data-gsap-element="button" class="white-btn left-btn"
						href="{{ $g_hero_brand['button1']['url'] }}"
						target="{{ $g_hero_brand['button1']['target'] }}">
						{{ $g_hero_brand['button1']['title'] }}
					</a>
					@if (!empty($g_hero_brand['button2']))
					<a data-gsap-element="button" class="main-btn"
						href="{{ $g_hero_brand['button2']['url'] }}"
						target="{{ $g_hero_brand['button2']['target'] }}">
						{{ $g_hero_brand['button2']['title'] }}
					</a>
					@endif
				</div>
				@endif
			</div>
		</div>

	</div>

	<img data-gsap-element="bg" class="__bg absolute w-[800px] right-10 top-32 pointer-events-none" src="/wp-content/uploads/2025/12/sign_small.svg" />

</section>