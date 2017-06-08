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
	add_shortcode( 'figure', $n( 'figure_func' ) );
	add_shortcode( 'button', $n( 'button_func' ) );
	add_shortcode( 'row', $n( 'row_func' ) );
	add_shortcode( 'column', $n( 'column_func' ) );
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
	$html = '<div class="module-title u-mt-4">' . do_shortcode( shortcode_unautop( trim( $content ) ) ) . '</div>';
	return $html;
}

/**
 * Create a figure element
 *
 * Example: [figure caption=""]Title[/figure]
 *
 * @param $attributes array List of attributes from the given shortcode
 * @param $content mixed The content of the section
 *
 * @return mixed HTML output for the shortcode
 */
function figure_func( $attributes, $content = null ) {
	$content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content );
    $data = shortcode_atts( array(
		'caption' => '',
	), $attributes );
	$html = '<figure>' .
            '<figcaption>' . $data['caption'] . '</figcaption>' .
            do_shortcode( shortcode_unautop( trim( $content ) ) ) .
            '</figure>';
	return $html;
}

/**
 * Create a button
 *
 * Example: [button link="" color=""]Button[/button]
 *
 * @param $attributes array List of attributes from the given shortcode
 * @param $content mixed The content of the section
 *
 * @return mixed HTML output for the shortcode
 */
function button_func( $attributes, $content = null ) {
	$content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content );
    $data = shortcode_atts( array(
		'link' => '',
		'color' => '',
	), $attributes );
    $color = $data['color'];
	if ( $color ) {
        if ( $color == "red" ) {
            $button_color = "button--red";
        } elseif ( $color == "dark-gray" ) {
            $button_color = "button--dark-gray";
        } elseif ( $color == "tan" ) {
            $button_color = "button--tan";
        } else {
            $button_color = '';
        }
	}
	$html = '<a href="' . $data['link'] . '" class="button ' . $button_color . '">' .
            do_shortcode( shortcode_unautop( trim( $content ) ) ) .
            '</a>';
	return $html;
}

/**
 * Create a row
 *
 * Example: [row]Content[/row]
 *
 * @param $attributes array List of attributes from the given shortcode
 * @param $content mixed The content of the section
 *
 * @return mixed HTML output for the shortcode
 */
function row_func( $attributes, $content = null ) {
	$content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content );
	$html = '<div class="module-row u-mt-2">' . do_shortcode( shortcode_unautop( trim( $content ) ) ) . '</div>';
	return $html;
}

/**
 * Create a column
 *
 * Example: [column]Content[/column]
 *
 * @param $attributes array List of attributes from the given shortcode
 * @param $content mixed The content of the section
 *
 * @return mixed HTML output for the shortcode
 */
function column_func( $attributes, $content = null ) {
	$html = '<div class="module-column">' . do_shortcode( shortcode_unautop( trim( $content ) ) ) . '</div>';
	return $html;
}
