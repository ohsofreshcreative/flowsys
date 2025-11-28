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
@endphp

<!--- method --->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="method -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main">
		<div class="relative">

			<div class="grid grid-cols-1 md:grid-cols-2 items-center gap-4">
				@if (!empty($g_method['title']))
				<h2 data-gsap-element="header" class="m-header">{{ strip_tags($g_method['title']) }}</h2>
				@endif
				<div data-gsap-element="txt" class="">{{ strip_tags($g_method['txt']) }}</div>
			</div>

			@if (!empty($r_method))
			<div class="__repeater mt-10">
				@foreach ($r_method as $item)
				<div data-gsap-element="stagger" class="flex flex-col md:flex-row items-start lg:items-stretch gap-10 b-border-t pt-12 mb-12">
					<div class="flex flex-col lg:flex-row gap-2 lg:gap-8">
					<p class=" text-5xl secondary b-border-r pr-6 self-stretch flex items-center w-12">
						{{ $loop->iteration }}
					</p>

						<p class=" text-2xl secondary flex-1 self-stretch flex items-center">
							{{ $item['title'] }}
						</p>

						<p class="flex-1 self-stretch flex items-center">
							{{ $item['txt'] }}
						</p>
					</div>

					<img class="img-s radius-img block " src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] ?? '' }}" />
				</div>
				@endforeach
			</div>
			@endif

		</div>
	</div>

</section>