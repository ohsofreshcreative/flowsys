@php
$categories = get_the_category();
$category = !empty($categories) ? $categories[0] : null;
@endphp


<div class="">
	<div class="__content">
		{!! the_content() !!}
	</div>
</div>