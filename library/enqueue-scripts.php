<?php
/**
 * Enqueue all styles and scripts
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 * Learn more about enqueue_style: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style }
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'uthsc_care_scripts' ) ) :
	function uthsc_care_scripts() {
	// Enqueue the main Stylesheet.
	wp_enqueue_style( 'uthsc-emerald-wp-care-stylesheet', get_stylesheet_directory_uri() . '/assets/stylesheets/foundation.css', array(), '2.9.0', 'all' );

	}

	add_action( 'wp_enqueue_scripts', 'uthsc_care_scripts' );
endif;
