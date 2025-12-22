@php
$categories = get_the_category();
$category = !empty($categories) ? $categories[0] : null;
@endphp

<section data-gsap-anim="section" class="hero-blog bg-background-brand relative overflow-hidden">
	<div class="__wrapper c-main relative z-10 -spt">
		<div class="__content w-full sm:w-3/4 mx-auto pb-30">
			@if (function_exists('woocommerce_breadcrumb'))
			{!! woocommerce_breadcrumb() !!}
			@endif

			<div class="__top mt-30 text-center">
				@if ($category)
				<a data-gsap-element="header" href="{{ get_category_link($category->term_id) }}" class="stroke-small-btn mb-4 inline-block">{{ $category->name }}</a>
				@endif
				<h1 data-gsap-element="header" class="text-h2 text-white mt-6">{{ get_the_title() }}</h1>
				@if(has_excerpt())
				<div data-gsap-element="content" class="text-white mt-4">
					{!! get_the_excerpt() !!}
				</div>
				@endif
			</div>
		</div>
	</div>
</section>

<section data-gsap-anim="section">
	<div id="tresc" class="__entry relative z-10 -mt-16">
		<div class="c-main">

			<div class="__content">
				@if(has_post_thumbnail())
				<div data-gsap-element="image" class="w-full img-2xl rounded-xl overflow-hidden mb-16">
					{!! get_the_post_thumbnail(get_the_ID(), 'large', ['class' => 'w-full']) !!}
				</div>
				@endif
				<div data-gsap-element="content" class="w-full md:w-3/4 m-auto mb-26">
					{!! the_content() !!}
				</div>
			</div>

		</div>
	</div>
</section>

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

<section data-gsap-anim="section" class="related-posts -smt pb-26">
	<div class="c-main border-primary border-t border-dotted pt-20">
		<h3 data-gsap-element="header" class="text-center">Podobne wpisy</h3>
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-14">

			@while($related_query->have_posts())
			@php($related_query->the_post())

			<article data-gsap-element="card" @php(post_class('__card'))>
				<a class="rounded-2xl" href="{{ get_permalink() }}">
					<div class="__content relative bg-white rounded-2xl p-6">
						@if (has_post_thumbnail())
						<div class="block rounded-2xl overflow-hidden">
							<img src="{{ get_the_post_thumbnail_url(null, 'large') }}" alt="{{ get_the_title() }}" class="w-full img-s object-cover">
						</div>
						@endif
						<h6 class="mt-6">
							{!! get_the_title() !!}
						</h6>
						<!--  <div class="mt-2">
            @php(the_excerpt())
        </div> -->
						<p href="{{ get_permalink() }}" class="underline-btn mt-4">
							Dowiedz się więcej
						</p>
					</div>
				</a>
			</article>

			@endwhile
			@php(wp_reset_postdata())

		</div>
	</div>
</section>
@endif