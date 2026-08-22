<?php
/**
 * Yosemite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Yosemite
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function yosemite_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on yosemite, use a find and replace
	 * to change 'yosemite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'yosemite-lite', get_template_directory() . '/languages' );

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
	add_image_size( 'yosemite-recent', 90, 90, true );
	add_image_size( 'yosemite-first-post', 770, 513, true );
	add_image_size( 'yosemite-featured', 1170, 540, true );
	set_post_thumbnail_size( 370, 247, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Header', 'yosemite-lite' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'yosemite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add support for custom logo.
	add_theme_support( 'custom-logo' );

	// Post format.
	add_theme_support( 'post-formats',
		array(
			'video',
			'audio',
			'quote',
			'gallery',
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'yosemite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function yosemite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'yosemite_content_width', 770 );
}
add_action( 'after_setup_theme', 'yosemite_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function yosemite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'yosemite-lite' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'yosemite-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'yosemite-lite' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'yosemite-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	require_once get_template_directory() . '/inc/widgets/class-yosemite-recent-posts-widget.php';
	register_widget( 'Yosemite_Recent_Posts_Widget' );
}
add_action( 'widgets_init', 'yosemite_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function yosemite_scripts() {
	wp_enqueue_style( 'yosemite-fonts', yosemite_fonts_url() );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', '', '4.5.0' );
	wp_enqueue_style( 'yosemite-style', get_stylesheet_uri() );

	wp_enqueue_script( 'yosemite-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'yosemite-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/js/slick.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/js/theia-sticky-sidebar.js', array( 'jquery' ), '1.5.0', true );

	wp_enqueue_script( 'yosemite-script', get_template_directory_uri() . '/js/script.js', array(
		'slick-js',
		'theia-sticky-sidebar',
	), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'yosemite_scripts' );

/**
 * Get Google fonts URL for the theme.
 *
 * @return string Google fonts URL for the theme.
 */
function yosemite_fonts_url() {
	$fonts   = array();
	$subsets = 'latin,latin-ext';

	if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'yosemite-lite' ) ) {
		$fonts[] = 'Roboto';
	}

	$fonts_url = add_query_arg( array(
		'family' => rawurlencode( implode( '|', $fonts ) ),
		'subset' => rawurlencode( $subsets ),
	), 'https://fonts.googleapis.com/css' );

	return $fonts_url;
}

/**
 * Add editor style.
 */
function yosemite_add_editor_styles() {
	add_editor_style( array(
		'css/editor-style.css',
		yosemite_fonts_url(),
		get_template_directory_uri() . '/css/font-awesome.css',
	) );
}
add_action( 'init', 'yosemite_add_editor_styles' );


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

/**
 * Load dashboard
 */
require get_template_directory() . '/inc/dashboard/class-yosemite-lite-dashboard.php';
$dashboard = new Yosemite_Lite_Dashboard();

require get_template_directory() . '/inc/customizer-pro/class-yosemite-lite-customizer-pro.php';
$customizer_pro = new Yosemite_Lite_Customizer_Pro();
$customizer_pro->init();

/**
 * Customize search
 */
function filter_search($query) {
    //---- Don't run in admin area
    if( !is_admin() ) {
        // Limit search to posts
        if($query->is_main_query() && $query->is_search() ) {
            $query->set('post_type', array('post') );
        }

        return $query;
    }
}

add_filter('pre_get_posts', 'filter_search');

function replace_core_jquery_version() {
    wp_deregister_script( 'jquery' );
    // Change the URL if you want to load a local copy of jQuery from your own server.
    wp_register_script( 'jquery', "https://code.jquery.com/jquery-3.3.1.min.js", array(), '3.3.1' );
}

add_action('wp_enqueue_scripts', 'replace_core_jquery_version');

function tn_dequeue_google_fonts_style() {
      wp_dequeue_style( 'yosemite-fonts' );
}

add_action('wp_print_styles', 'tn_dequeue_google_fonts_style', 100);

function the_author_avatar(int $id, int $width = 48, string $shape = 'round') {
	$avatar = get_avatar_url($id);

	echo "<img class='{$shape}' width='{$width}' src='{$avatar}'/>";
}

function the_content_thumbnail(string $thumbnail, bool $isMobile) {		
	$response = '<div class="entry-image">';
	$response .= "<img class='thumbnail animated slideInLeft' src='{$thumbnail}'/>";
	$response .= '<div class="wp-block-image"><figcaption>';
	$response .= get_the_post_thumbnail_caption();
	$response .= '</figcaption></div>';
	$response .= '</div>';

	echo $response; 
}

function the_content_posted_on() {

	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if (get_the_time('U') !== get_the_modified_time('U')) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr(get_the_date( 'c' )),
		esc_html(get_the_date()),
		esc_attr(get_the_modified_date( 'c' )),
		esc_html(get_the_modified_date())
	);

	echo '<span class="posted-on"><i class="fa fa-clock-o"></i>' . $time_string . '</span>'; // WPCS: XSS OK.
}