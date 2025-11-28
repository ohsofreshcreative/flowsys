@php
$about_group = get_field('product_about') ?? [];

$main_header = $about_group['header'] ?? '';
$items = $about_group['items'] ?? [];
@endphp

@if($main_header || !empty($items))
<section class="product-about relative -spt">
	<div class="__wrapper c-main">

		<div class="__content">
			@if($main_header)
			<h3 class="w-full md:w-1/2">{{ esc_html($main_header) }}</h3>
			@endif

			@if(!empty($items))
			<div class="__items mt-14">
				@foreach($items as $item)
				<div class="__item grid grid-cols-1 md:grid-cols-[1fr_3fr] border-top-p pt-14 mt-14">
					
					@if(!empty($item['title']))
					<h6 class="primary mb-6">{{ esc_html($item['title']) }}</h6>
					@endif

					<div>
						@if(!empty($item['header']))
						<h5 class="">{{ esc_html($item['header']) }}</h5>
						@endif
						@if(!empty($item['content']))
						<div class="mt-2">
							{!! wp_kses_post($item['content']) !!}
						</div>
						@endif
					</div>
				</div>
				@endforeach
			</div>
			@endif
		</div>

	</div>
</section>
@endif