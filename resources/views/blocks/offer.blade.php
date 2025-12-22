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

<!--- offer --->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-offer relative -spt {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main relative">

		@if (!empty($g_offer['title']))
		<div class="relative">
			<h2 data-gsap-element="header" class="relative z-10">{{ $g_offer['title'] }}</h2>
			<img data-gsap-element="img" class="absolute -top-20 -left-40 pointer-events-none" src="/wp-content/uploads/2025/12/offer_stroke.svg" />
		</div>
		@endif

		<div class="__col grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-10 mt-8 lg:mt-10">

			<div class="relative md:sticky top-0 lg:top-10 h-max">
				@if (!empty($g_offer['image']))
				<div class="__img order1">
					<img data-gsap-element="img" class="absolute -bottom-10 -left-10 pointer-events-none" src="/wp-content/uploads/2025/12/sign_small.svg" />
					<img data-gsap-element="img" class="__img object-cover radius-img w-full img-xl" src="{{ $g_offer['image']['url'] }}" alt="{{ $g_offer['image']['alt'] ?? '' }}">
				</div>
				@endif
			</div>

			<div class="__second">
				@if (!empty($g_offer['header']))
				<h3 data-gsap-element="header" class="">{{ $g_offer['header'] }}</h3>
				@endif

				<div class="__list mt-8">
					@if($offer)
					@foreach ($offer as $sector)
					<a data-gsap-element="item" href="{{ get_permalink($sector->ID) }}" class="">
						<div class="__card b-bottom-p-light flex items-center gap-6 mb-4 pb-4">
							@if (has_post_thumbnail($sector->ID))
							<img class="w-20 aspect-square radius" src="{{ get_the_post_thumbnail_url($sector->ID, 'large') }}" alt="{{ $sector->post_title }}" class="w-full img-s object-cover rounded-t-2xl">
							@endif
							<h5 class="">
								{{ $sector->post_title }}
							</h5>
							<div class="__arrow bg-primary-light hover:bg-primary-lighter ml-auto rounded-full p-3 transition-all">
								<img class="" src="/wp-content/uploads/2025/12/arrow-right.svg" />
							</div>
						</div>
					</a>
					@endforeach
					@endif
				</div>
			</div>
		</div>
	</div>
</section>