@php
$sectionClass = '';
$sectionClass .= $nomt ? ' !mt-0' : '';
@endphp

<!--- faq --->

<section data-gsap-anim="section" class="b-faq -smt {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main grid grid-cols-1 md:grid-cols-[2fr_1fr] gap-10 md:gap-20">

		<div class="__content">
			<h3 data-gsap-element="header" class="">{{ $faq['title'] }}</h3>
			<div class="accordion-wrapper mt-8">
				@foreach ($repeater as $item)
				<div class="accordion border-p">
					<input
						class="acc-check"
						type="radio"
						name="radio-a"
						id="check{{ $loop->index }}"
						{{ $loop->first ? 'checked' : '' }}>
					<label class="accordion-label font-bold" for="check{{ $loop->index }}">{{ $item['title'] }}</label>
					<div class="accordion-content">
						<p>{{ $item['txt'] }}</p>
					</div>
				</div>
				@endforeach
			</div>
		</div>

		<div class="__box bg-dark radius p-10">
			<h6 data-gsap-element="header" class="text-white">{{ $g_faq_box['title'] }}</h6>
			@if (!empty($g_faq_box['image']))
			<img data-gsap-element="img" class="mt-6" src="{{ $g_faq_box['image']['url'] }}" alt="{{ $g_faq_box['image']['alt'] ?? '' }}">
			@endif
			<div data-gsap-element="text" class="text-white mt-6">
				{!! $g_faq_box['content'] !!}
			</div>
			@if (!empty($g_faq_box['button']))
			<a data-gsap-element="btn" class="main-btn m-btn" href="{{ $g_faq_box['button']['url'] }}">{{ $g_faq_box['button']['title'] }}</a>
			@endif
		</div>

	</div>

</section>