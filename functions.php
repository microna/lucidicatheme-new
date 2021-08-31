<?php
/**
 * lucidicatheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lucidicatheme
 */


 require get_template_directory() . '/inc/class-tgm-plugin-activation.php';
 require get_template_directory() . '/inc/redux-options.php';
 require get_template_directory() . '/plugins/lucidicatheme-core/lucidicatheme-core.php';





 /**
  * This file represents an example of the code that themes would use to register
  * the required plugins.
  *
  * It is expected that theme authors would copy and paste this code into their
  * functions.php file, and amend to suit.
  *
  * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
  *
  * @package    TGM-Plugin-Activation
  * @subpackage Example
  * @version    2.6.1 for parent theme Lucidicatheme for publication on ThemeForest
  * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
  * @copyright  Copyright (c) 2011, Thomas Griffin
  * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
  * @link       https://github.com/TGMPA/TGM-Plugin-Activation
  */
 
 /**
  * Include the TGM_Plugin_Activation class.
  *
  * Depending on your implementation, you may want to change the include call:
  *
  * Parent Theme:
  * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
  *
  * Child Theme:
  * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
  *
  * Plugin:
  * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
  */
 require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
 
 add_action( 'tgmpa_register', 'lucidicatheme_register_required_plugins' );
 
 /**
  * Register the required plugins for this theme.
  *
  * In this example, we register five plugins:
  * - one included with the TGMPA library
  * - two from an external source, one from an arbitrary source, one from a GitHub repository
  * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
  *
  * The variables passed to the `tgmpa()` function should be:
  * - an array of plugin arrays;
  * - optionally a configuration array.
  * If you are not changing anything in the configuration array, you can remove the array and remove the
  * variable from the function call: `tgmpa( $plugins );`.
  * In that case, the TGMPA default settings will be used.
  *
  * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
  */
 function lucidicatheme_register_required_plugins() {
	 /*
	  * Array of plugin arrays. Required keys are name and slug.
	  * If the source is NOT from the .org repo, then source is also required.
	  */
	 $plugins = array(
 
		 // This is an example of how to include a plugin bundled with a theme.
		 array(
			 'name'               => 'TGM Example Plugin', // The plugin name.
			 'slug'               => 'tgm-example-plugin', // The plugin slug (typically the folder name).
			 'source'             => get_template_directory() . '/plugins/lucidicatheme-core.zip	', // The plugin source.
			 'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			 'version'            => '1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			 'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			 'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
		 ),
 

 
		 // This is an example of how to include a plugin from the WordPress Plugin Repository.
		 array(
			 'name'      => 'Advanced Custom Fields',
			 'slug'      => 'advanced-custom-fields',
			 'required'  => true,
		 ),
		 array(
			 'name'      => 'Gutenberg Template Library & Redux Framework',
			 'slug'      => 'redux-framework',
			 'required'  => true,
		 ),
 
 
	 );
 
	 /*
	  * Array of configuration settings. Amend each line as needed.
	  *
	  * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	  * strings available, please help us make TGMPA even better by giving us access to these translations or by
	  * sending in a pull-request with .po file(s) with the translations.
	  *
	  * Only uncomment the strings in the config array if you want to customize the strings.
	  */
	 $config = array(
		 'id'           => 'lucidicatheme',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		 'default_path' => '',                      // Default absolute path to bundled plugins.
		 'menu'         => 'tgmpa-install-plugins', // Menu slug.
		 'has_notices'  => true,                    // Show admin notices or not.
		 'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		 'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		 'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		 'message'      => '',                      // Message to output right before the plugins table.
	 );
 
	 tgmpa( $plugins, $config );
 }
 

function lucidicatheme_paginate($query){

	$big = 999999999999999;


	$paged = '';
	$page = '';
	if(is_singular()){
		$page = get_query_var('page');
 	} else {
	    $paged = get_query_var('paged');	 
	 }

	echo paginate_links( [
		'base'    => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
			'current' => max( 1, $paged),
			'total'   => $query->max_num_pages,
			'prev_next' => false,
] );
}

function lucidicatheme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'lucidicatheme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'lucidicatheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Car pages Sidebar', 'lucidicatheme' ),
			'id'            => 'car-sidebar',
			'description'   => esc_html__( 'This is a car pages sidebar .', 'lucidicatheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'lucidicatheme_widgets_init' );

function lucidicatheme_enqueue_scripts(){

	wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;500;700&display=swap', false ); 

	// wp_enqueue_script( 'bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), true); 

	// wp_enqueue_style( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );

	wp_enqueue_style('lucidicatheme-main', get_template_directory_uri(). '/assets/css/main.css', array(), '1.0', 'all');

	wp_enqueue_style('lucidicatheme-general', get_template_directory_uri(). '/assets/css/general.css', array(), '1.0', 'all');
	
	wp_enqueue_script( 'lucidicatheme-script', get_template_directory_uri(). '/assets/js/script.js', array('jquery'), '1.0', true);

	wp_enqueue_script( 'lucidicatheme-ajax', get_template_directory_uri(). '/assets/js/ajax.js', array('jquery'), '1.0', true);

	wp_localize_script('lucidicatheme-ajax', 
					   'lucidicatheme_ajax_script',
						array(
							'ajaxurl' => admin_url('admin-ajax.php'),
							'nonce' => wp_create_nonce('ajax-nonce'),
							'string_old' => esc_html__('Hello', 'lucidicatheme'),
							'string_new' => esc_html__('Hello world', 'lucidicatheme'),
				)
			);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
}

add_action('wp_enqueue_scripts', 'lucidicatheme_enqueue_scripts');


function lucidicatheme_ajax_example(){
	if(!wp_verify_nonce($_REQUEST['nonce'], 'ajax-nonce')){
		die;
	}
	if(isset($_REQUEST['string_one'])){
		echo $_REQUEST['string_one'];
	}

	echo "<br>";

	if(isset($_REQUEST['string_two'])){
		echo $_REQUEST['string_two'];
	}

	$cars = new WP_Query(array('post_type' => 'car', 'post_per_page' => -1));

	if($cars->have_posts(  )) : while($cars->have_posts( )) :$cars->the_post();
	get_template_part('partials/content', 'car'); 
   
    endwhile;
    endif;

	wp_reset_postdata();

	die;
}

add_action('wp_ajax_lucidicatheme_ajax_example', 'lucidicatheme_ajax_example');
add_action('wp_ajax_nopriv_lucidicatheme_ajax_example', 'lucidicatheme_ajax_example');

function lucidicatheme_custom_search($form){
	$form = "html for form";
	return $form;
}


add_filter( 'get_search_form', 'lucidicatheme_custom_search' );

// function lucidicatheme_body_class($classes){

// 	if(is_front_page()){
// 		$classes[] = 'main_class';
// 	} else if(is_singular()){
// 		$classes[] = 'extra_class';
// 	}
	
// 	return $classes;
// }

// add_filter( 'body_class', 'lucidicatheme_body_class');

function lucidicatheme_theme_init(){
	// support nav menu
	register_nav_menus(array(
		'top-menu' => 'Top menu Location',
		'mobile-menu' => 'Mobile menu Location',
	));

	//support html5
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'menus',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );

	load_theme_textdomain('lucidicatheme', get_template_directory() . '/lang');

	//tumb support
	add_theme_support( 'post-thumbnails' );
	add_image_size('car-cover', 240, 188);

	// update_option('thumbnails_size_w', 170);
	// update_options('thumbnail_size_h', 170);
	// update_options('thumbnail_crop', 1);

	add_theme_support( 'post-formats', array(
		'video',
		'code',
		'image',
		'gallery'
		));
		add_post_type_support( 'car', 'post-formats');
}

add_action('after_setup_theme', 'lucidicatheme_theme_init', 0);




function lucidicatheme_rewrite_rules(){
	lucidicatheme_register_post_type();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'lucidicatheme_rewrite_rules' );





if ( ! function_exists( 'lucidicatheme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function lucidicatheme_setup() {
	

		// Add default posts and comments RSS feed links to head.
		

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */


		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
	

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'lucidicatheme_custom_background_args',
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
add_action( 'after_setup_theme', 'lucidicatheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lucidicatheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lucidicatheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'lucidicatheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */






/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

