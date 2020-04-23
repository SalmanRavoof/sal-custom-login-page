<?php

/*
Plugin Name: 	Sal Custom Login Page
Version: 		1.0
Description: 	Demonstrating WordPress Hooks (Actions and Filters) by customizing the WordPress login page.
Author: 		Salman Ravoof
Author URI: 	https://www.salmanravoof.com/
License:		GPLv2 or later
License URI:	https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: 	sal-custom-login-page
*/

// Enqueueing the WordPress login page custom stylesheet

add_action( 'login_enqueue_scripts', 'salhooks_login_stylesheet');
function salhooks_login_stylesheet() {
	// Load the stylesheet from the plugin folder
	wp_enqueue_style( 'sal-custom-login-page', plugin_dir_url( __FILE__ ).'sal-custom-login-page-styles.css' );
}

// Custom login ERROR message to keep the site more secure

add_filter( 'login_errors', 'salhooks_remove_login_errors', 10 );
function salhooks_remove_login_errors() {
	return 'Incorrect credentials. Please try again!';
}

// Remove the login form box shake animation

add_action( 'login_head', 'remove_login_error_shake' );
function remove_login_error_shake() {
	remove_action( 'login_head', 'wp_shake_js', 12 );
}

// Change the logo and header link above the login form

add_filter( 'login_headerurl', 'salhooks_login_headerurl');
function salhooks_login_headerurl( $url ) {
	$url = 'https://salmanravoof.com';
	return $url;
}

add_filter( 'login_headertext', 'salhooks_login_headertext');
function salhooks_login_headertext( $text ) {
	$text = 'Salman Ravoof';
	return $text;
}