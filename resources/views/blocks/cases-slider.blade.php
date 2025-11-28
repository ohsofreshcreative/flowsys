@php
// --- Zmienne dla sekcji ---
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

// --- Pobieranie postów ---
$args = [
'post_type' => 'cases',
'posts_per_page' => -1,
];
$cases = new WP_Query($args);

// --- [FIX 1] Pobieranie tła dla sekcji ---
// Użyj pola ACF dla bloku, aby ustawić tło. To najbardziej elastyczne rozwiązanie.
// Nazwij to pole np. `background_image`.
$background_image_url = '';
$background_field = get_field('background_image'); // Pobierz pole ACF
if ($background_field && is_array($background_field)) {
$background_image_url = $background_field['url'];
}
// Alternatywa: jeśli chcesz tło z pierwszego posta na liście
// if ($cases->have_posts()) {
// $background_image_url = get_the_post_thumbnail_url($cases->posts[0]->ID, 'full');
// }
@endphp

<!-- cases-slider -->

<section data-gsap-anim="section" @if($sectionId) id="{{ $sectionId }}" @endif class="cases-slider c-main relative -smt {{ $block->classes }} {{ $customClass }} {{ $sectionClass }} {{ $section_class }}">

	@if ($title)
	<h2 data-gsap-element="header" class="">{{ $title }}</h2>
	@endif

	@if ($cases->have_posts())
	{{-- [FIX 2] Struktura Swiper Slider --}}
	<div class="swipers cases-swiper !overflow-visible mt-10">

		{{-- Strzałki nawigacji --}}
		<div data-gsap-element="arrows" class="__arrows absolute flex gap-4 z-10">
			<div class="swiper-button-prev">
				<svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24" fill="none">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 0L11.5 12.0235L0.5 24L6.26389 12.0706L0.5 0Z" fill="white" />
				</svg>
				</svg>
			</div>

			<div class="swiper-button-next">
				<svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24" fill="none">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 0L11.5 12.0235L0.5 24L6.26389 12.0706L0.5 0Z" fill="white" />
				</svg>
			</div>
		</div>

		{{-- Kontener na slajdy --}}
		<div class="swiper-wrapper">
			@while ($cases->have_posts()) @php $cases->the_post(); @endphp
			{{-- Pojedynczy slajd --}}
			<div class="swiper-slide">
				<div data-gsap-element="card" class="__card p-14 lg:p-26 pb-0 b-border" style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.90) 0%, rgba(0, 0, 0, 0.4) 100%), url('{{ get_the_post_thumbnail_url(get_the_ID(), 'large') }}'); background-size: cover; background-position: center;">

					<div class="__content order-1 lg:order-2 mt-40 -mb-6">
						<h4 class="text-white">{{ get_the_title() }}</h4>

						<div class="text-white mt-2">
							{{ get_the_excerpt() }}
						</div>

						<a class="main-btn m-btn mt-4 inline-block" href="{{ get_permalink() }}">Dowiedz się więcej</a>
					</div>
				</div>
			</div>
			@endwhile
		</div>

	</div>
	@php wp_reset_postdata(); @endphp
	@else
	<p>Brak realizacji do wyświetlenia.</p>
	@endif

</section>