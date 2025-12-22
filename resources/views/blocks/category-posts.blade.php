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

<!--- category-posts -->

<div data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="block-category-posts -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="c-main">
		<div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
			<div class="__content">
				<h2 data-gsap-element="title" class="m-header">{{ $posts_settings['title'] }}</h2>
				@if(!empty($posts_settings['text']))
				<div data-gsap-element="txt" class="">
					{!! $posts_settings['text'] !!}
				</div>
				@endif

				@if (!empty($posts_settings['button']))
				<a data-gsap-element="btn" class="underline-btn m-btn" href="{{ $posts_settings['button']['url'] }}">{{ $posts_settings['button']['title'] }}</a>
				@endif
			</div>

			<div data-gsap-element="swiper" class="__posts relative">
				@if(!empty($posts))
				<div class="swiper posts-slider overflow-hidden">
					<div class="swiper-wrapper">
						@foreach($posts as $post)
						<div class="swiper-slide h-auto">
							@php
								$thumbnail_url = $show_image && has_post_thumbnail($post->ID) ? get_the_post_thumbnail_url($post->ID, 'large') : '';
							@endphp
							<a href="{{ get_permalink($post->ID) }}" class="relative h-full min-h-[350px] rounded-lg overflow-hidden bg-cover bg-center text-white p-6 flex flex-col justify-end" style="background-image: linear-gradient(to top, rgba(0,0,0,0.8) 20%, rgba(0,0,0,0) 80%), url('{{ $thumbnail_url }}')">
								<div class="__content relative z-10">
									<h6 class="text-white">
										{{ get_the_title($post->ID) }}
									</h6>
									<p class="underline-btn !text-primary-light mt-4">Przeczytaj</p>
								</div>
							</a>
						</div>
						@endforeach
					</div>
				</div>

				<div data-gsap-element="arrows" class="swiper-navigation-wrapper absolute top-1/2 left-0 w-full -translate-y-1/2 z-10 flex justify-between items-center pointer-events-none">
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
				@else
				<div class="no-posts">
					Brak postów do wyświetlenia.
				</div>
				@endif
			</div>
		</div>
	</div>
</div>