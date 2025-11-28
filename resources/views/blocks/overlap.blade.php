@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $gap ? ' wider-gap' : '';
$sectionClass .= $lightbg ? ' section-light' : '';
$sectionClass .= $greybg ? ' section-grey' : '';
$sectionClass .= $whitebg ? ' section-white' : '';
$sectionClass .= $brandbg ? ' section-brand' : '';

$sectionId = $block->data['id'] ?? null;
$customClass = $block->data['className'] ?? '';
@endphp

<!--- overlap --->

<section data-gsap-anim="section" @if($sectionId) id="{{ $sectionId }}" @endif class="overlap relative -smt {{ $block->classes }} {{ $customClass }} {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main relative">
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
						<div class="flex flex-col md:flex-row items-start md:items-center gap-2 md:gap-10 bg-white b-border p-6 md:p-10 mt-80 mb-0 md:mb-10 mx-0 md:mx-20 rounded-3xl">
							<img src="/wp-content/uploads/2025/08/overlap-icon.svg" />
							<h5 class="secondary !text-[20px] md:text-h5">{{ $item['r_header'] }}</h5>
							<div class="">{!! $item['r_txt'] !!}</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>


		</div>
	</div>

</section>