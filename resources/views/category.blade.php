@extends('layouts.app')

@section('content')

@php
$term = get_queried_object();
$categories = get_categories();

$category_header = get_field('category_header', $term);
$category_description = get_field('category_description', $term);
$category_image = get_field('category_image', $term);
@endphp

<div class="hero category-header">
	<div class="__wrapper c-main relative z-10 pt-60 pb-26">
		<div class="__content grid grid-cols-1 lg:grid-cols-2 gap-8 items-end">
			<h2 class="">
				{!! $category_header ?: get_the_archive_title() !!}
			</h2>
			@if ($category_description)
			<div class="mb-3">
				{!! $category_description !!}
			</div>
			@endif
		</div>
	</div>
	<img class="__bg absolute top-0 right-0 pointer-events-none" src="{{ $category_image['url'] ?? '' }}" alt="{{ $category_image['alt'] ?? '' }}" />
</div>

@php
$sticky_posts = get_option('sticky_posts');
$featured_post_id = null;

$featured_post_args = [
'posts_per_page' => 1,
'cat' => $term->term_id,
];

if (!empty($sticky_posts)) {
$featured_post_args['post__in'] = $sticky_posts;
$featured_post_args['ignore_sticky_posts'] = 1;
} else {

$featured_post_args['orderby'] = 'date';
$featured_post_args['order'] = 'DESC';
}

$featured_post_query = new WP_Query($featured_post_args);

if (!$featured_post_query->have_posts() && !empty($sticky_posts)) {
$featured_post_args = [
'posts_per_page' => 1,
'cat' => $term->term_id,
'orderby' => 'date',
'order' => 'DESC',
];
$featured_post_query = new WP_Query($featured_post_args);
}

if ($featured_post_query->have_posts()) {
$featured_post_id = $featured_post_query->posts[0]->ID;
}
@endphp

@if ($featured_post_query->have_posts())
@while ($featured_post_query->have_posts()) @php $featured_post_query->the_post() @endphp
<div class="c-main relative">
	<div class="bg-white border-p rounded-4xl grid grid-cols-1 md:grid-cols-2 items-center gap-10 z-5 p-8">
		<div>
			@if (has_post_thumbnail())
			<a class="rounded-2xl overflow-hidden block" href="{{ get_permalink() }}">
				{{ the_post_thumbnail('large') }}
			</a>
			@endif
		</div>
		<div>
			<span>{{ $term->name }}</span>
			<h4 class="mt-4">
				<a href="{{ get_permalink() }}">{{ get_the_title() }}</a>
			</h4>
			<a data-gsap-element="btn" class="stroke-btn m-btn align-self-bottom" href="{{ get_permalink() }}">Czytaj więcej</a>
		</div>
	</div>
</div>
@endwhile
@php wp_reset_postdata() @endphp
@endif


<div id="category-tabs" class="c-main !mt-20 category-tabs">
    <div class="__wrapper border-b-1 border-b-gray-300 flex justify-center gap-4">
        <a href="/kategorie/wszystkie/#category-tabs" class="__tab font-bold pt-6 px-3 {{ is_category('wszystkie') ? 'active' : '' }}">Wszystkie</a>
        @foreach($categories as $category)
        @if($category->name !== 'Wszystkie')
        <a href="{{ get_category_link($category->term_id) }}#category-tabs" class="__tab font-bold pt-6 pb-4 px-3 {{ $term && $term->term_id === $category->term_id ? 'active' : '' }}">{{ $category->name }}</a>
        @endif
        @endforeach
    </div>
</div>

@if (have_posts())
<div class="__posts c-main pb-25 !mt-10 posts grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
	@while (have_posts()) @php(the_post())

	@includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
	@endwhile
</div>

{!! get_the_posts_navigation() !!}
@else
<div class="mt-20 mb-20">
	<div class="c-main">
		<h3 class="">Brak wpisów w tej kategorii.</h3>
		<a class="main-btn m-btn" href="/kategorie/wszystkie-wpisy/">Sprawdź wszystkie wpisy</a>
	</div>
</div>
@endif
@endsection