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

<!--- job -->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-job relative -smt {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main relative">
		<div class="__col grid grid-cols-1 md:grid-cols-2 lg:grid-cols-[3fr_1fr] gap-10">

			<div class="__content order2">
				<div data-gsap-element="txt" class="__txt mt-2">
					{!! $g_job['txt'] !!}
				</div>

				@if (!empty($g_job['button']))
				<a data-gsap-element="btn" class="main-btn m-btn align-self-bottom" href="{{ $g_job['button']['url'] }}">{{ $g_job['button']['title'] }}</a>
				@endif

				<div data-gsap-element="form" class="__form bg-dark radius p-8 md:p-10 lg:p-14 mt-20">
					<h5 class="relative text-white mb-6 z-10">{{ $g_job_3['title'] }}</h5>
					<div class="relative z-10">{!! do_shortcode($g_job_3['shortcode']) !!}</div>
				</div>
			</div>

			<div data-gsap-element="card" class="__sidebar sticky top-10 bg-dark radius h-max p-8">
				<h6 class="text-white"> {!! $g_job_2['title'] !!}</h6>
				@if (!empty($g_job_2['image']))
				<img class="my-8" src="{!! $g_job_2['image']['url'] !!}" />
				@endif
				<div class="text-white">{!! $g_job_2['txt'] !!}</div>

				@if (!empty($g_job_2['button']))
				<a class="main-btn m-btn align-self-bottom" href="{{ $g_job_2['button']['url'] }}">{{ $g_job_2['button']['title'] }}</a>
				@endif
			</div>

		</div>

</section>