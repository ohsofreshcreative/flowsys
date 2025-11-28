@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $whitebg ? ' section-white' : '';
$sectionClass .= $lightbg ? ' section-light' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';

$sectionId = $block->data['id'] ?? null;
$customClass = $block->data['className'] ?? '';
@endphp

<section data-gsap-anim="section" @if($sectionId) id="{{ $sectionId }}" @endif class="video -smt {{ $block->classes }} {{ $customClass }} {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main">
		<h2 data-gsap-element="header" class="mb-10 text-center">{{ $g_video['title'] }}</h2>

		@if (!empty($g_video['video']))
		<div class="video-wrapper relative">
			<video
				id="customVideo"
				class="w-full">
				<source src="{{ $g_video['video'] }}" type="video/mp4">
				Twoja przeglądarka nie obsługuje odtwarzania wideo.
			</video>

			<button
				id="customPlayBtn"
				class="absolute inset-0 flex items-center justify-center bg-black/40 hover:bg-black/60 transition"
				aria-label="Odtwórz wideo">
				<img src="http://windes.local/wp-content/uploads/2025/06/play.svg" alt="Play" class="w-20 h-20">
			</button>
		</div>
		@endif


	</div>

</section>

<script>
	document.addEventListener('DOMContentLoaded', function () {
  const video = document.getElementById('customVideo');
  const playBtn = document.getElementById('customPlayBtn');

  if (video && playBtn) {
    playBtn.addEventListener('click', () => {
      playBtn.style.display = 'none';

      // Dodaj controls i odtwórz
      video.setAttribute('controls', 'controls');
      video.play();
    });
  }
});

</script>