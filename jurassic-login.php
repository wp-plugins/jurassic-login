<?php
/*
Plugin Name: Jurassic Login
Plugin URI: http://jurassic-login.screenres.co.uk
Description: Just for fun we'll add Jurassic Park 'You Didn't Say The Magic Word' message when a login failure happens. This plugin has no settings.
Version: 1.0
Author: Steven Carr
Author URI: http://www.screenres.co.uk
License: GPL2
*/

/* ------------------------------------------
Jurassic Login
--
Only called when a login attempt fails
------------------------------------------ */
function jl_welcome_to_jurassic_park() {

	function jl_jurassic_login_error_output( $content ) {
		//
		// Build the output
		$jurassicOutput = '<div id="jurassic-login-wrap" style="margin:0 0 20px 0; background-color:white;">';
		$jurassicOutput.= '<img src="' . plugins_url('imgs/jurassic-magic-word.gif', __FILE__ ) . '" alt="Magic Word" style="float:right;">';
		$jurassicOutput.= '<img src="' . plugins_url('imgs/jurassic-finger-wag.gif', __FILE__ ) . '" alt="Finger Wag">';
		$jurassicOutput.= '</div>';
		//
		// Add the Jurassic Output to any other content
		$newContent = $content . $jurassicOutput;
		//
		return $newContent;
	}
	add_filter( 'login_message', 'jl_jurassic_login_error_output', 99, 1 );

}
add_action( 'wp_login_failed', 'jl_welcome_to_jurassic_park' );