@php
$sectionClass = '';
$sectionClass .= $nomt ? ' !mt-0' : '';
@endphp

<!-- hero --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	class="b-hero bg-secondary relative overflow-hidden {{ $sectionClass }} {{ $section_class }}" style="background-image:linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('{{ $g_hero['image']['url'] }}'); background-size:cover; background-position:center;">

	<div class="__wrapper c-wide grid grid-cols-1 lg:grid-cols-[2fr_1fr] gap-8 items-end relative z-20 py-20">
		<div class="__content pt-20 pb-10 md:py-30">

			<div>
				<h1 data-gsap-element="header" class="text-white bg-bg-brand">
					{{ $g_hero['title'] }}
				</h1>
				<div data-gsap-element="txt" class="text-xl md:text-2xl text-white mt-2 w-full md:w-2/3">
					{!! $g_hero['txt'] !!}
				</div>
				@if (!empty($g_hero['button1']))
				<div class="inline-buttons m-btn">
					<a data-gsap-element="button" class="white-btn left-btn"
						href="{{ $g_hero['button1']['url'] }}"
						target="{{ $g_hero['button1']['target'] }}">
						{{ $g_hero['button1']['title'] }}
					</a>
					@if (!empty($g_hero['button2']))
					<a data-gsap-element="button" class="main-btn"
						href="{{ $g_hero['button2']['url'] }}"
						target="{{ $g_hero['button2']['target'] }}">
						{{ $g_hero['button2']['title'] }}
					</a>
					@endif
				</div>
				@endif
			</div>
		</div>

		@if (!empty($g_hero_cta) && is_array($g_hero_cta))
		<a class="__cta" href="{{ $g_hero_cta['button1']['url'] ?? '#' }}"
			target="{{ $g_hero_cta['button1']['target'] ?? '_self' }}">
			<div data-gsap-element="cta" class="__cta flex items-center gap-8 bg-white radius w-full md:w-max max-w-[432px] p-2">
				@if (!empty($g_hero_cta['image']))
				<div data-gsap-element="image" class="">
					<img class="max-h-[120px] aspect-square radius object-cover" src="{{ $g_hero_cta['image']['url'] ?? '' }}" alt="{{ $g_hero_cta['image']['alt'] ?? '' }}">
				</div>
				@endif
				<div class="__content">
					<h6 data-gsap-element="header">{{ $g_hero_cta['title'] ?? '' }}</h6>
					@if (!empty($g_hero_cta['button1']))
					<p data-gsap-element="button" class="underline-btn left-btn mt-1">
						{{ $g_hero_cta['button1']['title'] ?? '' }}
					</p>
					@endif
				</div>
			</div>
		</a>
		@endif

	</div>

	<img class="absolute right-0 bottom-0" src="/wp-content/uploads/2025/12/hero_bg.svg" />

</section>