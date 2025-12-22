@extends('layouts.app')

@section('content')

@php
$term = get_queried_object();
$categories = get_categories();

$category_header = get_field('category_header', $term);
$category_description = get_field('category_description', $term);
$category_image = get_field('category_image', $term);

$bottom = get_field('bottom', 'option');

// Pobranie pól ACF dla sekcji 'bottom'
$section_id = $bottom['section_id'] ?? '';
$section_class = $bottom['section_class'] ?? '';
$flip = $bottom['flip'] ?? false;

// Przygotowanie klas CSS
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';

// Wygenerowanie unikalnego ID dla SVG
$unique_id = 'clip_'.uniqid();
@endphp

<div class="hero category-header relative" @if(!empty($category_image['url'])) style="background-image: url('{{ $category_image['url'] }}'); background-position: center; background-size: cover;" @endif>
	<div class="absolute inset-0 bg-black opacity-60"></div>

	<div class="__wrapper c-main relative z-10 pt-60 pb-26">
		<div class="__content w-full md:w-2/3">
			<h2 class="text-white m-header">
				{!! $category_header ?: get_the_archive_title() !!}
			</h2>
			@if ($category_description)
			<div class="text-white text-xl md:text-2xl">
				{!! $category_description !!}
			</div>
			@endif
		</div>
	</div>

</div>

<div id="category-tabs" class="c-main !-mt-16 category-tabs z-20 relative bg-white rounded-full p-3">
    <!-- Swiper -->
    <div class="swiper category-swiper lg:flex lg:justify-center">
        <div class="swiper-wrapper lg:w-fit">
            <!-- Slides -->
            <div class="swiper-slide !w-auto">
                <a href="/kategorie/wszystkie-kategorie" class="__tab block font-bold rounded-full px-4 py-2 {{ is_category('wszystkie-kategorie') ? 'active' : '' }}">Wszystkie kategorie</a>
            </div>
            @foreach($categories as $category)
                @if($category->name !== 'Wszystkie kategorie')
                <div class="swiper-slide !w-auto">
                    <a href="{{ get_category_link($category->term_id) }}#category-tabs" class="__tab block font-bold rounded-full px-4 py-2 {{ $term && $term->term_id === $category->term_id ? 'active' : '' }}">{{ $category->name }}</a>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</div>

@if (have_posts())
<div class="__posts c-main !mt-10 posts grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
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

<!-- bottom-block -->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="s-bottom-block relative overflow-hidden -smt bg-gradient {{ $sectionClass }} {{ !empty($section_class) ? $section_class : '' }}">
	<div class="grid grid-cols-1 md:grid-cols-2 items-center">

		<div class="__content w-11/12 md:w-3/4 lg:w-1/2 py-20 m-auto">
			<div data-gsap-element="txt">
				<h4 data-gsap-element="header" class="text-white">{{ $bottom['title'] }}</h4>
				<div data-gsap-element="txt" class="mt-2 text-white">
					{!! $bottom['txt'] !!}
				</div>
				<a data-gsap-element="phone" href="tel:{{ $bottom['phone'] }}" class="block text-h3 text-p-lighter w-max mt-6">{{ $bottom['phone'] }}</a>
				@if (!empty($bottom['button']))
				<a data-gsap-element="btn" class="main-btn m-btn align-self-bottom" href="{{ $bottom['button']['url'] }}">{{ $bottom['button']['title'] }}</a>
				@endif
			</div>

			<!-- <div data-gsap-element="form" data-gsap-element="form" class="mt-8">
                {!! do_shortcode($bottom['shortcode']) !!}
            </div> -->
		</div>

		<div data-gsap-element="img" class="__img inset-y-0 h-full">

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

@endsection