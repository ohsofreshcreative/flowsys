@php
$categories = get_the_category();
$category = !empty($categories) ? $categories[0] : null;
@endphp

<section data-gsap-anim="section" class="hero-blog relative overflow-hidden">
	<div class="__wrapper c-main relative z-10 -spt">
		<div class="__content w-full sm:w-3/4">
			@if (function_exists('woocommerce_breadcrumb'))
			{!! woocommerce_breadcrumb() !!}
			@endif

			<div class="__top mt-30">
				@if ($category)
				<a data-gsap-element="header" href="{{ get_category_link($category->term_id) }}" class="stroke-small-btn mb-4 inline-block">{{ $category->name }}</a>
				@endif
				<h1 data-gsap-element="header" class="text-h2 mt-6">{{ get_the_title() }}</h1>
				@if(has_excerpt())
				<div data-gsap-element="content" class="">
					{!! get_the_excerpt() !!}
				</div>
				@endif
			</div>
		</div>
	</div>
</section>

<div id="tresc" class="__entry mt-10">
	<div class="c-main grid grid-cols-1 md:grid-cols-[3fr_1fr] gap-8">

		<div class="__content">
			@if(has_post_thumbnail())
			<div class="img-2xl rounded-xl overflow-hidden mb-16">
				{!! get_the_post_thumbnail(get_the_ID(), 'large') !!}
			</div>
			@endif
			{!! the_content() !!}
		</div>
		<div class="__sidebar sticky top-10 bg-dark radius h-max p-8">
			<h6 class="text-white">Doradzimy Ci najlepsze rozwiązanie</h6>
			<img class="my-8" src="/wp-content/uploads/2025/11/photos.png" />
			<p class="text-white">Szybki kontakt z ekspertem pozwoli uniknąć kosztownych przestojów.</p>

			<a data-gsap-element="btn" class="main-btn m-btn align-self-bottom" href="/kontakt">Porozmawiajmy</a>
		</div>
	</div>
</div>

@php
$current_id = get_the_ID();
$categories = wp_get_post_categories($current_id);
$related_args = [
'category__in' => $categories,
'post__not_in' => [$current_id],
'posts_per_page' => 3,
'ignore_sticky_posts' => 1,
];
$related_query = new WP_Query($related_args);
@endphp

@if($related_query->have_posts())
<section class="related-posts -smt pb-26">
	<div class="c-main border-top-p pt-20">
		<h3 class="text-center">Podobne wpisy</h3>
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-14">
			@while($related_query->have_posts())
			@php($related_query->the_post())
			<article @php(post_class([ '' ]))>
				<header>
					@if(has_post_thumbnail())
					<div class="overflow-hidden rounded-xl">
						<a class="" href="{{ get_permalink() }}">
							{!! get_the_post_thumbnail(null, 'large', ['class' => 'featured-image img-s rounded-xl object-cover']) !!}
						</a>
					</div>
					@endif

					<h6 class="text-center mt-6">
						<a href="{{ get_permalink() }}">
							{!! get_the_title() !!}
						</a>
					</h6>

					<!--  @include('partials.entry-meta') -->
				</header>



				<a href="{{ get_permalink($post->ID) }}" class="block bg-secondary rounded-full w-max m-auto p-6 mt-6">
					<svg class="" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M7.25678 0.469541C7.39905 0.320681 7.56797 0.202597 7.75387 0.122032C7.93978 0.0414667 8.13904 0 8.34028 0C8.54151 0 8.74077 0.0414667 8.92668 0.122032C9.11259 0.202597 9.2815 0.320681 9.42377 0.469541L15.5519 6.87946C15.8389 7.17993 16 7.58722 16 8.01188C16 8.43654 15.8389 8.84384 15.5519 9.1443L9.42377 15.5542C9.13458 15.8442 8.74828 16.0042 8.34767 15.9999C7.94705 15.9956 7.56399 15.8273 7.28058 15.5311C6.99718 15.2349 6.83598 14.8343 6.83153 14.4153C6.82708 13.9963 6.97974 13.5921 7.25678 13.2894L10.7703 9.61436H1.53204C1.12572 9.61436 0.736039 9.44553 0.448725 9.14501C0.161411 8.84448 0 8.43689 0 8.01188C0 7.58688 0.161411 7.17928 0.448725 6.87876C0.736039 6.57823 1.12572 6.4094 1.53204 6.4094L10.7703 6.4094L7.25678 2.73438C6.96988 2.43391 6.80873 2.02662 6.80873 1.60196C6.80873 1.1773 6.96988 0.770007 7.25678 0.469541Z" fill="white" />
					</svg>
				</a>

				<!--   <div class="entry-summary">
    @php(the_excerpt())
  </div> -->
			</article>
			@endwhile
			@php(wp_reset_postdata())
		</div>
	</div>
</section>
@endif