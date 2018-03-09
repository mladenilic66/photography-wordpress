<?php
/**
 * photo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package photo
 */

if ( ! function_exists( 'photo_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function photo_setup() {

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
		register_nav_menus( [
		    'header-menu' => esc_html__( 'Main Top Location' , 'photo-header-nav'),
		    'footer-menu' => esc_html__( 'Footer Location' , 'photo-footer-nav' )
        ] );

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

		// custom image sizes.
		add_image_size( 'project-main', 292 ); // 292 pixels wide (and unlimited height)
		add_image_size( 'project-thumbnail', 400, 270, true );
		

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'photo_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'photo_setup' );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function photo_widgets_init() {
	register_sidebar([
		'name'          => esc_html__( 'Sidebar', 'photo' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'photo' ),
		'before_widget' => '<div class="sidebar-wrap">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	]);
}
add_action( 'widgets_init', 'photo_widgets_init' );



/**
 * Enqueue scripts.
 */
function photo_scripts() {

	wp_enqueue_script( 'fontawesome', get_template_directory_uri() . '/assets/js/fontawesome-all.min.js', array(), 5.0, true );
	wp_enqueue_script( 'main',        get_template_directory_uri() . '/assets/js/main.js', 'jquery', 1.0, true );
	wp_enqueue_script( 'masonri',     get_template_directory_uri() . '/assets/js/jquery.masonry.min.js', 'jquey', 2.1, true );
	wp_enqueue_script( 'history',     get_template_directory_uri() . '/assets/js/jquery.history.js', 'jquery', 1.0, true );
	wp_enqueue_script( 'js-url',      get_template_directory_uri() . '/assets/js/js-url.min.js', array(), 1.7, true );
	wp_enqueue_script( 'gamma',       get_template_directory_uri() . '/assets/js/gamma.js', 'jquery', 1.0, true );
	wp_enqueue_script( 'aos',         get_template_directory_uri() . '/assets/js/aos.js', 'jquery', false );
	wp_enqueue_script( 'modernizr',   get_template_directory_uri() . '/assets/js/modernizr.custom.70736.js', array(), 2.6, false );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'photo_scripts' );


/**
 * Enqueue styles.
 */
function photo_styles() {

	wp_enqueue_style( 'style',     get_stylesheet_uri() );
	wp_enqueue_style( 'main-css',  get_template_directory_uri() . '/assets/css/style.css' );
	wp_enqueue_style( 'gamma-css', get_template_directory_uri() . '/assets/css/gamma.css' );
	wp_enqueue_style( 'aos-css',   get_template_directory_uri() . '/assets/css/aos.css' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'photo_styles' );



/**
 * Inject Font Awesome <i> tag before each widget category link
 *
 * @param string $output
 * @return string $output
 */

function custom_wp_list_categories( $output ) {  
    remove_filter( current_filter(), __FUNCTION__ ); 
    return str_ireplace( '</a>', '<i class="far fa-file fa-sm"></i></a>', $output);
}

add_action( 'widgets_init', function() {
    add_filter( 'wp_list_categories', 'custom_wp_list_categories' );
});


/**
 * add acf theme options page.
 */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

/**
 * sync wordpress version to jquery migrate lib.
 */
add_action( 'wp_default_scripts', function( $scripts ) {
    if ( ! empty( $scripts->registered['jquery'] ) ) {
        $scripts->registered['jquery']->deps = array_diff( $scripts->registered['jquery']->deps, array( 'jquery-migrate' ) );
    }
});


/**
 * all included files.
 */
require get_template_directory() . '/inc/post_types.php';
require get_template_directory() . '/inc/customizer.php';