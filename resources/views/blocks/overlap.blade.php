@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $nolist ? ' no-list' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $gap ? ' wider-gap' : '';

if (!empty($background) && $background !== 'none') {
$sectionClass .= ' ' . $background;
}
@endphp

<!--- overlap --->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-overlap relative -smt {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main relative z-10">
		<div class="__content order2">
			<div class="__txt w-full md:w-1/2 mx-auto">
				<h2 data-gsap-element="header" class="text-center m-header">{{ $g_overlap['title'] }}</h2>

				<div data-gsap-element="header" class="text-center">
					{!! $g_overlap['content'] !!}
				</div>
			</div>

			<div class="grid grid-cols-1 gap-8 mt-14">
				@foreach ($r_overlap as $item)
				<div class="gsap__cards __cards sticky top-20 mt-4">
					<div class="gsap__card __card  b-border p-8 rounded-4xl" style="background-image:url({{ $item['r_image']['url'] }}); background-size: cover; background-position: center;">
						<div class="flex items-start bg-white rounded-3xl w-full md:w-1/2 gap-4 p-6 md:p-10 mt-80 mb-0 md:mb-10 mx-0 md:mx-20">
							<svg xmlns="http://www.w3.org/2000/svg" width="120" viewBox="0 0 57 61" fill="none">
								<path d="M57 15.4824L39.1123 60.9883L39.0869 61H15.501L0 25.4463H23.5859L27.3799 34.1338L40.7979 0L57 15.4824ZM27.4775 39.3535L22.2764 27.4463H3.05371L16.8105 59H37.7451L54.6465 16.001L41.5693 3.50391L27.4775 39.3535Z" fill="#2BB209" />
							</svg>
							<div class="__content">
								<h5 class="secondary !text-[20px] md:text-h5">{{ $item['r_header'] }}</h5>
								<div class="">{!! $item['r_txt'] !!}</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>


		</div>
	</div>

	<img data-gsap-element="bg" class="__bg absolute w-[400px] -left-60 top-32 pointer-events-none" src="/wp-content/uploads/2025/12/sign_small.svg" />
</section>