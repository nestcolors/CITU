<?php
/**
 * citu functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package citu
 */

if ( ! function_exists( 'citu_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function citu_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on citu, use a find and replace
	 * to change 'citu' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'citu', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'citu' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'citu_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'citu_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function citu_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'citu_content_width', 640 );
}
add_action( 'after_setup_theme', 'citu_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function citu_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'citu' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'citu' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'citu_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function citu_scripts() {
	wp_enqueue_script( 'citu-jquery', get_template_directory_uri() . '/build/js/jquery-3.1.1.min.js', array(), '20151215', true );
	wp_enqueue_script( 'citu-slick', get_template_directory_uri() . '/build/js/slick.min.js', array(), '20151215', true );
	wp_enqueue_script( 'citu-main', get_template_directory_uri() . '/build/js/main.js', array(), '20151215', true );
	wp_enqueue_script( 'citu-wp-main', get_template_directory_uri() . '/js/wp-main.js', array(), '20151215', true );

	wp_enqueue_style( 'citu-bootstrap', get_template_directory_uri() .'/build/css/bootstrap.min.css' );
	wp_enqueue_style( 'citu-slick', get_template_directory_uri() .'/build/css/slick.css' );
	wp_enqueue_style( 'citu-slick-theme', get_template_directory_uri() .'/build/css/slick-theme.css' );
	wp_enqueue_style( 'citu-main', get_template_directory_uri() .'/build/css/main.css' );

}
add_action( 'wp_enqueue_scripts', 'citu_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

include 'abv_autoload.php';
include 'abv_options.php';

global $abv_citu;

$abv_citu = new ABVCitu();