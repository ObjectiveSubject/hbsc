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
	add_action( 'init', $n( 'register_literary_participants' ) );
	add_action( 'init', $n( 'register_student_participants' ) );

	//add_filter('people_post_type_link', $n( 'people_post_type_link' ), 1, 3);	
}

/**
 * Register the 'event' post type
 *
 * See https://github.com/johnbillion/extended-cpts for more information
 * on registering post types with the extended-cpts library.
 */
function register_event() {
	global $wp_rewrite;
	register_extended_post_type( 'event', array(
        'menu_icon'   => 'dashicons-calendar-alt',
        'supports'    => array( 'title', 'editor', 'thumbnail', 'comments' ),
        'has_archive' => false,
        'public'      => true,
        'dashboard_glance' => false,
		'rewrite' => false,		
		'admin_cols' => array(
			'event-type' => array(
				'taxonomy' => 'event-type'
			),
		),
    ) );

	add_rewrite_rule('^programs-learning/salons-at-stowe/(.*)/?$', 'index.php?event=$matches[1]', 'top');
	$wp_rewrite->add_rewrite_tag("%event%", '[^/]+', "event=");
	$wp_rewrite->add_permastruct('event', 'programs-learning/salons-at-stowe/%event%', false);
}

function people_post_type_link( $link, $post = 0 ){
	file_put_contents('link.txt', $link);
	return str_replace('%postname%', $post->slug, $link);
}

/**
 * Register the 'people' post type
 */
function register_people() {
	global $wp_rewrite;

	register_extended_post_type( 'people', array(
		'menu_icon' => 'dashicons-groups',
		'supports' => array('title', 'editor', 'thumbnail'),
		'has_archive' => false,		
		'rewrite' => false,
        'hierarchical' => false,
	), array(
		# Override the base names used for labels:
		'singular' => 'Person',
		'plural'   => 'People',
		'slug'     => 'people'
	) );
	
	add_rewrite_rule('^about/staff-board/(.*)/?$', 'index.php?people=$matches[1]', 'top');
	$wp_rewrite->add_rewrite_tag("%people%", '[^/]+', "people=");
	$wp_rewrite->add_permastruct('people', 'about/staff-board/%people%', false);
}

/**
 * Register literary participants
 */
function register_literary_participants() {
	global $wp_rewrite;

	// Literary 

	register_extended_post_type( 'participant', array(
		'menu_icon' => 'dashicons-businessman',
		'supports' => array('title', 'editor', 'thumbnail'),
		'has_archive' => false,
		'rewrite' => false,
		'admin_cols' => array(
			'entry-status' => array(
				'title' => 'Entry Status',
				'meta_key' => 'participant_entry_type'
			),
			'participant-type' => array(
				'taxonomy' => 'participant-type'
			),
		)		
	), array(
		# Override the base names used for labels:
		'singular' => 'Literary Participant',
		'plural'   => 'Literary Participants',
		'slug'     => 'literary-participant'
	) );

	add_rewrite_rule('^stowe-prize/literary-prize/(.*)/?$', 'index.php?participant=$matches[1]', 'top');
	$wp_rewrite->add_rewrite_tag("%participant%", '[^/]+', "participant=");
	$wp_rewrite->add_permastruct('participant', 'stowe-prize/literary-prize/%participant%', false);
	
}



/**
 * Register student participants
 */
 function register_student_participants() {
	global $wp_rewrite;

	// Students

	register_extended_post_type( 'student_participant', array(
		'menu_icon' => 'dashicons-welcome-learn-more',
		'supports' => array('title', 'editor', 'thumbnail'),
		'has_archive' => false,
		'rewrite' => false,
		'admin_cols' => array(
			'entry-status' => array(
				'title' => 'Entry Status',
				'meta_key' => 'participant_entry_type'
			),
			'participant-type' => array(
				'taxonomy' => 'participant-type'
			),
		)		
	), array(
		# Override the base names used for labels:
		'singular' => 'Student Participant',
		'plural'   => 'Student Participants',
		'slug'     => 'student-participant'
	) );

	add_rewrite_rule('^stowe-prize/student-stowe-prize/(.*)/?$', 'index.php?student_participant=$matches[1]', 'top');
	$wp_rewrite->add_rewrite_tag("%student_participant%", '[^/]+', "student_participant=");
	$wp_rewrite->add_permastruct('student_participant', 'stowe-prize/student-stowe-prize/%student_participant%', false);

}