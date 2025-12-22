@php
$sectionClass = '';
$sectionClass .= $nomt ? ' !mt-0' : '';
@endphp

<!-- bottom-block -->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif  class="s-bottom-block relative overflow-hidden -smt bg-gradient {{ $sectionClass }} {{ $section_class }}">
	<div class="grid grid-cols-1 md:grid-cols-2 items-center">

		<div class="__content w-11/12 md:w-3/4 lg:w-1/2 py-20 m-auto">
			<div data-gsap-element="txt">
				<h4 data-gsap-element="header" class="text-white">{{ $bottom['title'] }}</h4>
				<div data-gsap-element="txt" class="mt-2 text-white">
					{!! $bottom['txt'] !!}
				</div>
				<a data-gsap-element="phone" href="tel:{{ $bottom['phone'] }}" class="block text-h3 !text-primary-light hover:!text-primary-lighter w-max mt-6">{{ $bottom['phone'] }}</a>
				@if (!empty($bottom['button']))
				<a data-gsap-element="btn" class="main-btn m-btn align-self-bottom" href="{{ $bottom['button']['url'] }}">{{ $bottom['button']['title'] }}</a>
				@endif
			</div>

		</div>

		<div data-gsap-element="img" class="__img inset-y-0 h-full">
	<img class="__bg absolute top-1/2 -translate-y-1/2 -left-21 w-44 pointer-events-none" src="/wp-content/uploads/2025/12/sign_small.svg" />
			@php
			$unique_id = 'clip_'.uniqid();
			@endphp
			<svg
				viewBox="0 0 898 728"
				class="block h-full w-auto"
				preserveAspectRatio="xMidYMid slice"
				role="img"
				aria-label="{{ $bottom['image']['alt'] ?? '' }}">
				<title>{{ $bottom['image']['alt'] ?? '' }}</title>
				<defs>
					<clipPath id="{{ $unique_id }}">
						<path d="M0.152149 529.095L961 914L988 615.228L363.556 371.044L952.001 115.74L952.001 -43.1298L952 -202L0 211.009L0.00107968 528.75L0.152149 529.095Z" />
					</clipPath>
				</defs>
				<image
					clip-path="url(#{{ $unique_id }})"
					href="{{ $bottom['image']['url'] }}"
					x="0" y="0" width="100%" height="100%"
					preserveAspectRatio="xMidYMid slice" />
			</svg>
		</div>


	</div>
</section>