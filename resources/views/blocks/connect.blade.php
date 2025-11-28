@php
$sectionClass = '';
$sectionClass .= $nomt ? ' !mt-0' : '';
@endphp
@php
$backgroundGradients = "
linear-gradient(to bottom, rgba(0, 39, 4,0.9) 0%, rgba(0, 39, 4,0.9) 50%),
linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0) 100%)";

$imageUrl = !empty($g_connect_1['image']['url']) ? "url(" . $g_connect_1['image']['url'] . ")" : 'none';
@endphp

<!--- connect --->

<section
	data-gsap-anim="section"
	class="b-connect bg-s-lighter relative pt-10 pb-30 {{ $sectionClass }} {{ $section_class }}"
	style="background-color: rgb(0, 39, 4); background-image: {{ $backgroundGradients }}; --bg-image: {{ $imageUrl }};">


	<div class="__wrapper c-main relative z-2 -smt">

		<div class="relative grid grid-cols-1 lg:grid-cols-2 items-center gap-10 z-10">
			<div class="__content w-full lg:w-11/12 flex flex-col justify-between mt-10">

				<h2 data-gsap-element="header" class="text-white">{!! $g_connect_1['header'] !!}</h2>
				<p data-gsap-element="text" class="text-white">{!! $g_connect_1['txt'] !!}</p>

				<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
					<div data-gsap-element="data" class="__data flex flex-col gap-4">
						<a href="tel:{{ preg_replace('/\s+/', '', $g_connect_1['phone']) }}" class="__phone flex items-center text-xl  text-p-lighter">{{ $g_connect_1['phone'] }}</a>
						<a href="mailto:{{ $g_connect_1['email'] }}" class="__mail flex items-center text-xl  text-p-lighter">{{ $g_connect_1['email'] }}</a>
						<p class="text-lg  text-p-lighter">{!! $g_connect_1['address'] !!}</p>
					</div>
					
					<div data-gsap-element="info" class="__info flex flex-col gap-4 text-p-lighter">
						<b class="text-lg">{!! $g_connect_1['name'] !!}</b>
						<p class="leading-relaxed">{!! $g_connect_1['data'] !!}</p>
					</div>
				</div>
				
				@if (!empty($g_connect_1['button']))
				<a data-gsap-element="btn" class="main-btn m-btn align-self-bottom" href="{{ $g_connect_1['button']['url'] }}">{{ $g_connect_1['button']['title'] }}</a>
				@endif

			</div>

			<div data-gsap-element="form" class="__form">
				<h5 class="relative text-white mb-6 z-10">Formularz kontaktowy</h5>
				<div class="relative z-10">{!! do_shortcode($g_connect_2['shortcode']) !!}</div>
			</div>
		</div>
	</div>

</section>