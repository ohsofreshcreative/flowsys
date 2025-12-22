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

<!--- services --->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-services relative -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main relative">

		@if (!empty($g_services['header']))
		<h3 data-gsap-element="header" class="relative w-full md:w-1/2 z-10">{{ $g_services['header'] }}</h3>
		@endif

		<div class="__cards grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 mt-10">
			@if($offer)
			@foreach ($offer as $sector)
			<a href="{{ get_permalink($sector->ID) }}" class="">
				<div data-gsap-element="stagger" class="__card bg-white radius p-10">
					@if (has_post_thumbnail($sector->ID))
					<img class="w-20 aspect-square radius" src="{{ get_the_post_thumbnail_url($sector->ID, 'large') }}" alt="{{ $sector->post_title }}" class="w-full img-s object-cover rounded-t-2xl">
					@endif
					<h5 class="mt-4">
						{{ $sector->post_title }}
					</h5>
					<div class="__arrow bg-primary-light w-max rounded-full p-3 transition-all duration-500 mt-6">
						<img class="" src="/wp-content/uploads/2025/12/arrow-right.svg" />
					</div>
				</div>
			</a>
			@endforeach
			@endif
		</div>
	</div>
</section>