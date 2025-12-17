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

<!--- gains --->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-gains relative -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main relative grid grid-cols-1 lg:grid-cols-[1.5fr_3fr] gap-8 z-10">

		<div class="__top flex flex-col justify-between">
			@if (!empty($g_gains['image']))
			<div data-gsap-element="img" class="__img order-2 lg:order-1 mt-8 lg:mt-0">
				<img class="object-cover w-full __img radius-img" src="{{ $g_gains['image']['url'] }}" alt="{{ $g_gains['image']['alt'] ?? '' }}">
			</div>
			@endif
			<h3 data-gsap-element="header" class="text-p-lighter order-1 lg:order-2">{{ strip_tags($g_gains['header']) }}</h3>
		</div>

		<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
			@foreach ($r_gains as $item)
			<div data-gsap-element="card" class="__card relative bg-p-lighter radius h-max p-6">
				@if (!empty($item['image']['url']))
				<img class="mb-6" src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] ?? '' }}" />
				@endif
				@if (!empty($item['title']))
				<h6 class="text-body mb-4">{{ $item['title'] }}</h6>
				@endif
				@if (!empty($item['text']))
				<p class="text-body">{{ $item['text'] }}</p>
				@endif
			</div>
			@endforeach
		</div>
	</div>
	<img data-gsap-element="bg" class="__bg absolute -top-80 -right-20 pointer-events-none" src="/wp-content/uploads/2025/12/v.svg" />
	<img data-gsap-element="bg" class="__bg absolute top-1/2 -translate-y-1/2 -left-1/6 pointer-events-none" src="/wp-content/uploads/2025/12/logo-stroke.svg" />
</section>