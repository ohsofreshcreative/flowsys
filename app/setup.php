<?php

/**
 * Theme setup.
 */

namespace App;

use Illuminate\Support\Facades\Vite;

/**
 * Inject styles into the block editor.
 *
 * @return array
 */
add_filter('block_editor_settings_all', function ($settings) {
	$style = Vite::asset('resources/css/editor.css');

	$settings['styles'][] = [
		'css' => "@import url('{$style}')",
	];

	return $settings;
});

/**
 * Inject scripts into the block editor.
 *
 * @return void
 */
add_filter('admin_head', function () {
	if (! get_current_screen()?->is_block_editor()) {
		return;
	}

	$dependencies = json_decode(Vite::content('editor.deps.json'));

	foreach ($dependencies as $dependency) {
		if (! wp_script_is($dependency)) {
			wp_enqueue_script($dependency);
		}
	}

	echo Vite::withEntryPoints([
		'resources/js/editor.js',
	])->toHtml();
});

/**
 * Use the generated theme.json file.
 *
 * @return string
 */
add_filter('theme_file_path', function ($path, $file) {
	return $file === 'theme.json'
		? public_path('build/assets/theme.json')
		: $path;
}, 10, 2);

/**
 * Register the initial theme setup.
 *
 * @return void
 */

add_action('after_setup_theme', function () {

	// Dodaj wsparcie dla WooCommerce
	add_theme_support('woocommerce');
	add_theme_support('wc-product-gallery-zoom');
	add_theme_support('wc-product-gallery-lightbox');
	add_theme_support('wc-product-gallery-slider');

	
	/**
	 * Disable full-site editing support.
	 *
	 * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
	 */
	remove_theme_support('block-templates');

	/**
	 * Register the navigation menus.
	 *
	 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
	 */
	register_nav_menus([
		'primary_navigation' => __('Primary Navigation', 'sage'),
	]);

	/**
	 * Disable the default block patterns.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
	 */
	remove_theme_support('core-block-patterns');

	/**
	 * Enable plugins to manage the document title.
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
	 */
	add_theme_support('title-tag');

	/**
	 * Enable post thumbnail support.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	/**
	 * Enable responsive embed support.
	 *
	 * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#responsive-embedded-content
	 */
	add_theme_support('responsive-embeds');

	/**
	 * Enable HTML5 markup support.
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
	 */
	add_theme_support('html5', [
		'caption',
		'comment-form',
		'comment-list',
		'gallery',
		'search-form',
		'script',
		'style',
	]);

	/**
	 * Enable selective refresh for widgets in customizer.
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
	 */
	add_theme_support('customize-selective-refresh-widgets');
}, 20);

/*--- WOOCOMMERCE PHP FILES ---*/

array_map(function ($file) {
  require_once $file;
}, array_merge(
  glob(get_theme_file_path('app/Woo/*.php')) ?: [],
  glob(get_theme_file_path('app/Woo/*/*.php')) ?: []
));


/*--- WOOCOMMERCE SIDEBAR ---*/

add_action('widgets_init', function () {
    register_sidebar([
        'name'          => __('Sklep - Filtry', 'sage'),
        'id'            => 'sidebar-shop',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h5 class="widget-title font-bold mb-4">',
        'after_title'   => '</h5>',
    ]);
});

/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
	$defaultConfig = [
		'before_widget' => '<section class="footer_widget widget %1$s %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h5 class="widget-title text-h5 primary mb-4 flex">',
		'after_title' => '</h5>',
	];

	register_sidebar([
		'name' => __('Primary', 'sage'),
		'id' => 'sidebar-primary',
	] + $defaultConfig);

	register_sidebar([
		'name' => __('Footer 1', 'sage'),
		'id'   => 'sidebar-footer-1',
	] + $defaultConfig);

	register_sidebar([
		'name' => __('Footer 2', 'sage'),
		'id'   => 'sidebar-footer-2',
	] + $defaultConfig);

	register_sidebar([
		'name' => __('Footer 3', 'sage'),
		'id'   => 'sidebar-footer-3',
	] + $defaultConfig);

	register_sidebar([
		'name' => __('Footer 4', 'sage'),
		'id'   => 'sidebar-footer-4',
	] + $defaultConfig);
});


/*--- CATEGORY IMAGE ---*/

/**
 * Register the ACF fields for Category taxonomy.
 */
add_action('acf/init', function () {
	if (function_exists('acf_add_local_field_group')) {
		acf_add_local_field_group([
			'key' => 'group_category_settings',
			'title' => 'Ustawienia Kategorii',
			'fields' => [
				[
                    'key' => 'field_category_header',
                    'label' => 'Nagłówek',
                    'name' => 'category_header',
                    'type' => 'text',
                    'instructions' => 'Opcjonalny nagłówek, który może zastąpić domyślną nazwę kategorii.',
                ],
                [
                    'key' => 'field_category_description',
                    'label' => 'Opis',
                    'name' => 'category_description',
                    'type' => 'textarea',
                    'instructions' => 'Krótki opis wyświetlany na stronie kategorii.',
                ],
                [
                    'key' => 'field_category_image',
                    'label' => 'Zdjęcie Kategorii',
                    'name' => 'category_image',
                    'type' => 'image',
                    'instructions' => 'Dodaj obrazek, który będzie wyświetlany jako tło lub nagłówek dla tej kategorii.',
                    'return_format' => 'array', // Zwraca tablicę z danymi obrazka (url, alt, etc.)
                    'preview_size' => 'medium',
                    'library' => 'all',
                ],
			],
			'location' => [
				[
					[
						'param' => 'taxonomy',
						'operator' => '==',
						'value' => 'category', // Celujemy w taksonomię "category"
					],
				],
			],
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'active' => true,
		]);
	}
});

/**
 * Remove archive title prefix (e.g., "Category:", "Tag:").
 */
add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    } elseif (is_tax()) {
        $title = single_term_title('', false);
    }

    return $title;
});

/*--- GSAP ---*/

add_action('wp_enqueue_scripts', function () {
	/**
	 * Rejestracja i ładowanie skryptów.
	 */

	// Ładuj GSAP i ScrollTrigger z CDN.
	// Trzeci argument (tablica []) oznacza brak zależności.
	// Piąty argument (true) umieszcza skrypty w stopce.
	wp_enqueue_script('gsap-cdn', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js', [], null, true);

	// Ustawiamy zależność 'gsap-st-cdn' od 'gsap-cdn', aby załadowały się w dobrej kolejności.
	wp_enqueue_script('gsap-st-cdn', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js', ['gsap-cdn'], null, true);
}, 1); // Ustawiamy priorytet na 1, aby wykonało się BARDZO wcześnie.


add_action('after_setup_theme', function () {
    remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
});




/**
 * Dynamically generate checkboxes for subsidies in Contact Form 7.
 */
add_action('after_setup_theme', function () {
    remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
});


/**
 * Register custom form tag for CF7 to display subsidies.
 */
add_action('wpcf7_init', function () {
    wpcf7_add_form_tag('subsidy_checkboxes', 'App\\custom_subsidy_checkboxes_handler');
});

/**
 * Handler for the [subsidy_checkboxes] form tag.
 *
 * @param WPCF7_FormTag $tag
 * @return string
 */
function custom_subsidy_checkboxes_handler($tag)
{
    $subsidies = get_field('subsidies', 'option');
    $output = '';

    if ($subsidies) {
        $output .= '<h2 class="text-2xl font-bold mb-4">Dofinansowania</h2>';
        $output .= '<div class="flex flex-col gap-2">';
        foreach ($subsidies as $subsidy) {
            if (!empty($subsidy['subsidy_name'])) {
                $name = esc_attr($subsidy['subsidy_name']);
                $output .= sprintf(
                    '<label class="flex items-center gap-2"><input type="checkbox" name="subsidies[]" value="%s" /> <span>%s</span></label>',
                    $name,
                    esc_html($name)
                );
            }
        }
        $output .= '</div>';
    }

    return $output;
}


/**
 * Disable Contact Form 7 auto <p> tags.
 */
add_filter('wpcf7_autop_or_not', '__return_false');
