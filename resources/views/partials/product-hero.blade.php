@php
// Pobieramy naszą grupę ACF z produktu
$extras = get_field('product_extras') ?: [];
$imgUrl = $extras['image']['url'] ?? '';
$link = $extras['link'] ?? null;

@endphp

@if($imgUrl)
<section data-gsap-anim="section"
	class="s-product-hero relative bg-gradient -spt">

	<div class="__wrapper c-main h-full">
		@php
		if (function_exists('woocommerce_breadcrumb')) {
		woocommerce_breadcrumb(); }
		@endphp

		<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-20 items-center">
			<div class="__text">
				<h1 class="text-white text-h2 m-header">{{ get_the_title() }}</h1>
				@if (!empty($extras['content']))
				<div class="text-white mt-4">
					{!! $extras['content'] !!}
				</div>
				@endif
				<a data-gsap-element="arrow" href="#" class="__scroll block m-btn">
					<div class="__arrow border-p">
						<svg xmlns="http://www.w3.org/2000/svg" width="14" height="20" viewBox="0 0 20 24" fill="none">
							<path d="M10.7383 22.7454L19.4181 14.0655C19.8264 13.6572 19.8265 12.9932 19.4183 12.585C19.0101 12.1768 18.3461 12.1768 17.9378 12.5851L11.0484 19.4744L11.0476 1.99787C11.0474 1.41913 10.5788 0.95049 10 0.950244C9.42127 0.950596 8.95255 1.41932 8.9522 1.99806L8.953 19.4752L2.06463 12.5869C1.65641 12.1786 0.99242 12.1787 0.584122 12.587C0.175823 12.9953 0.175763 13.6593 0.583987 14.0675L9.25988 22.7434C9.666 23.1537 10.33 23.1537 10.7383 22.7454Z" fill="#00aa4f" />
						</svg>
					</div>
				</a>
			</div>
			@if($imgUrl)
			<img src="{{ $imgUrl }}" class="relative justify-self-center -bottom-20">
			@endif
		</div>
	</div>
</section>
@endif