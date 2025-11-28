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

<!--- cert --->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-cert relative -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="__wrapper c-main relative">
		@if (!empty($g_cert['header']))
		<div class="mb-10">
			<h3 data-gsap-element="header">{{ $g_cert['header'] }}</h3>
		</div>
		@endif

		@if(!empty($r_cert))
		<div x-data="{ activeTab: 0 }" class="grid grid-cols-1 md:grid-cols-[1fr_2fr] gap-20 mt-10">

			<div class="relative min-h-[600px] md:min-h-[500px]">
				@foreach ($r_cert as $item)
				<div
					x-show="activeTab === {{ $loop->index }}"
					x-cloak
					class="absolute inset-0"
					x-transition:enter="transition-opacity ease-out duration-300"
					x-transition:enter-start="opacity-0"
					x-transition:enter-end="opacity-100"
					x-transition:leave="transition-opacity ease-in duration-200"
					x-transition:leave-start="opacity-100"
					x-transition:leave-end="opacity-0">
					@if(!empty($item['pdf_file']['id']))
					@php
					$thumbnail_url = get_the_post_thumbnail_url($item['pdf_file']['id'], 'large');
					if (!$thumbnail_url) {
					$thumbnail_url = wp_get_attachment_image_src($item['pdf_file']['id'], 'large', true)[0];
					}
					@endphp
					<a href="{{ $item['pdf_file']['url'] }}" target="_blank" rel="noopener noreferrer" class="block w-full h-full group">
						<img class="w-full h-full object-contain rounded-lg transition-transform duration-300 group-hover:scale-105" src="{{ $thumbnail_url }}" alt="{{ $item['pdf_file']['alt'] ?? 'Miniatura certyfikatu' }}" />
					</a>
					@endif
				</div>
				@endforeach
			</div>

			<div class="flex flex-col">
				@foreach ($r_cert as $item)
				<div class="cert-item border-b border-gray-200 last:border-b-0">
					<button @click="activeTab = (activeTab === {{ $loop->index }} ? null : {{ $loop->index }})" class="w-full text-left py-4">
						<div class="flex items-center">
							<div class="transition-all duration-300 ease-in-out" :class="activeTab === {{ $loop->index }} ? 'w-10 mr-4' : 'w-0'">
								<svg
									xmlns="http://www.w3.org/2000/svg"
									viewBox="0 0 20 20"
									fill="currentColor"
									class="text-primary shrink-0 bg-p-light rounded-full w-10 h-10 p-3 border-p transition-opacity duration-300"
									:class="activeTab === {{ $loop->index }} ? 'opacity-100' : 'opacity-0'">
									<path d="M0.34807 7.28071L8.66983 0.280712C8.89405 0.0985542 9.19434 -0.00224062 9.50605 3.78025e-05C9.81775 0.00231622 10.1159 0.107485 10.3363 0.292894C10.5568 0.478302 10.6818 0.729114 10.6845 0.991311C10.6872 1.25351 10.5674 1.50611 10.3508 1.69471L4.05839 6.98771H18.8112C19.1265 6.98771 19.4289 7.09307 19.6518 7.2806C19.8747 7.46814 20 7.7225 20 7.98771C20 8.25293 19.8747 8.50728 19.6518 8.69482C19.4289 8.88235 19.1265 8.98771 18.8112 8.98771H4.05839L10.3508 14.2807C10.4644 14.373 10.5549 14.4833 10.6172 14.6053C10.6796 14.7273 10.7123 14.8585 10.7137 14.9913C10.7151 15.1241 10.685 15.2558 10.6252 15.3787C10.5655 15.5016 10.4772 15.6132 10.3656 15.7071C10.2539 15.801 10.1212 15.8753 9.9751 15.9255C9.829 15.9758 9.67246 16.0011 9.51461 16C9.35675 15.9988 9.20076 15.9712 9.05572 15.9188C8.91068 15.8664 8.7795 15.7902 8.66983 15.6947L0.34807 8.69471C0.1252 8.50718 0 8.25288 0 7.98771C0 7.72255 0.1252 7.46824 0.34807 7.28071Z" />
								</svg>
							</div>
							<h6 class="text-body transition-colors" :class="{ 'text-primary': activeTab === {{ $loop->index }}, 'text-gray-800': activeTab !== {{ $loop->index }} }">
								{{ $item['title'] }}
							</h6>
						</div>
					</button>
					<div x-show="activeTab === {{ $loop->index }}" x-collapse x-cloak>
						@if(!empty($item['text']))
						<div class="pt-2 pb-4 pl-9 text-sm text-gray-600">
							{!! $item['text'] !!}
						</div>
						@endif
					</div>
				</div>
				@endforeach
			</div>

		</div>
		@endif
	</div>
</section>