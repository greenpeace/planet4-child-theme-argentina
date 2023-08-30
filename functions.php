<?php

/**
 * Additional code for the child theme goes in here.
 */

add_action( 'wp_enqueue_scripts', 'enqueue_child_styles', 99);

function enqueue_child_styles() {
	$css_creation = filectime(get_stylesheet_directory() . '/style.css');

	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', [], $css_creation );
}

add_action('wp_enqueue_scripts', function() {
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/custom-popup.css');
	wp_enqueue_script('custom', get_stylesheet_directory_uri().'/assets/src/js/custom-popup.js');
});
