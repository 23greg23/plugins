<?php

/*
Plugin Name:  Curry Center
Version: 1.0
Description: Output the CurryCenter current year in your WordPress site.
Text Domain: currycenter
*/
/**
 * [current_year] returns the Current Year as a 4-digit string.
 * @return string Current Year
*/

add_shortcode( 'current_year', 'currycenter_year' );
function currycenter_init(){
 function currycenter_year() {
 return getdate()['year'];
 }
}
add_action('init', 'currycenter_init');

/** Always end your PHP files with this closing tag */
?>
