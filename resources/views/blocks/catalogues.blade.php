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

<!--- catalogues --->

<section data-gsap-anim="section" class="b-catalogues -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main -spt">

		<div class="relative grid grid-cols-1 lg:grid-cols-[1fr_2fr] items-center">
			<div class="__content">
				<h2 data-gsap-element="header" class="m-header">{{ strip_tags($g_catalogues['header']) }}</h2>
				<p data-gsap-element="txt">{{ $g_catalogues['text'] }}</p>

				<div class="inline-buttons m-btn">
					@if (!empty($g_catalogues['button']))
					<a data-gsap-element="btn" class="main-btn" href="{{ $g_catalogues['button']['url'] }}">{{ $g_catalogues['button']['title'] }}</a>
					@endif
					@if (!empty($g_catalogues['button2']))
					<a data-gsap-element="btn" class="second-btn" href="{{ $g_catalogues['button2']['url'] }}">{{ $g_catalogues['button2']['title'] }}</a>
					@endif
				</div>

			</div>

		</div>

		<div id="katalogi_tlc" class="pt-20">
			<h3>{{ $header1 }}</h3>
			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-10">
				@foreach ($r_catalogues as $item)
				@php
				// Wywołujemy funkcję z jej pełną przestrzenią nazw
				$thumbnail_url = !empty($item['file']['ID']) ? \App\get_pdf_thumbnail_url($item['file']['ID']) : '';
				@endphp
				<a href="{{ $item['file']['url'] }}" download>
					<div class="__card relative bg-white border-bottom-p p-10">
						@if($thumbnail_url)
						<img class="__thumb img-l m-auto" src="{{ $thumbnail_url }}" alt="{{ $item['title'] ?: 'Miniaturka katalogu' }}">
						@endif
						@if (!empty($item['title']))
						<h6 class="text-center mt-6">{{ $item['title'] }}</h6>
						@endif
						<img class="__btn m-auto mt-8" src="/wp-content/uploads/2025/11/download.svg" />
					</div>
				</a>
				@endforeach
			</div>
		</div>

		<div id="katalogi_producentow" class="pt-20">
			<h3>{{ $header2 }}</h3>
			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-10">
				@foreach ($r_catalogues_2 as $item)
				@php
				// Wywołujemy funkcję z jej pełną przestrzenią nazw
				$thumbnail_url = !empty($item['file']['ID']) ? \App\get_pdf_thumbnail_url($item['file']['ID']) : '';
				@endphp
				<a href="{{ $item['file']['url'] }}" download>
					<div class="__card relative bg-white border-bottom-p p-10">
						@if($thumbnail_url)
						<img class="__thumb img-l m-auto" src="{{ $thumbnail_url }}" alt="{{ $item['title'] ?: 'Miniaturka katalogu' }}">
						@endif
						@if (!empty($item['title']))
						<h6 class="text-center mt-6">{{ $item['title'] }}</h6>
						@endif
						<img class="__btn m-auto mt-8" src="/wp-content/uploads/2025/11/download.svg" />
					</div>
				</a>
				@endforeach
			</div>
		</div>

	</div>
</section>