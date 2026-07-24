<?php
/**
 * TVGA theme bootstrap.
 *
 * Keeps functions.php thin — real logic lives in inc/. This file only
 * wires up theme support, menus, asset loading, and requires the includes.
 *
 * @package TVGA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // No direct access.
}

define( 'TVGA_VERSION', '1.0.0' );
define( 'TVGA_DIR', get_template_directory() );
define( 'TVGA_URI', get_template_directory_uri() );

/**
 * Theme setup: supported features + registered menus.
 */
function tvga_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script', 'navigation-widgets' ) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 60,
			'width'       => 200,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	register_nav_menus(
		array(
			'primary'         => __( 'Primary Navigation (header)', 'tvga' ),
			'footer-quick'    => __( 'Footer — Quick Links', 'tvga' ),
			'footer-involved' => __( 'Footer — Get Involved', 'tvga' ),
		)
	);
}
add_action( 'after_setup_theme', 'tvga_setup' );

/**
 * Enqueue styles and scripts.
 * Google Fonts + hand-authored main.css (no build step) + a small JS file
 * for the mobile nav toggle only.
 */
function tvga_assets() {
	wp_enqueue_style(
		'tvga-fonts',
		'https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700;900&family=Inter:wght@400;500;600;700&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'tvga-main',
		TVGA_URI . '/assets/css/main.css',
		array(),
		file_exists( TVGA_DIR . '/assets/css/main.css' ) ? filemtime( TVGA_DIR . '/assets/css/main.css' ) : TVGA_VERSION
	);

	wp_enqueue_script(
		'tvga-main',
		TVGA_URI . '/assets/js/main.js',
		array(),
		file_exists( TVGA_DIR . '/assets/js/main.js' ) ? filemtime( TVGA_DIR . '/assets/js/main.js' ) : TVGA_VERSION,
		true
	);

	if ( is_singular() && comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tvga_assets' );

/**
 * Register widget area used only as a fallback (not part of the designed
 * homepage, but keeps sidebar.php-style templates from breaking if someone
 * duplicates a page template later).
 */
function tvga_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Fallback Sidebar', 'tvga' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Not used on the homepage. Available for standard pages/posts if needed.', 'tvga' ),
			'before_widget' => '<div class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'tvga_widgets_init' );

require TVGA_DIR . '/inc/custom-post-types.php';
require TVGA_DIR . '/inc/meta-boxes.php';
require TVGA_DIR . '/inc/customizer.php';
require TVGA_DIR . '/inc/template-tags.php';
