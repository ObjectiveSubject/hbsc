<?php
namespace HBSC\Taxonomies;

/**
 * Set up taxonomies.
 *
 * See https://github.com/johnbillion/extended-taxos for more info on using the extended-taxos library
 *
 * @return void
 */
function setup() {
	$n = function ( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'init', $n( 'register_event_type' ) );
	add_action( 'init', $n( 'register_role' ) );
	add_action( 'init', $n( 'register_participant' ) );

}

/**
 * Register the 'event-type' taxonomy and assign it to events.
 */
function register_event_type() {
	register_extended_taxonomy( 'event-type', 'event' );
}

/**
 * Register the 'role' taxonomy and assign it to people.
 */
function register_role() {
	register_extended_taxonomy( 'role', 'people' );
}

/**
 * Register the 'role' taxonomy and assign it to people.
 */
function register_participant() {
	register_extended_taxonomy( 'participant-type', array( 'participant', 'student_participant' ) );
}