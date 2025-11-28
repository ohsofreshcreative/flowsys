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
 * ========================================================================
 * WooCommerce: Wyłączenie sortowania i licznika wyników na stronach archiwów
 * ========================================================================
 * Ten kod usuwa standardowe akcje WooCommerce, aby uprościć wygląd sklepu.
 */
add_action('init', function () {
    // Usuń akcję odpowiedzialną za wyświetlanie "Wyświetlanie X z Y wyników"
    remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);

    // Usuń akcję odpowiedzialną za wyświetlanie dropdownu do sortowania
    remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
});


/*---- CATEGORY REDIRECT TO PAGE ----*/

add_action('template_redirect', function () {
    // Sprawdź, czy jesteśmy na stronie kategorii produktu i czy ACF jest aktywny
    if (!is_product_category() || !function_exists('get_field')) {
        return;
    }

    // Pobierz aktualny obiekt kategorii
    $category = get_queried_object();

    // Pobierz ID strony podlinkowanej w polu ACF
    $linked_page_url = get_field('linked_page', $category);

    // Jeśli strona została podlinkowana, wykonaj przekierowanie 301
    if ($linked_page_url) {
        wp_redirect($linked_page_url, 301);
        exit();
    }
});


/**
 * Generates a thumbnail from the first page of a PDF file and returns its URL.
 *
 * @param int $pdf_attachment_id The attachment ID of the PDF file.
 * @return string The URL to the generated thumbnail or the original PDF URL on failure.
 */
function get_pdf_thumbnail_url($pdf_attachment_id)
{
    // Check if Imagick extension is available
    if (!extension_loaded('imagick')) {
        error_log('Imagick extension is not loaded. PDF thumbnail generation is disabled.');
        return wp_get_attachment_url($pdf_attachment_id);
    }

    $pdf_path = get_attached_file($pdf_attachment_id);
    if (!$pdf_path || !file_exists($pdf_path)) {
        return wp_get_attachment_url($pdf_attachment_id);
    }

    $upload_dir = wp_upload_dir();
    $thumbnail_filename = pathinfo($pdf_path, PATHINFO_FILENAME) . '-pdf-thumb.jpg';
    $thumbnail_path = "{$upload_dir['path']}/{$thumbnail_filename}";
    $thumbnail_url = "{$upload_dir['url']}/{$thumbnail_filename}";

    // If thumbnail already exists, return its URL
    if (file_exists($thumbnail_path)) {
        return $thumbnail_url;
    }

    try {
        $imagick = new \Imagick();
        $imagick->setResolution(150, 150);
        $imagick->readImage("{$pdf_path}[0]");
        $imagick->setImageFormat('jpeg');
        $imagick->setImageBackgroundColor('white');
        $imagick->setImageAlphaChannel(\Imagick::ALPHACHANNEL_REMOVE);
        $imagick->mergeImageLayers(\Imagick::LAYERMETHOD_FLATTEN);
        $imagick->writeImage($thumbnail_path);
        $imagick->clear();
        $imagick->destroy();

        return $thumbnail_url;
    } catch (\Exception $e) {
        error_log('PDF to Image conversion failed: ' . $e->getMessage());
        return wp_get_attachment_url($pdf_attachment_id);
    }
}

add_action('wp_footer', function () {
    // Pobierz obiekt nadrzędnej strony "Sklep" na podstawie jej adresu URL (/produkty).
    $parent_shop_page = get_page_by_path('produkty');

    // Jeśli strona nadrzędna nie istnieje, zakończ, aby uniknąć błędów.
    if (!$parent_shop_page) {
        return;
    }

    // Sprawdź, czy bieżąca strona jest podstroną strony "Sklep".
    $is_child_of_shop_page = is_page() && get_queried_object()->post_parent === $parent_shop_page->ID;

    // Jeśli to podstrona sklepu (czyli Twoja niestandardowa kategoria), pokaż dedykowany dymek.
    if ($is_child_of_shop_page) {
        echo view('partials.category-bubble');
        return; // Zakończ, aby nie pokazywać drugiego dymka.
    }

    // Jeśli to jakakolwiek inna strona WooCommerce (np. strona produktu, koszyk), pokaż ogólny dymek.
    if (function_exists('is_woocommerce') && is_woocommerce()) {
        echo view('partials.contact-bubble');
    }
});