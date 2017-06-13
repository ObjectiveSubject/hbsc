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
	//add_action( 'init', $n( 'register_participant' ) );
	//add_action( 'save_post', 'transition_people_private', 10, 3 );
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
		'has_archive' => false
	), array(
		# Override the base names used for labels:
		'singular' => 'Person',
		'plural'   => 'People',
		'slug'     => 'people'
	) );
}

/**
 * Register the 'participant' post type
 */
function register_participant() {
	register_extended_post_type( 'participant', array(
		'menu_icon' => 'dashicons-groups',
		'supports' => array('title', 'editor', 'thumbnail'),
		'has_archive' => false
	), array(
		# Override the base names used for labels:
		'singular' => 'Participant',
		'plural'   => 'Participants',
		'slug'     => 'participants'
	) );
}