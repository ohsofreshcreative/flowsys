@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
@endphp

<section data-gsap-anim="section" class="two-cols -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-8">
		<div class="__first">

			<img class="m-img" src="{{ $col1['image']['url'] }}" alt="{{ $col1['image']['alt'] ?? '' }}">
			<h3 class="mt-5 primary">{{ $col1['title'] }}</h3>
			<p>{{ $col1['text'] }}</p>
			<h5 class="mt-5">{{ $col1['subtitle'] }}</h5>
			<div class="mt-4 __content">{!! $col1['content'] !!}</div>
			@if (!empty($col1['button']))
			<a href="{{ $col1['button']['url'] }}">{{ $col1['button']['title'] }}</a>
			@endif
		</div>
		<div class="__second">

			<img class="m-img" src="{{ $col2['image']['url'] }}" alt="{{ $col2['image']['alt'] ?? '' }}">
			<h3 class="mt-6">{{ $col2['title'] }}</h3>
			<p>{{ $col2['text'] }}</p>
			<h5 class="mt-5">{{ $col2['subtitle'] }}</h5>
			<div class="mt-4 __content">{!! $col2['content'] !!}</div>
			@if (!empty($col2['button']))
			<a href="{{ $col2['button']['url'] }}">{{ $col2['button']['title'] }}</a>
			@endif
		</div>
	</div>

</section>