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

if (!function_exists('uthsc_care_scripts')) :
    function uthsc_care_scripts()
    {
        // Enqueue CARE CSS
        wp_enqueue_style('uthsc-emerald-wp-care-css', get_stylesheet_directory_uri() . '/assets/stylesheets/foundation.css', array(), '2.9.0', 'all');
        // Enqueue Care JS
        wp_enqueue_script('uthsc-emerald-wp-care-js', get_stylesheet_directory_uri() . '/assets/javascript/foundation.js', array('jquery'), '2.9.0', true);

    }

    add_action('wp_enqueue_scripts', 'uthsc_care_scripts');
endif;
