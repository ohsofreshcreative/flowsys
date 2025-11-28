<?php

namespace App\Providers;

use Roots\Acorn\Sage\SageServiceProvider;
use App\Blocks\ExampleBlock;

class ThemeServiceProvider extends SageServiceProvider
{
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		parent::register();
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		parent::boot();

		// CUSTOM POST TYPE BRANŻE
		add_action('init', function () {
			register_post_type('sectors', [
				'label' => 'Branże',
				'public' => true,
				'has_archive' => false,
				'rewrite' => ['slug' => 'sectors'],
				'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
				'show_in_rest' => true,
				'taxonomies' => ['category'],
				'menu_icon' => 'dashicons-list-view',
			]);
		});

		// CUSTOM POST TYPE OFERTY PRACY
		add_action('init', function () {
			register_post_type('job_offers', [
				'label' => 'Oferty Pracy',
				'public' => true,
				'has_archive' => false,
				'rewrite' => ['slug' => 'job_offers'],
				'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
				'show_in_rest' => true,
				'taxonomies' => ['category'],
				'menu_icon' => 'dashicons-open-folder',
			]);
		});

		// CUSTOM POST TYPE KATEGORIE USŁUG
		add_action('init', function () {
            // Najpierw rejestrujemy taksonomię (kategorie)
            register_taxonomy('uslugi_category', 'uslugi', [
                'label' => 'Kategorie Usług',
                'rewrite' => ['slug' => 'kategorie-uslug'],
                'hierarchical' => true,
                'show_admin_column' => true,
                'show_in_rest' => true,
            ]);

            // Następnie rejestrujemy CPT i łączymy go z taksonomią
            register_post_type('uslugi', [
                'label' => 'Usługi',
                'public' => true,
                'has_archive' => false,
                'rewrite' => ['slug' => 'uslugi'],
                'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
                'show_in_rest' => true,
                'menu_icon' => 'dashicons-admin-generic',
                'taxonomies' => ['uslugi_category'], // Tutaj łączymy CPT z nową taksonomią
            ]);
        });

		// USATAWIENIA MOTYWU
		add_action('acf/init', function () {
			if (function_exists('acf_add_options_page')) {
				acf_add_options_page([
					'page_title' => 'Ustawienia motywu',
					'menu_title' => 'Ustawienia motywu',
					'menu_slug'  => 'theme-settings',
					'capability' => 'edit_posts',
					'redirect'   => false,
				]);

				acf_add_options_page([
					'page_title' => 'Wezwanie do działania',
					'menu_title' => 'Wezwanie do działania',
					'menu_slug'  => 'bottom',
					'capability' => 'edit_posts',
					'redirect'   => false,
				]);

				acf_add_options_page([
					'page_title' => 'Obszar działania',
					'menu_title' => 'Obszar działania',
					'menu_slug'  => 'o-area',
					'capability' => 'edit_posts',
					'redirect'   => false,
				]);

				/* 	acf_add_options_page([
					'page_title' => 'Oferta',
					'menu_title' => 'Oferta',
					'menu_slug'  => 'sectors',
					'capability' => 'edit_posts',
					'parent_slug' => '',
					'redirect'   => false,
				]); */
			}
		});
	}
}
