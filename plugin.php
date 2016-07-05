<?php
/**
 * JDD SVG Support

 * @package           JDD_SVG_Support
 * @author            Jackie D'Elia
 * @license           GPL-2.0+
 * @link              https://jackiedelia.com
 * @copyright         2016 Jackie D'Elia
 *
 * Plugin Name:       JDD SVG Support
 * Plugin URI:        https://jackiedelia.com
 * Description:       Adds ability to embed SVG into pages.
 * Version:           1.0.0
 * Author:            Jackie D'Elia
 * Author URI:        https://jackiedelia.com
 * Text Domain:       jdd-svg-support
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: 
 * GitHub Branch:     
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    die;
} 

// adds inline-svg shortcode and then 
//outputs the file located in the child theme image folder

function jdd_svg_inline_shortcode( $atts ){
	if(empty($atts['class'])) {
		$atts['class'] = 'class="inline-svg"';
	} else {
		$atts['class'] = 'class="inline-svg ' . $atts['class'] . '"';
	}
    return jdd_svg_output($atts['file'], $atts['class']);
}
add_shortcode( 'insert-svg-code', 'jdd_svg_inline_shortcode', 15 );


function jdd_svg_output($name, $classes) {

  $path = get_stylesheet_directory();
  $file = $path . '/images/' . $name . '.svg';

  return '<div ' . $classes . '>' .  file_get_contents( $file ) .  '</div>';
 
}

?>
