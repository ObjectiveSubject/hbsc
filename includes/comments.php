<?php
namespace HBSC\Comments;

/**
 * Set up comments (mainly removing them)
 *
 * @return void
 */
function setup() {
	$n = function ( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'admin_init', $n( 'add_post_support' ) );
	add_action( 'admin_init', $n( 'remove_post_support' ) );
	//add_filter( 'wp_insert_post_data', $n( 'default_comments_on' ) );
}

function getCommentsPostTypes()
{
	return array(
		'event'
	);
}

function default_comments_on( $data )
{
	$CommentsPostTypes = getCommentsPostTypes();

    if( in_array( $data['post_type'], $CommentsPostTypes ) )
	{
        $data['comment_status'] = 'open';
    }

    return $data;
}

function add_post_support()
{
	$CommentsPostTypes = getCommentsPostTypes();

	foreach( $CommentsPostTypes	as $type )
	{
		add_post_type_support( $type, 'comments' );
		add_post_type_support( $type, 'trackbacks' );
	}
}

/**
 * Remove items from the admin sidebar menu
 */
function remove_comments_menu() {
	remove_menu_page( 'edit-comments.php' );
}

/**
 * Redirect people who visit edit-comments.php directly
 */
function disable_comments_admin_menu_redirect() {
	global $pagenow;

	if ( $pagenow === 'edit-comments.php' ) {
		wp_redirect( admin_url() );
		exit;
	}
}

function remove_post_support()
{
	remove_post_type_support( 'post', 'comments' );
	remove_post_type_support( 'post', 'trackbacks' );	
}

/**
 * Remove comments/trackback support from posts
 *//*
function 	() {
	remove_post_type_support( 'post', 'comments' );
	remove_post_type_support( 'post', 'trackbacks' );
}*/

/**
 * Remove comments from the admin bar
 */
function remove_admin_bar_comments() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'comments' );
}
