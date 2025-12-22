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


<!-- proces -->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-proces relative overflow-hidden -smt {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-20 my-10">
		@if (!empty($g_proces['image']))
		<img data-gsap-element="img" class="__img object-cover order1 h-full radius-img" src="{{ $g_proces['image']['url'] }}" alt="{{ $g_proces['image']['alt'] ?? '' }}">
		@endif
		<div class="__content relative order2">
			<div class="__inner relative z-10">
				<h2 data-gsap-element="header" class="relative z-10">{{ $g_proces['title'] }}</h2>
				<div data-gsap-element="txt" class="">{!! $g_proces['txt'] !!}</div>
				@if (!empty($g_proces['button']))
				<a class="main-btn m-btn" href="{{ $g_proces['button']['url'] }}">{{ $g_proces['button']['title'] }}</a>
				@endif
				<div data-gsap-element="proces" class="proces-wrapper grid mt-10">
					@foreach ($repeater as $item)
					<div class="proces rounded-2xl bg-primary-lighter">
						<input class="acc-check" type="radio" name="radio-a" id="check{{ $loop->index }}" {{ $loop->first ? 'checked' : '' }}>
						<label class="proces-label font-semibold text-md md:text-h5 gap-4" for="check{{ $loop->index }}">
							<div><span class="text-primary">{{ $loop->iteration }}.</span> {{ $item['title'] }}</div>
						</label>
						<div class="proces-content border-primary border-l-2">
							<p>{!! $item['txt'] !!}</p>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			<img class="__bg absolute -top-10 -left-6 pointer-events-none" src="/wp-content/uploads/2025/12/proces_bg.svg" />
		</div>
	</div>

	<img class="__bg absolute -bottom-16 -left-16 pointer-events-none" src="/wp-content/uploads/2025/12/logo-stroke.svg" />
</section>