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
	add_action( 'init', $n( 'register_salon' ) );

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
    ), array(
        'singular' => __( 'Event' , 'hbsc' ),
        'plural'   => __( 'Events' , 'hbsc' )
    ) );
}

/**
 * Register the 'salon' post type
 *
 * See https://github.com/johnbillion/extended-cpts for more information
 * on registering post types with the extended-cpts library.
 */
function register_salon() {
	register_extended_post_type( 'salon', array(
        'menu_icon'   => 'dashicons-format-chat',
        'supports'    => array( 'title', 'editor', 'thumbnail' ),
        //'has_archive' => false,
        'public'      => true,
        'dashboard_glance' => false,
    ), array(
        'singular' => __( 'Salon' , 'hbsc' ),
        'plural'   => __( 'Salons' , 'hbsc' )
    ) );
}
