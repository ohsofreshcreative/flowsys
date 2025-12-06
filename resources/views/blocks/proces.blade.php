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

<!-- proces -->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="proces faq relative overflow-hidden -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="c-wide bg-white py-10 radius-img border-p-light">
		<div class="__wrapper px-0 md:px-10 py-0 md:py-2 relative z-2">
			<div class="grid grid-cols-1 lg:grid-cols-[1.3fr_2fr] gap-8 lg:gap-20 my-10">
				@if (!empty($g_proces['image']))
				<img data-gsap-element="img-left" class="__img object-cover order1 h-full radius-img" src="{{ $g_proces['image']['url'] }}" alt="{{ $g_proces['image']['alt'] ?? '' }}">
				@endif
				<div class="__content order2">
					<h2 data-gsap-element="header" class="">{{ $g_proces['title'] }}</h2>
					<div data-gsap-element="txt" class="">{!! $g_proces['txt'] !!}</div>
					@if (!empty($g_proces['button']))
					<a class="main-btn m-btn" href="{{ $g_proces['button']['url'] }}">{{ $g_proces['button']['title'] }}</a>
					@endif
					<div data-gsap-element="proces" class="proces-wrapper grid mt-10">
						@foreach ($repeater as $item)
						<div class="proces px-6 md:px-8 rounded-2xl border-p-light">
							<input class="acc-check" type="radio" name="radio-a" id="check{{ $loop->index }}" {{ $loop->first ? 'checked' : '' }}>
							<label class="proces-label font-semibold text-md md:text-h5 gap-4" for="check{{ $loop->index }}">{{ $item['title'] }}</label>
							<div class="proces-content">
								<p>{!! $item['txt'] !!}</p>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</section>