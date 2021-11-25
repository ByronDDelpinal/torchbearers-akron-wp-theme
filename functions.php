<?php
/**
 * torchbearers functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package torchbearers
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'torchbearers_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function torchbearers_setup() {
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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'torchbearers' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'torchbearers_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'torchbearers_setup' );

// Method to redirect to referrer if it's set
add_action("um_after_login_fields", function(){
    if( isset( $_SERVER['HTTP_REFERER'] ) && !isset( $_REQUEST['redirect_to'] ) ){
        echo "<input type='hidden' name='redirect_to' value='".esc_attr( $_SERVER['HTTP_REFERER'] )."'>";
    } else {
		echo "<input type='hidden' name='redirect_to' value='".esc_attr( '/' )."'>";
	}
});

// Adds support for editor color palette.
add_theme_support( 'editor-color-palette', array(
	array(
		'name'  => __( 'Brand Primary', 'torchbearers' ),
		'slug'  => 'brand-primary',
		'color'	=> '#a31f34',
	),
	array(
		'name'  => __( 'Brand Primary Light', 'torchbearers' ),
		'slug'  => 'brand-primary-light',
		'color' => '#c96f70',
	),
	array(
		'name'  => __( 'Brand Primary Dark', 'torchbearers' ),
		'slug'  => 'brand-primary-dark',
		'color' => '#80001c',
	),
	array(
		'name'  => __( 'Brand Secondary', 'torchbearers' ),
		'slug'  => 'brand-secondary',
		'color' => '#ff8300',
    ),
	array(
		'name'  => __( 'Brand Secondary Light', 'torchbearers' ),
		'slug'  => 'brand-secondary-light',
		'color' => '#ffad61',
    ),
	array(
		'name'  => __( 'Brand Secondary Dark', 'torchbearers' ),
		'slug'  => 'brand-secondary-dark',
		'color' => '#e06423',
    ),
	array(
		'name'  => __( 'Brand Tertiary', 'torchbearers' ),
		'slug'  => 'brand-tertiary',
		'color' => '#fceac1',
    ),
	array(
		'name'  => __( 'Brand Tertiary Light', 'torchbearers' ),
		'slug'  => 'brand-tertiary-light',
		'color' => '#fef4e0',
    ),
	array(
		'name'  => __( 'Brand Tertiary Dark', 'torchbearers' ),
		'slug'  => 'brand-tertiary-dark',
		'color' => '#f8e0a4',
    ),
	array(
		'name'  => __( 'Brand Gray', 'torchbearers' ),
		'slug'  => 'brand-gray',
		'color' => '#8a8b8c',
    ),
	array(
		'name'  => __( 'Brand Gray Light', 'torchbearers' ),
		'slug'  => 'brand-gray-light',
		'color' => '#afb0b0',
    ),
	array(
		'name'  => __( 'Brand Gray Dark', 'torchbearers' ),
		'slug'  => 'brand-gray-dark',
		'color' => '#666868',
    ),
	array(
		'name'  => __( 'Brand White', 'torchbearers' ),
		'slug'  => 'brand-white',
		'color' => '#ffffff',
    ),
) );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function torchbearers_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'torchbearers_content_width', 640 );
}
add_action( 'after_setup_theme', 'torchbearers_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function torchbearers_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'torchbearers' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'torchbearers' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'torchbearers_widgets_init' );

function register_widget_areas() {

	register_sidebar( array(
	  'name'          => 'Footer Widget Left',
	  'id'            => 'footer_widget_1',
	  'description'   => 'This widget is for the footer in the left-most column',
	  'before_widget' => '<section class="footer-widget left">',
	  'after_widget'  => '</section>',
	  'before_title'  => '<h4>',
	  'after_title'   => '</h4>',
	));

	register_sidebar( array(
		'name'          => 'Footer Widget Middle',
		'id'            => 'footer_widget_2',
		'description'   => 'This widget is for the footer in the middle column',
		'before_widget' => '<section class="footer-widget middle">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	  ));

	  register_sidebar( array(
		'name'          => 'Footer Widget Right',
		'id'            => 'footer_widget_3',
		'description'   => 'This widget is for the footer in the right-most column',
		'before_widget' => '<section class="footer-widget right">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	  ));
  }
  
  add_action( 'widgets_init', 'register_widget_areas' );

/**
 * Enqueue scripts and styles.
 */
function torchbearers_scripts() {
	// Check to see if the file exists.
	$deps_file = plugin_dir_path(__FILE__) . 'build/index.asset.php';

	// Set default fallback to dependencies array
	$deps = [];
	$version   = _S_VERSION;

	// If the file can be found, use it to set the dependencies array.
	if ( file_exists( $deps_file ) ) {
		$deps_file = require( $deps_file );
		$deps      = $file['dependencies'];
		$version   = $file['version'];
	}

	wp_enqueue_style( 'torchbearers-style', get_template_directory_uri() . '/build/index.css', array(), $version );

	wp_enqueue_script( 'torchbearers-index', get_template_directory_uri() . '/build/index.js', $deps, $version, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'torchbearers_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

