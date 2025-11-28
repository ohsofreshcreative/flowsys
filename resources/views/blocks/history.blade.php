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

<section data-gsap-anim="section" class="history -smt relative {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main">
		<div class="relative">

			<h6 class="primary text-center">{{ $subtitle }}</h6>
			<h3 class="text-center">{{ $title }}</h3>

			<div class="__cards gap-8 relative">

				<div class="timeline-line"></div>
				@foreach ($g_history['r_history'] as $item)
				<div class="__year flex mt-20">
					<div class="__card w-1/2 relative b-border p-8">
						<img class="img-xs mb-6" src="{{ $item['card_image']['url'] }}" alt="{{ $item['card_image']['alt'] ?? '' }}" />
						<h6 class="m-header">{{ $item['card_title'] }}</h6>
						<p class="">{{ $item['card_txt'] }}</p>

						<div class="absolute top-0 right-0">
							<svg xmlns="http://www.w3.org/2000/svg" width="87" height="87" viewBox="0 0 87 87" fill="none">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M86.9104 86.6418V0.431902H0.700457L66.9906 19.8442L86.9104 86.6418Z" fill="#E30613" />
							</svg>
						</div>
					</div>

					<div class="__date">
						<h3 class="primary">{{ $item['year'] }}</h3>
					</div>
				</div>

				@endforeach
			</div>

		</div>
	</div>

</section>