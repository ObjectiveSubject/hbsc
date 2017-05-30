<?php
namespace HBSC\Shortcodes;

/**
 * Set up shortcodes
 *
 * @return void
 */
function setup() {
	$n = function ( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_shortcode( 'section-title', $n( 'section_title_func' ) );
}

/**
 * Create a section title
 *
 * Example: [section-title]Title[/section-title]
 *
 * @param $attributes array List of attributes from the given shortcode
 * @param $content mixed The content of the section
 *
 * @return mixed HTML output for the shortcode
 */
function section_title_func( $attributes, $content = null ) {
	$content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content );
	$html = '<div class="section-title u-mt-4">' . do_shortcode( shortcode_unautop( trim( $content ) ) ) . '</div>';
	return $html;
}
