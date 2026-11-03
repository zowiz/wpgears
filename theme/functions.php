<?php
/**
 * WP Gears theme functions.
 *
 * WordPress loads this file automatically when the theme is active.
 * Keep it small. Split code into additional files only when doing so
 * makes a growing feature easier to understand and maintain.
 *
 * @package WP_Gears
 */

/**
 * Load the theme's small global stylesheet on the front end.
 *
 * Block themes use theme.json for most design settings. We still enqueue
 * style.css because it contains the theme header and a few essential global
 * rules. wp_enqueue_scripts is the normal WordPress hook for front-end assets.
 *
 * @return void
 */
function wpgears_enqueue_styles() {
	wp_enqueue_style(
		'wpgears-style',
		get_parent_theme_file_uri( 'style.css' ),
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'wpgears_enqueue_styles' );
