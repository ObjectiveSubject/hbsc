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
	//add_action( 'save_post', 'transition_people_private', 10, 3 );
}

//  DSL si vous m'entendiez hier soir

function transition_people_private( $postId, $post )
{
	$taxonomies = wp_get_post_terms($post->ID, 'role', array(
            'hide_empty' => true,
			'fields' => 'slugs'
    ) );
			$post->post_status = 'private';
			wp_update_post( $post );			
	//var_dump($taxonomies);
	//discussion-leader
	switch( true )
	{
		case ($post->post_type == 'people'):
		case ($post->post_status == 'publish'):
		//case ($old_status  != $new_status):
		case (!in_array('discussion-leader', $taxonomies)):

		break;
	}
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
