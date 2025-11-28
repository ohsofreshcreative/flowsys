@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $lightbg ? ' section-light' : '';
@endphp

<section data-gsap-anim="section" class="gallery -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main">
		<div class="">

			@if (!empty($group1['gallery']))
			<div class="grid gap-10">
				@foreach ($group1['gallery'] as $image)
				<img class="img-l object-cover" src="{{ $image['url'] }}" alt="{{ $image['alt'] ?? '' }}">
				@endforeach
			</div>
			@endif

		</div>
	</div>

</section>