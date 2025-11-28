@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';

$sectionId = $block->data['id'] ?? null;
  $customClass = $block->data['className'] ?? '';
@endphp

<section data-gsap-anim="section" @if($sectionId) id="{{ $sectionId }}" @endif class="home-about {{ $block->classes }} {{ $customClass }} {{ $sectionClass }} {{ $section_class }}">
	<div class="">
		@if (!empty($about1['image']))
		<img class="c-main-wide object-cover w-full __img img-xl" src="{{ $about1['image']['url'] }}" alt="{{ $about1['image']['alt'] ?? '' }}">
		@endif

		<div class="c-main">
		<div class="grid grid-cols-1 md:grid-cols-2 justify-center items-center -mt-[180px]">
			<div></div>
			<div class="bg-primary px-14 py-14">
				@if (!empty($about1['title']))
				<p class="font-bold uppercase font-header">{{ strip_tags($about1['title']) }}</p>
				@endif

				@if (!empty($about1['content']))
				<h5 class="mt-5 font-medium __txt">{{ strip_tags($about1['content']) }}</h5>
				@endif

				<a href="#more" class="block mt-10">
					<img src="/wp-content/uploads/2025/05/arrow-down.svg" />
				</a>
			</div>
		</div>
		</div>
	</div>

	<div id="more" class="c-main items-center justify-center grid grid-cols-1 md:grid-cols-2">
		@if (!empty($about2['image2']))
		<img class="img-xl" src="{{ $about2['image2']['url'] }}" alt="{{ $about2['image2']['alt'] ?? '' }}">
		@endif

		<div class="__content ml-14">
			@if (!empty($about2['title2']))
			<h2 class="m-header">{{ $about2['title2'] }}</h2>
			@endif

			@if (!empty($about2['content2']))
			<div class="__txt">{!! $about2['content2'] !!}</div>
			@endif

			@if (!empty($about2['cta2']))
			<a class="main-btn m-btn" href="{{ $about2['cta2']['url'] }}" target="{{ $about2['cta2']['target'] ?? '_self' }}">
				{{ $about2['cta2']['title'] }}
			</a>
			@endif
		</div>
	</div>

</section>