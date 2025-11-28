@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $lightbg ? ' section-light' : '';
$sectionClass .= $greybg ? ' section-grey' : '';
$sectionClass .= $whitebg ? ' section-white' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
@endphp

<!--- text-tiles --->

<section data-gsap-anim="section" class="text-tiles relative -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main">
		<div class="grid grid-cols-1 lg:grid-cols-2 gap-20 mt-16">

			<div class="__content relative lg:sticky top-8 h-max order1 mb-6">
				<h3 data-gsap-element="header" class="">{{ strip_tags($g_tiles['header']) }}</h3>
				<p data-gsap-element="txt" class="__txt mt-6">{{ strip_tags($g_tiles['text']) }}</p>
				@if (!empty($g_tiles['button']))
				<a data-gsap-element="button" class="main-btn m-btn" href="{{ $g_tiles['button']['url'] }}">{{ $g_tiles['button']['title'] }}</a>
				@endif

				@if (!empty($g_tiles['bg']))
				<div class="__bg absolute -top-10 -left-80 opacity-10 pointer-events-none">
					<img class="" src="{{ $g_tiles['bg']['url'] }}" alt="{{ $g_tiles['bg']['alt'] ?? '' }}">
				</div>
				@endif
			</div>

			<div class="order2">

				@foreach ($repeater as $item)
				<div data-gsap-element="card" style="background-image:url('{{ $item['card_image']['url'] }}'); background-size: cover;" class="__card radius-img p-6 !pt-40 md:p-8 mb-6 sticky top-8">
					<div class="__content bg-black/50 p-4 radius-img">
						<h6 class="text-white">{{ $item['card_title'] }}</h6>
						<p class="text-white mt-2">{{ $item['card_txt'] }}</p>
					</div>
				</div>
				@endforeach
			</div>

		</div>
	</div>

</section>