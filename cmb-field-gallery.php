<?php
/*
Plugin Name: CMB Field Type: Gallery
Plugin URI: https://github.com/mustardBees/cmb-field-gallery
Description: Gallery field type for Custom Metaboxes and Fields for WordPress. Thanks to <a href="http://www.purewebsolutions.nl/">Roel Obdam</a> for the hard work <a href="http://goo.gl/RYj2w">figuring out the media library</a>.
Version: 2.0.2
Author: Phil Wylie
Author URI: http://www.philwylie.co.uk/
License: GPLv2+
*/

// Useful global constants
define( 'PW_GALLERY_URL', plugin_dir_url( __FILE__ ) );

/**
 * Render field
 */
function pw_gallery_field( $field, $meta ) {
	wp_enqueue_script( 'pw_gallery_init', PW_GALLERY_URL . 'js/script.js', array( 'jquery' ), null );

	if ( ! empty( $meta ) ) {
		$meta = implode( ',', $meta );
	}

	echo '<div class="pw-gallery">';
	echo '	<input type="hidden" id="' . $field->args( 'id' ) . '" name="' . $field->args( 'id' ) . '" value="' . $meta . '" />';
	echo '	<input type="button" class="button" value="' . ( $field->args( 'button' ) ? $field->args( 'button' ) : 'Manage gallery' ) . '" style="margin-left: 0;" />';
	echo '</div>';

	$desc = $field->args( 'desc' );
	if ( ! empty( $desc ) ) echo '<p class="cmb2-metabox-description">' . $desc . '</p>';
}
add_filter( 'cmb2_render_pw_gallery', 'pw_gallery_field', 10, 2 );


/**
 * Split CSV string into an array of values
 */
function pw_gallery_field_sanitise( $meta_value, $field ) {
	if ( empty( $meta_value ) ) {
		$meta_value = '';
	} else {
		$meta_value = explode( ',', $meta_value );
	}

	return $meta_value;
}
