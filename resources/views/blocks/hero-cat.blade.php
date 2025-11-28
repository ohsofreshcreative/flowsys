@php
$sectionClass = '';
$sectionClass .= $nomt ? ' !mt-0' : '';
@endphp

<!--- hero-cat -->

<section data-gsap-anim="section" class="b-hero-cat relative z-10 -spt {{ $sectionClass }} {{ $section_class }}"
style="background-image:linear-gradient(-90deg, rgb(0, 111, 51, 0.97) 0%, rgb(0, 55, 26, 0.90) 100%), url('{{ $g_herocat['bg']['url'] }}'); background-size:cover; background-position:top;">


	<div class="__wrapper c-main relative grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-20">

		<div class="__content">
			@php
			if (function_exists('woocommerce_breadcrumb')) {
			woocommerce_breadcrumb(); }
			@endphp

			<h1 data-gsap-element="header" class="text-h2 text-white mt-30">{{ $g_herocat['title'] }}</h1>

			<div data-gsap-element="txt" class="text-white">
				{!! $g_herocat['txt'] !!}
			</div>

			<a data-gsap-element="arrow" href="#" class="__scroll block">
				<div class="__arrow border-p">
					<svg xmlns="http://www.w3.org/2000/svg" width="14" height="20" viewBox="0 0 20 24" fill="none">
						<path d="M10.7383 22.7454L19.4181 14.0655C19.8264 13.6572 19.8265 12.9932 19.4183 12.585C19.0101 12.1768 18.3461 12.1768 17.9378 12.5851L11.0484 19.4744L11.0476 1.99787C11.0474 1.41913 10.5788 0.95049 10 0.950244C9.42127 0.950596 8.95255 1.41932 8.9522 1.99806L8.953 19.4752L2.06463 12.5869C1.65641 12.1786 0.99242 12.1787 0.584122 12.587C0.175823 12.9953 0.175763 13.6593 0.583987 14.0675L9.25988 22.7434C9.666 23.1537 10.33 23.1537 10.7383 22.7454Z" fill="#00aa4f" />
					</svg>
				</div>
			</a>
		</div>

		@if (!empty($g_herocat['button']))
		<a data-gsap-element="btn" class="white-btn justify-self-end self-end mb-16" href="{{ $g_herocat['button']['url'] }}">{{ $g_herocat['button']['title'] }}</a>
		@endif

		@if ($g_herocat['image'])
		<img data-gsap-element="image" class="__img absolute max-w-1/3 -bottom-20 sm:-bottom-40 lg:top-16 -right-10 lg:right-0" src="{{ $g_herocat['image']['url'] }}" alt="{{ $g_herocat['image']['alt'] ?? '' }}">
		@endif

	</div>

</section>