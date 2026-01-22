<!doctype html>
<html @php(language_attributes())>

<head>
	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-17896034766"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());
		gtag('config', 'AW-17896034766');
	</script>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@php(do_action('get_header'))
	@php(wp_head())

	{{-- Fonts --}}
	<link rel="stylesheet" href="https://use.typekit.net/jgm3pcx.css">

	@vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body @php(body_class())>
	@php(wp_body_open())

	<div id="app">

		@include('sections.header')

		@if (function_exists('is_woocommerce') && (is_shop() || is_product_category() || is_product_tag()))

		@yield('content')

		@elseif (function_exists('is_product') && is_product())

		<main id="main" class="main">
			@yield('content')
		</main>

		@else

		<main id="main" class="main">
			@yield('content')
		</main>

		@endif

		@include('sections.footer')
	</div>

	@php(do_action('get_footer'))
	@php(wp_footer())

</body>

</html>