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

<section data-gsap-anim="section" class="department -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main">
		<div class="">

			@if (!empty($g_department['title']))
			<h2 class="mb-10">{{ strip_tags($g_department['title']) }}</h2>
			@endif

			@if (!empty($g_department['r_department']))
			@php
			$itemCount = count($g_department['r_department']);
			$gridCols = $itemCount;

			if ($itemCount == 4) {
			$gridCols = 2;
			} elseif ($itemCount > 4) {
			$gridCols = 2; // Or handle it differently if there are more than 4 items
			}

			$gridClass = 'grid-cols-1'; // Default to 1 column
			if ($gridCols > 1) {
			$gridClass = 'grid-cols-1 lg:grid-cols-' . $gridCols;
			}
			@endphp

			<div class="grid {{ $gridClass }} gap-8">
				@foreach ($g_department['r_department'] as $item)
				<div class="__card contact relative bg-white b-border p-8">
					<h6 class="m-header">{{ $item['card_title'] }}</h6>
					<p class="">{{ $item['card_txt'] }}</p>

					<a class="__phone flex items-center w-max mt-4" href="tel:{{ $item['phone'] }}">{{ $item['phone'] }}</a>
					<a class="__mail flex items-center w-max" href="mailto:{{ $item['phone'] }}">{{ $item['mail'] }}</a>

					<div class="absolute top-0 right-0">
						<svg xmlns="http://www.w3.org/2000/svg" width="87" height="87" viewBox="0 0 87 87" fill="none">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M86.9104 86.6418V0.431902H0.700457L66.9906 19.8442L86.9104 86.6418Z" fill="#E30613" />
						</svg>
					</div>
				</div>
				@endforeach
			</div>
			@endif

		</div>
	</div>

</section>