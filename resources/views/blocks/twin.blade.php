@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $gap ? ' wider-gap' : '';

if (!empty($background) && $background !== 'none') {
$sectionClass .= ' ' . $background;
}
@endphp

<!--- twin --->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-twin -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main">

		<h3 data-gsap-element="header" class="">{{ strip_tags($g_twin['header']) }}</h3>

		<div class="grid gap-8 mt-10">
			@foreach ($r_twin as $item)
			<div class="__card relative bg-white rounded-4xl grid grid-cols-1 md:grid-cols-[1fr_2fr] items-center gap-10 p-10">
				<div class="__content">
					@if (!empty($item['title']))
					<h5 data-gsap-element="header" class="mb-2">{{ $item['title'] }}</h5>
					@endif
					@if (!empty($item['txt']))
					<div data-gsap-element="txt" class="">{!! $item['txt'] !!}</div>
					@endif
				</div>
				<div class="__cards relative grid grid-cols-1 sm:grid-cols-2 gap-4">
					@if (!empty($item['selected_offers']))
					@foreach ($item['selected_offers'] as $offer_post)
					@php
					$thumbnail_url = get_the_post_thumbnail_url($offer_post->ID, 'medium_large');
					@endphp
					<a data-gsap-element="img" href="{{ get_permalink($offer_post->ID) }}"
						class="__card relative flex flex-col justify-end p-6 rounded-4xl text-white min-h-[250px] overflow-hidden group"
						style="background-image: url('{{ $thumbnail_url }}'); background-size: cover; background-position: center;">

						<div class="absolute inset-0 bg-black opacity-40 group-hover:opacity-60 transition-opacity"></div>

						<div class="relative z-10">
							<h6 class="text-white mb-4">{{ $offer_post->post_title }}</h6>
							<div class="__arrow bg-primary-light w-max rounded-full p-3 transition-all duration-500 mt-6">
								<img class="" src="/wp-content/uploads/2025/12/arrow-right.svg" />
							</div>
						</div>
					</a>
					@endforeach
					@endif
					<img data-gsap-element="img" class="__bg absolute top-1/2 left-1/2 -translate-1/2 max-w-14 pointer-events-none" src="/wp-content/uploads/2025/12/connection.svg" />
				</div>
			</div>
			@endforeach
		</div>

	</div>
</section>