<?php
namespace HBSC\Taxonomies;

/**
 * Set up taxonomies.
 *
 * @return void
 */
function setup() {
	$n = function ( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'init', $n( 'register_event_type' ) );

}

/**
 * Register the event-type taxonomy and assign it to events.
 *
 * See https://github.com/johnbillion/extended-taxos for more info on using the extended-taxos library
 */
function register_event_type() {
	register_extended_taxonomy( 'event-type', 'event' );
}
