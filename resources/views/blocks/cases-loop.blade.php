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

$sectionId = $block->data['id'] ?? null;
$customClass = $block->data['className'] ?? '';

$args = [
'post_type' => 'cases',
'posts_per_page' => -1, // Wyświetl wszystkie posty
];

$cases = new WP_Query($args);
@endphp

<section data-gsap-anim="section" @if($sectionId) id="{{ $sectionId }}" @endif class="cases-loop c-main relative -smt {{ $block->classes }} {{ $customClass }} {{ $sectionClass }} {{ $section_class }}">

	@if ($cases->have_posts())
	<div class="__cards grid gap-10">
		@while ($cases->have_posts())
		@php $cases->the_post(); @endphp
		<div class="__card grid grid-cols-1 lg:grid-cols-2 items-center gap-10 b-border p-10">
			<div class="__img order1">
				@if (has_post_thumbnail())
				<img class="object-cover w-full __img img-m" src="{{ get_the_post_thumbnail_url() }}" alt="{{ get_the_title() }}">
				@endif
			</div>

			<div class="__content order2">

				@php
				$client_logo = get_field('client_logo');
				@endphp

				@if ($client_logo)
				<img class="logos mb-4" src="{{ $client_logo['url'] }}" alt="{{ $client_logo['alt'] ?: 'Logo klienta' }}">
				@endif

				<h3 data-gsap-element="header" class="">{{ get_the_title() }}</h3>

				<div data-gsap-element="txt" class="mt-2">
					{{ get_the_excerpt() }}
				</div>

				<a class="main-btn m-btn" href="{{ get_permalink() }}">Dowiedz się więcej</a>
			</div>
		</div>
		@endwhile
		@php wp_reset_postdata(); @endphp

		<div class="absolute top-0 right-0">
			<svg xmlns="http://www.w3.org/2000/svg" width="87" height="87" viewBox="0 0 87 87" fill="none">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M86.9104 86.6418V0.431902H0.700457L66.9906 19.8442L86.9104 86.6418Z" fill="#E30613" />
			</svg>
		</div>
	</div>
	@else
	<p>Brak realizacji do wyświetlenia.</p>
	@endif

</section>