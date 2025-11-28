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
$sectionClass .= $darkbg ? ' section-dark' : '';
@endphp

<!--- offer --->

<section data-gsap-anim="section" class="s-offer -smt border-top-p {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main">

		<h2 data-gsap-element="img" class="text-center">{{ strip_tags($g_offer['header']) }}</h2>

		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 mt-20">
			@if (!empty($g_offer['r_offer']))
			@foreach ($g_offer['r_offer'] as $item)
			<a class="" href="{{ $item['button']['url'] }}" target="{{ $item['button']['target'] ?? '_self' }}">
				<div data-gsap-element="card" class="__card relative">
					<img class="mb-6" src="{{ $item['image']['url'] }}"
						alt="{{ $item['image']['alt'] ?? '' }}" />
					<h6 class="mb-4">{{ $item['header'] }}</h6>
					<p class="">{{ $item['text'] }}</p>
					<p class="underline-btn -arrow mt-6" href="{{ $item['button']['url'] }}" target="{{ $item['button']['target'] ?? '_self' }}">
						{{ $item['button']['title'] }}
					</p>
				</div>
			</a>
			@endforeach
			@endif
		</div>

	</div>
</section>