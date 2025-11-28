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

<div data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="block-category-posts -smt layout-{{ $layout }} {{ $sectionClass }} {{ $section_class }}">
	<div class="c-main">
		<div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-10">
			<h2 data-gsap-element="title" class="block-title">{{ $posts_settings['title'] }}</h2>

			@if($category_id)
			<div data-gsap-element="btn" class="view-all-container text-center">
				<a class="stroke-btn" href="{{ get_category_link($category_id) }}">
					Zobacz wszystkie wpisy
				</a>
			</div>
			@endif
		</div>

		@if(!empty($posts))
		<div class="posts-container grid grid-cols-1 md:grid-cols-2 gap-8">
			@foreach($posts as $post)
			<div data-gsap-element="card" class="__card">
				@if($show_image && has_post_thumbnail($post->ID))
				<div class="__img img-m">
					<a href="{{ get_permalink($post->ID) }}">
						{!! get_the_post_thumbnail($post->ID, 'large') !!}
					</a>
				</div>
				@endif
				<div class="__content mt-6">
					<h5 class="text-center">
						<a href="{{ get_permalink($post->ID) }}">
							{{ get_the_title($post->ID) }}
						</a>
					</h5>

					@if($show_excerpt)
					<div class="text-center">
						{{ get_the_excerpt($post->ID) }}
					</div>
					@endif

					<a href="{{ get_permalink($post->ID) }}" class="block bg-secondary rounded-full w-max m-auto p-6 mt-6">
						<svg class="" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M7.25678 0.469541C7.39905 0.320681 7.56797 0.202597 7.75387 0.122032C7.93978 0.0414667 8.13904 0 8.34028 0C8.54151 0 8.74077 0.0414667 8.92668 0.122032C9.11259 0.202597 9.2815 0.320681 9.42377 0.469541L15.5519 6.87946C15.8389 7.17993 16 7.58722 16 8.01188C16 8.43654 15.8389 8.84384 15.5519 9.1443L9.42377 15.5542C9.13458 15.8442 8.74828 16.0042 8.34767 15.9999C7.94705 15.9956 7.56399 15.8273 7.28058 15.5311C6.99718 15.2349 6.83598 14.8343 6.83153 14.4153C6.82708 13.9963 6.97974 13.5921 7.25678 13.2894L10.7703 9.61436H1.53204C1.12572 9.61436 0.736039 9.44553 0.448725 9.14501C0.161411 8.84448 0 8.43689 0 8.01188C0 7.58688 0.161411 7.17928 0.448725 6.87876C0.736039 6.57823 1.12572 6.4094 1.53204 6.4094L10.7703 6.4094L7.25678 2.73438C6.96988 2.43391 6.80873 2.02662 6.80873 1.60196C6.80873 1.1773 6.96988 0.770007 7.25678 0.469541Z" fill="white" />
						</svg>
					</a>
				</div>
			</div>
			@endforeach
		</div>
		@else
		<div class="no-posts">
			Brak postów w wybranej kategorii.
		</div>
		@endif
	</div>
</div>