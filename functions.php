<?php
/**
 * mimi functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mimi
 */

if ( ! function_exists( 'mimi_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mimi_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on mimi, use a find and replace
	 * to change 'mimi' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'mimi', get_template_directory() . '/languages' );

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
		'menu-1' => esc_html__( 'Primary', 'mimi' ),
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
	add_theme_support( 'custom-background', apply_filters( 'mimi_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'mimi_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mimi_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mimi_content_width', 640 );
}
add_action( 'after_setup_theme', 'mimi_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mimi_widgets_init() {
	register_sidebar([
		'name'          => __('Primary', 'mimi'),
		'id'            => 'sidebar-primary',
		'before_widget' => '<section class="widget %1$s %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	]);

	register_sidebar([
		'name'          => __('Footer Left', 'mimi'),
		'id'            => 'sidebar-footer-left',
		'before_widget' => '<section class="widget %1$s %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	]);
	register_sidebar([
		'name'          => __('Footer Center', 'mimi'),
		'id'            => 'sidebar-footer-center',
		'before_widget' => '<section class="widget %1$s %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	]);
	register_sidebar([
		'name'          => __('Footer Right', 'mimi'),
		'id'            => 'sidebar-footer-right',
		'before_widget' => '<section class="widget %1$s %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	]);
}
add_action( 'widgets_init', 'mimi_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mimi_scripts() {
	wp_enqueue_style( 'mimi-style', get_stylesheet_uri() );

	wp_enqueue_script( 'mimi-jquery', get_template_directory_uri() . '/dist/js/jquery-3.1.1.min.js', array(), '20160122', true );
	
	wp_enqueue_script( 'mimi-navigation', get_template_directory_uri() . '/dist/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'mimi-skip-link-focus-fix', get_template_directory_uri() . '/dist/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'mimi-assets', get_template_directory_uri() . '/dist/js/assets.js', array(), '20160122', true );
	
	wp_enqueue_script( 'mimi-main', get_template_directory_uri() . '/dist/js/main.js', array(), '20160122', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mimi_scripts' );

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
