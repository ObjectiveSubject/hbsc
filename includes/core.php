<?php
namespace HBSC\Core;

/**
 * Set up theme defaults and register supported WordPress features.
 *
 * @return void
 */
function setup() {
	$n = function ( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'wp_enqueue_scripts', $n( 'scripts' ) );
	add_action( 'wp_enqueue_scripts', $n( 'styles' ) );
	add_action( 'after_setup_theme', $n( 'features' ) );
	add_action( 'pre_get_posts', $n( 'modify_queries' ) );
	add_action( 'init', $n( 'add_menus' ) );

	// Remove WordPress header cruft
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'index_rel_link' );
	remove_action( 'wp_head', 'wp_generator' );
}

/**
 * Add feature support to theme
 */
function features() {
	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	add_post_type_support( 'page', 'excerpt' );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
}

/**
 * Enqueue scripts for front-end.
 *
 * @param bool $debug Whether to enable loading uncompressed/debugging assets. Default false.
 *
 * @return void
 */
function scripts( $debug = false ) {
	$min = ( $debug || defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_script(
		'main',
		HBSC_TEMPLATE_URL . "/assets/js/main{$min}.js",
		array('jquery'),
		HBSC_VERSION,
		true
	);

	wp_enqueue_script(
		'lodash',
		"//cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.4/lodash.min.js",
		array('jquery'),
		false
	);
}

/**
 * Enqueue styles for front-end.
 *
 * @param bool $debug Whether to enable loading uncompressed/debugging assets. Default false.
 *
 * @return void
 */
function styles( $debug = false ) {
	$min = ( $debug || defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_style(
		'style',
		HBSC_URL . "/assets/css/style{$min}.css",
		array(),
		HBSC_VERSION
	);

	wp_enqueue_style(
		'zabuto_calendar',
		HBSC_URL . "/assets/css/vendor/zabuto_calendar.css",
		array(),
		HBSC_VERSION
	);	
    
    wp_enqueue_style(
        'miller-font',
        "//cloud.typenetwork.com/projects/1467/fontface.css/",
		array(),
		false
    );		

	wp_enqueue_style(
		'font-awesome',
		'//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css',
		array(),
		false
	);

	/*wp_enqueue_style(
		'bootstrap',
		'//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css',
		array(),
		false
	);*/
}

/**
 * Modify default queries in specific areas of the site
 *
 * @param $query
 */
function modify_queries( $query ) {

   	if ( ! is_admin() && $query->is_main_query() ) {

		if ( is_tax( 'role' ) ) {
			$query->set( 'posts_per_page', 100 );
		}

	}

	global $pagenow;

	// Board page only visible to certain users
	if ( 
		is_admin() 
		&& 'edit.php' == $pagenow 
		&& ( get_query_var('post_type') && 'page' == get_query_var('post_type') ) 
		&& ! in_array( get_current_user_id(), array( 5, 8, 13 ) ) // only allow access to ids (Jessica, Katherine, Maria)
		|| ! is_admin() && $query->is_search // hide from public searches
	) {
		$query->set( 'post__not_in', array( 807 ) ); // Board page (id: 807)
	}

	return $query;

}

/**
 * Add Menus
 *
 * @param $query
 */
function add_menus() {
	register_nav_menus(
		array(
			'header' => 'Header',
			'footer' => 'Footer',
		)
	);
}
