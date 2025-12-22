@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $lightbg ? ' section-light' : '';
$sectionClass .= $graybg ? ' section-gray' : '';
$sectionClass .= $whitebg ? ' section-white' : '';
$sectionClass .= $brandbg ? ' section-brand' : '';
@endphp

<!--- reviews --->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="s-reviews -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main">
		<div class="__content">
			<div data-gsap-element="header" class="__wrapper block w-full md:w-1/2 pb-10">
				<h3 class="">{{ $g_reviews['title']}}</h3>
				<div class="">{!! $g_reviews['text'] !!}</div>
			</div>

			<div class="swiper reviews-swiper !overflow-visible">
				<div data-gsap-element="swiper" class="swiper-wrapper">
					@foreach($r_reviews as $card)
					<div class="swiper-slide">
						<div class="__card relative bg-white radius px-10 py-14">
							<svg class="absolute top-8 right-8" xmlns="http://www.w3.org/2000/svg" width="92" height="76" viewBox="0 0 92 76" fill="none">
								<path d="M84 0L91.4667 19.0662C81.3333 19.5958 73.6 21.4495 73.6 31.5122V34.9547H92V76H51.4667V33.8955C51.4667 13.2404 62.4 2.11847 84 0ZM32.5333 0L40 19.0662C29.8667 19.5958 22.1333 21.4495 22.1333 31.5122V34.9547H40.5333V76H0V33.8955C0 13.2404 10.9333 2.11847 32.5333 0Z" fill="#D5F0CE" />
							</svg>

							<div class="relative z-10 flex flex-col gap-4 mt-6">
								@if(!empty($card['txt']))
								<div class="__txt">{{ $card['txt'] }}</div>
								@endif
								<img class="max-w-1/2" src="/wp-content/uploads/2025/12/stars.svg" />
								<b class="block">{{ $card['name'] }}</b>
								<div class="flex items-center gap-4">
									<img src="/wp-content/uploads/2025/12/google.svg" />Opinia zweryfikowana<svg xmlns="http://www.w3.org/2000/svg" width="10" height="9" viewBox="0 0 10 9" fill="none">
										<path d="M9.79198 3.98624C9.79176 3.98602 9.79159 3.98577 9.79134 3.98555L6.08553 0.211353C5.8079 -0.0713855 5.35886 -0.0703333 5.08251 0.21382C4.8062 0.497937 4.80727 0.957482 5.08489 1.24026L7.57297 3.77419L0.709219 3.77419C0.317517 3.77419 0 4.09914 0 4.5C0 4.90086 0.317517 5.22581 0.709219 5.22581H7.57294L5.08492 7.75974C4.8073 8.04252 4.80624 8.50206 5.08255 8.78618C5.3589 9.07037 5.80797 9.07135 6.08556 8.78865L9.79137 5.01445C9.79159 5.01423 9.79176 5.01398 9.79201 5.01376C10.0698 4.73004 10.0689 4.26901 9.79198 3.98624Z" fill="#249408" />
									</svg>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>

				<div data-gsap-element="arrows" class="absolute top-1/2 left-0 w-full -translate-y-1/2 z-10 flex justify-between items-center pointer-events-none">
					<div class="__prev rounded-full bg-primary-light hover:bg-primary-lighter h-14 w-14 flex items-center justify-center pointer-events-auto -translate-x-1/2 cursor-pointer transition-all duration-400">
						<svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none">
							<path d="M0.270429 5.31498C0.270706 5.31469 0.270937 5.31435 0.27126 5.31406L5.08882 0.281803C5.44973 -0.0951806 6.03348 -0.0937777 6.39273 0.285093C6.75194 0.663916 6.75055 1.27664 6.38964 1.65367L3.15514 5.03226L12.078 5.03226C12.5872 5.03226 13 5.46552 13 6C13 6.53448 12.5872 6.96774 12.078 6.96774L3.15518 6.96774L6.3896 10.3463C6.75051 10.7234 6.75189 11.3361 6.39269 11.7149C6.03344 12.0938 5.44963 12.0951 5.08877 11.7182L0.271213 6.68594C0.270936 6.68565 0.270706 6.68531 0.270383 6.68502C-0.0907122 6.30673 -0.08956 5.69202 0.270429 5.31498Z" fill="#249408" />
						</svg>
					</div>
					<div class="__next rounded-full bg-primary-light hover:bg-primary-lighter h-14 w-14 flex items-center justify-center pointer-events-auto translate-x-1/2 cursor-pointer transition-all duration-300">
						<svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none">
							<path d="M12.7296 5.31498C12.7293 5.31469 12.7291 5.31435 12.7287 5.31406L7.91118 0.281803C7.55027 -0.0951806 6.96652 -0.0937777 6.60727 0.285093C6.24806 0.663916 6.24945 1.27664 6.61036 1.65367L9.84486 5.03226L0.921985 5.03226C0.412773 5.03226 0 5.46552 0 6C0 6.53448 0.412773 6.96774 0.921985 6.96774L9.84482 6.96774L6.6104 10.3463C6.24949 10.7234 6.24811 11.3361 6.60731 11.7149C6.96657 12.0938 7.55037 12.0951 7.91123 11.7182L12.7288 6.68594C12.7291 6.68565 12.7293 6.68531 12.7296 6.68502C13.0907 6.30673 13.0896 5.69202 12.7296 5.31498Z" fill="#249408" />
						</svg>
					</div>
				</div>

			</div>
			<!--- swiper end --->

			<div class="mt-10">
				<img src="/wp-content/uploads/2025/12/google-1.svg" />
				<a class="!underline">Sprawdź wszystkie opinie</a>
			</div>
		</div>
	</div>

</section>