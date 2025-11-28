@php
$sectionClass = '';
@endphp

<!--- contact --->

<section data-gsap-anim="section" class="contact bg-s-lighter relative -smt pt-30 pb-30 {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main relative z-2">

		<div class="relative grid grid-cols-1 lg:grid-cols-2 items-center gap-10 z-10">
			<div class="__content w-full lg:w-11/12 flex flex-col justify-between">
				<div class="__data">
					<h2 data-gsap-element="header" class="">{!! $g_contact_1['header'] !!}</h2>

					<div data-gsap-element="txt" class="mt-6">
						{!! $g_contact_1['txt'] !!}
					</div>

					<div data-gsap-element="form" class="mt-10">
						{!! do_shortcode($g_contact_2['shortcode']) !!}
					</div>

				</div>
			</div>
			<div data-gsap-element="img" class="h-full">
				<img class="h-full radius-img object-cover" src="{{ $g_contact_1['image']['url'] }}" alt="{{ $g_contact_1['image']['alt'] ?? '' }}">
			</div>
		</div>

		<div class="__glow"> 
		</div>
	</div>

</section>