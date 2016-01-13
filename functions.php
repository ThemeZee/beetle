<?php
/**
 * Beetle functions and definitions
 *
 * @package Beetle
 */

/**
 * Beetle only works in WordPress 4.2 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.2', '<' ) ) :
	require get_template_directory() . '/inc/back-compat.php';
endif;


if ( ! function_exists( 'beetle_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function beetle_setup() {

	// Make theme available for translation. Translations can be filed in the /languages/ directory.
	load_theme_textdomain( 'beetle', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	
	// Set detfault Post Thumbnail size
	set_post_thumbnail_size( 840, 560, true );

	// Register Navigation Menu
	register_nav_menu( 'primary', esc_html__( 'Main Navigation', 'beetle' ) );

	// Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'beetle_custom_background_args', array( 'default-color' => 'ffffff' ) ) );
	
	// Set up the WordPress core custom header feature.
	add_theme_support('custom-header', apply_filters( 'beetle_custom_header_args', array(
		'header-text' => false,
		'width'	=> 1920,
		'height' => 480,
		'flex-height' => true
	) ) );
	
	// Add Theme Support for wooCommerce
	add_theme_support( 'woocommerce' );
	
}
endif; // beetle_setup
add_action( 'after_setup_theme', 'beetle_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function beetle_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'beetle_content_width', 810 );
}
add_action( 'after_setup_theme', 'beetle_content_width', 0 );


/**
 * Register widget areas and custom widgets.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function beetle_widgets_init() {
	
	register_sidebar( array(
		'name' => esc_html__( 'Sidebar', 'beetle' ),
		'id' => 'sidebar',
		'description' => esc_html__( 'Appears on posts and pages except full width template.', 'beetle' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="widget-header"><h3 class="widget-title">',
		'after_title' => '</h3></div>',
	));
	
	register_sidebar( array(
		'name' => esc_html__( 'Magazine Homepage', 'beetle' ),
		'id' => 'magazine-homepage',
		'description' => esc_html__( 'Appears on Magazine Homepage template only. You can use the Magazine Posts widgets here.', 'beetle' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-header"><h1 class="widget-title">',
		'after_title' => '</h1></div>',
	));
	
} // beetle_widgets_init
add_action( 'widgets_init', 'beetle_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function beetle_scripts() {
	global $wp_scripts;
	
	// Register and Enqueue Stylesheet
	wp_enqueue_style( 'beetle-stylesheet', get_stylesheet_uri() );
	
	// Register Genericons
	wp_enqueue_style( 'beetle-genericons', get_template_directory_uri() . '/css/genericons/genericons.css' );
	
	// Register and Enqueue HTML5shiv to support HTML5 elements in older IE versions
	wp_enqueue_script( 'beetle-html5shiv', get_template_directory_uri() . '/js/html5shiv.min.js', array(), '3.7.2', false );
	$wp_scripts->add_data( 'beetle-html5shiv', 'conditional', 'lt IE 9' );

	// Register and enqueue navigation.js
	wp_enqueue_script( 'beetle-jquery-navigation', get_template_directory_uri() .'/js/navigation.js', array('jquery') );
	
	// Register and Enqueue Google Fonts
	wp_enqueue_style( 'beetle-default-fonts', beetle_google_fonts_url(), array(), null );

	// Register Comment Reply Script for Threaded Comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
} // beetle_scripts
add_action( 'wp_enqueue_scripts', 'beetle_scripts' );


/**
 * Retrieve Font URL to register default Google Fonts
 */
function beetle_google_fonts_url() {
    
	// Set default Fonts
	$font_families = array('Ubuntu:200,400,600,800', 'Raleway:100,200,300,400,500,600,700,800');

	// Build Fonts URL
	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);
	$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return apply_filters( 'beetle_google_fonts_url', $fonts_url );
}


/**
 * Add custom sizes for featured images
 */
function beetle_add_image_sizes() {
	
	// Add Custom Header Image Size
	add_image_size( 'beetle-header-image', 1920, 480, true );
	
	// Add different thumbnail sizes for widgets and post layouts
	add_image_size( 'beetle-thumbnail-small', 120, 80, true );
	add_image_size( 'beetle-thumbnail-medium', 360, 240, true );
	add_image_size( 'beetle-thumbnail-large', 600, 400, true );
	
}
add_action( 'after_setup_theme', 'beetle_add_image_sizes' );


/**
 * Include Files
 */
 
// include Theme Info page
require get_template_directory() . '/inc/theme-info.php';

// include Theme Customizer Options
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/customizer/default-options.php';

// Include Extra Functions
require get_template_directory() . '/inc/extras.php';

// include Template Functions
require get_template_directory() . '/inc/template-tags.php';

// Include support functions for Theme Addons
require get_template_directory() . '/inc/addons.php';

// Include Post Slider Setup
require get_template_directory() . '/inc/slider.php';

// include Widget Files
require get_template_directory() . '/inc/widgets/widget-magazine-posts-boxed.php';
require get_template_directory() . '/inc/widgets/widget-magazine-posts-columns.php';
require get_template_directory() . '/inc/widgets/widget-magazine-posts-grid.php';