@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $lightbg ? ' section-light' : '';
@endphp

<section data-gsap-anim="section" class="cases {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main">
		<div class="">

			@if (!empty($g_cases['r_cases']))
			<div class="">

				@foreach ($g_cases['r_cases'] as $index => $item)
				@php $sectionId = 'case-section-' . $index; @endphp
				<div class="__card -smt" id="{{ $sectionId }}">
					<div class="grid grid-cols-1 lg:grid-cols-2 lg:grid-cols-[1fr_2fr] gap-8">
						<div class="">
						<h6 class="primary">Spis treści</h6>
							<ul class="toc space-y-2 mt-4">
								@foreach ($g_cases['r_cases'] as $idx => $tocItem)
								<li>
									<a href="#case-section-{{ $idx }}" class="toc-link block hover:underline" data-target="case-section-{{ $idx }}">
										{{ $tocItem['card_subtitle'] }}
									</a>
								</li>
								@endforeach

								<li><a href="#contact" class="__support--link">Potrzebujesz wsparcia?</a></li>
							</ul>
						</div>
						<div class="__content">
							<h2 class=""><span class="primary">{{ $item['card_subtitle'] }}: </span>{{ $item['card_title'] }}</h2>
							<p class="mt-3">{!! $item['card_txt'] !!}</p>
						</div>
					</div>
					@if (!empty($item['card_image']))
					<img class="m-img img-xl -smt" src="{{ $item['card_image']['url'] }}" alt="{{ $item['card_image']['alt'] ?? '' }}" />
					@endif
				</div>
				@endforeach

			</div>
			@endif

		</div>
	</div>

</section>