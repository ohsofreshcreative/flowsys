

<!--- calc --->

<section data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-calc relative -smt {{ $sectionClass }} {{ $section_class }}">

	<div class="__wrapper c-main relative z-2">
		{!! do_shortcode($g_calc['shortcode']) !!}
	</div>

</section>