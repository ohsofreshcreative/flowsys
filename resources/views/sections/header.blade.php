@php
use App\Walkers\DropdownWalker;
use App\Walkers\MobileDropdownWalker;
@endphp

<header x-data="{ mobileOpen: false }" class="relative top-0 z-50 bg-white masthead fixed-top mt-4 rounded-full">

	<!-- Desktop Header -->
	<div class="items-center justify-between hidden h-full py-4 md:px-4 lg:px-12 mx-auto md:flex">
		<a class="brand w-1/6 min-w-25" href="{{ home_url('/') }}">
			@if ($logo)
			<img src="{{ $logo['url'] }}" alt="{{ $logo['alt'] ?? 'Logo' }}" class="relative w-auto h-12 -top-0.5">
			@else
			<span class="text-xl font-bold">{{ $siteName }}</span>
			@endif
		</a>
		@if (has_nav_menu('primary_navigation'))
		<nav class="ml-4  nav-primary w-max" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
			{!! wp_nav_menu([
			'theme_location' => 'primary_navigation',
			'menu_class' => 'nav flex gap-x-2 md:gap-x-3 lg:gap-x-6 text-sm font-medium items-center',
			'container' => false,
			'echo' => false,
			'walker' => new DropdownWalker(),
			]) !!}
		</nav>
		@endif
		<a class="__menu-btn bg-primary !text-white font-semibold rounded-full whitespace-nowrap py-2 px-2 lg:px-3 ml-2" href="/kontakt">Skontaktuj się z nami</a>
	</div>

	<!-- Mobile Header Bar -->
	<div class="flex items-center justify-between p-4 mobile-menu fixed-top md:hidden gap-20">
		<a class="brand" href="{{ home_url('/') }}">
			@if ($logo)
			<img src="{{ $logo['url'] }}" alt="{{ $logo['alt'] ?? 'Logo' }}" class="relative w-auto h-12 -top-0.5 max-w-[200px]">
			@else
			<span class="text-lg font-bold">{{ $siteName }}</span>
			@endif
		</a>
		<button
			@click.stop="mobileOpen = !mobileOpen"
			class="p-2 primary bg-white rounded-md"
			aria-expanded="mobileOpen"
			aria-controls="mobile-menu-panel">
			<span class="sr-only">Otwórz menu główne</span>
			<svg x-show="!mobileOpen" class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
				<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
			</svg>
			<svg x-show="mobileOpen" class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" style="display: none;">
				<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
			</svg>
		</button>
	</div>

	<!-- Mobile Menu Panel -->
	<div
		id="mobile-menu-panel"
		x-show="mobileOpen"
		@click.away="mobileOpen = false"
		@keydown.escape.window="mobileOpen = false"
		x-transition:enter="transition ease-out duration-200"
		x-transition:enter-start="opacity-0 transform translate-x-full"
		x-transition:enter-end="opacity-100 transform translate-x-0"
		x-transition:leave="transition ease-in duration-150"
		x-transition:leave-start="opacity-100 transform translate-x-0"
		x-transition:leave-end="opacity-0 transform translate-x-full"
		class="mobile-menu fixed top-0 right-0 bottom-0 w-full h-full bg-gradient shadow-xl z-[51] overflow-y-auto md:hidden" {{-- ZMIANA: Usunięto style="display: none;" i zmieniono z-40 na z-[51] --}}
		aria-label="Menu mobilne">
		<div class="p-4 relative z-10">
			<div class="flex items-center justify-between mb-6">
				<span class=""><a class="brand shrink-0" href="{{ home_url('/') }}"><img src="{{ $logo['url'] }}" alt="{{ $logo['alt'] ?? 'Logo' }}" class="w-auto max-w-[200px] h-12"></a></span>
				<button
					@click="mobileOpen = false"
					class="p-2 text-white rounded-md">
					<span class="sr-only">Zamknij menu</span>
					<svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
						<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
					</svg>
				</button>
			</div>

			@if (has_nav_menu('primary_navigation'))
			<nav class="flex flex-col space-y-1 mt-20">
				{!! wp_nav_menu([
				'theme_location' => 'primary_navigation',
				'menu_class' => 'nav-mobile flex flex-col space-y-2',
				'container' => false,
				'echo' => false,
				'walker' => new MobileDropdownWalker(),
				]) !!}
			</nav>
			@endif

			<div class="mt-8">
				<a href="/kontakt" class="block w-full white-btn">
				Skontaktuj się z nami
				</a>
			</div>
		</div>
	</div>
</header>