<?php

/*
Plugin Name:  Richards
Version: 1.0
Description: call to action button
Text Domain: richards
*/
/**
 * [cta_button] returns the HTML code for a CTA Button.
 * @return string Button HTML Code
*/

add_shortcode( 'cta_button', 'richards_cta' );

function richards_cta( $atts ) {
 $a = shortcode_atts( array(
 'link' => '#',
 'id' => 'richards',
 'color' => '#cc0000',
 'size' => '',
 'label' => 'submit',
 'target' => '_self'
 ), $atts );
 $output = '<p><a href="' . esc_url( $a['link'] ) . '" id="' . esc_attr( $a['id'] ) . '" class="button ' . esc_attr( $a['color'] ) . ' ' . esc_attr( $a['size'] ) . '" target="' . esc_attr($a['target']) . '">' . esc_attr( $a['label'] ) . '</a></p>';
 return $output;
}
