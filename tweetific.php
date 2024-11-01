<?php
/*
 * Plugin Name: Tweetific
 * Version: 1.0
 * Plugin URI: http://www.one-designs.co.uk/
 * Description: A small, customisable Twitter banner plugin.
 * Author: Tom Hanstead
 * Author URI: http://www.one-designs.co.uk/
 * Requires at least: 4.0
 * Tested up to: 4.0
 *
 * Text Domain: tweetific
 * Domain Path: /lang/
 *
 * @package WordPress
 * @author Tom Hanstead
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Load plugin class files
require_once( 'includes/class-tweetific.php' );
require_once( 'includes/class-tweetific-settings.php' );

// Load plugin libraries
require_once( 'includes/lib/class-tweetific-admin-api.php' );
require_once( 'includes/lib/class-tweetific-post-type.php' );
require_once( 'includes/lib/class-tweetific-taxonomy.php' );

// twitter lib
require_once ('includes/lib/twitter-api-php/TwitterAPIExchange.php');

function include_widget_footer() {
    require_once( 'includes/lib/widget.php');
}

add_action('wp_footer', 'include_widget_footer');

/**
 * Returns the main instance of Tweetific to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object Tweetific
 */
function Tweetific () {
	$instance = Tweetific::instance( __FILE__, '1.0.0' );

	if ( is_null( $instance->settings ) ) {
		$instance->settings = Tweetific_Settings::instance( $instance );
	}

	return $instance;
}

Tweetific();
