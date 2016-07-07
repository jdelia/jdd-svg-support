<?php
namespace JDD_SVG_Support;
/**
 * JDD SVG Support

 * @package           JDD_SVG_Support
 * @author            Jackie D'Elia
 * @license           GPL-2.0+
 * @link              https://jackiedelia.com
 * @copyright         2016 Jackie D'Elia
 *
 * Plugin Name:       JDD SVG Support
 * Plugin URI:        https://github.com/jdelia/jdd-svg-support
 * Description:       Adds ability to embed SVG into pages.
 * Version:           0.90
 * Author:            Jackie D'Elia
 * Author URI:        https://jackiedelia.com
 * Text Domain:       jdd-svg-support
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * GitHub Plugin URI: https://github.com/jdelia/jdd-svg-support
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}


// adds inline-svg shortcode and then
// outputs the file located in the child theme image folder

function svg_inline_shortcode( $atts ) {

	$defaults = array(
		'file' => '',
		'class' => 'class="inline-svg"',
		'path' => get_stylesheet_directory() . '/images/',
	);
  	
  	// if class provided - get it formatted for html output 
	if ( ! empty( $atts['class'] ) ) {
		$atts['class'] = 'class = "' . $atts['class'] . '"';
	}

	$merge_attributes = shortcode_atts( $defaults, $atts, 'insert-svg-code' );

	return svg_shortcode_html_output( $merge_attributes['file'], $merge_attributes['class'], $merge_attributes['path'] );

}
add_shortcode( 'insert-svg-code', __NAMESPACE__ .'\\svg_inline_shortcode', 10, 3 );


function svg_shortcode_html_output( $name, $classes, $path ) {

	$filename = $path . $name . '.svg';
	ob_start();
	if ( file_exists( $filename ) ) {
		echo '<div ' . $classes . '>' .  file_get_contents( $filename ) .  '</div>';
	} else {
		echo 'SVG file not found: ' . $filename;
	}
	return ob_get_clean();
}


?>
