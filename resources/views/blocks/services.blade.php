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

<!--- services -->

@if (!empty($service_tabs))
<section @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-services -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="c-main">
		@if ($title)
		<h2 class="text-center m-header">{{ $title }}</h2>
		@endif

		<div x-data="{ activeTab: {{ $service_tabs[0]['term']->term_id }} }" class="mt-12">
			{{-- Przyciski zakładek --}}
			<div
				x-data="{
                    isDown: false,
                    startX: null,
                    scrollLeft: null,
                }"
				@mousedown.prevent="
                    isDown = true;
                    startX = $event.pageX - $el.offsetLeft;
                    scrollLeft = $el.scrollLeft;
                    $el.classList.add('cursor-grabbing');
                "
				@mouseleave="isDown = false; $el.classList.remove('cursor-grabbing');"
				@mouseup="isDown = false; $el.classList.remove('cursor-grabbing');"
				@mousemove.prevent="
                    if (!isDown) return;
                    const x = $event.pageX - $el.offsetLeft;
                    const walk = (x - startX) * 1.5;
                    $el.scrollLeft = scrollLeft - walk;
                "
				class="__tabs flex justify-start md:justify-center gap-4 bg-dark rounded-full p-4 overflow-x-auto [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none] cursor-grab select-none">
				@foreach ($service_tabs as $tab)
				<button
					@click="activeTab = {{ $tab['term']->term_id }}"
					:class="{ 'border-primary text-primary !pointer-events-none': activeTab === {{ $tab['term']->term_id }}, 'cursor-pointer border-transparent bg-dark text-white': activeTab !== {{ $tab['term']->term_id }} }"
					class="bg-white text-white text-sm whitespace-nowrap py-4 px-6 rounded-full border-solid-p shrink-0">
					{{ $tab['term']->name }}
				</button>
				@endforeach
			</div>

			{{-- Treść zakładek --}}
			<div class="">
				@foreach ($service_tabs as $tab)
				<div x-show="activeTab === {{ $tab['term']->term_id }}" x-cloak>
					<div class="">
						@foreach ($tab['posts'] as $service_post)
						<div class="__card grid grid-cols-1 lg:grid-cols-[1.5fr_1.4fr] items-center gap-10 bg-white radius border-p p-6 mt-10">
							@if (has_post_thumbnail($service_post->ID))
							<a class="__order1 href=" {{ get_permalink($service_post->ID) }}">
								<img src="{{ get_the_post_thumbnail_url($service_post->ID, 'large') }}" alt="{{ $service_post->post_title }}" class="img-l w-full object-cover rounded-xl">
							</a>
							@endif
							<div class="__order2 p-6">
								<h4 class="text-xl font-bold mb-2">
									<a href="{{ get_permalink($service_post->ID) }}">{{ $service_post->post_title }}</a>
								</h4>
								<div class="text-gray-600 text-sm mb-4 prose max-w-none">
									{!! get_field('short_description', $service_post->ID) !!}
								</div>
								<!-- <a href="{{ get_permalink($service_post->ID) }}" class="underline-btn">
									Dowiedz się więcej
								</a> -->
							</div>
						</div>
						@endforeach
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</section>
@elseif (is_admin())
<p>Blok Usługi: Dodaj wpisy do CPT "Usługi" i przypisz je do "Kategorii Usług", aby wyświetlić je w zakładkach.</p>
@endif