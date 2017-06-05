<?php
namespace HBSC\PostTypes;

/**
 * Set up post types
 *
 * @return void
 */
function setup() {
	$n = function ( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'init', $n( 'register_event' ) );
	add_action( 'init', $n( 'register_people' ) );

}

/**
 * Register the 'event' post type
 *
 * See https://github.com/johnbillion/extended-cpts for more information
 * on registering post types with the extended-cpts library.
 */
function register_event() {
	register_extended_post_type( 'event', array(
        'menu_icon'   => 'dashicons-calendar-alt',
        'supports'    => array( 'title', 'editor', 'thumbnail' ),
        //'has_archive' => true,
        'public'      => true,
        'dashboard_glance' => false,
		'admin_cols' => array(
			'event-type' => array(
				'taxonomy' => 'event-type'
			),
		),
    ) );
}

/**
 * Register the 'people' post type
 */
function register_people() {
	register_extended_post_type( 'people', array(
		'menu_icon' => 'dashicons-groups',
		'supports' => array('title', 'editor', 'thumbnail'),
		'has_archive' => false,
	), array(
		# Override the base names used for labels:
		'singular' => 'Person',
		'plural'   => 'People',
		'slug'     => 'people'
	) );
}
