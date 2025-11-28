@php
$categories = get_the_category();
$category = !empty($categories) ? $categories[0] : null;
@endphp

<div id="tresc" class="__entry">
	
			{!! the_content() !!}
</div>

@php
$current_id = get_the_ID();
$categories = wp_get_post_categories($current_id);
$related_args = [
'category__in' => $categories,
'post__not_in' => [$current_id],
'posts_per_page' => 3,
'ignore_sticky_posts' => 1,
];
$related_query = new WP_Query($related_args);
@endphp
