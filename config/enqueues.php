<?php
/*
 * Enqueues
 */

if (!function_exists('maweo_enqueues')) {
	function maweo_enqueues()
	{
		// Styles
		wp_register_style('bootstrap5', get_template_directory_uri() . '/lib/bootstrap.min.css', false, '5.1.3', null);
		wp_enqueue_style('bootstrap5');

		wp_register_style('bootstrapIcons', get_template_directory_uri() . '/lib/bootstrap-icons.css', false, '1.7.1', null);
		wp_enqueue_style('bootstrapIcons');

		wp_enqueue_style('child_css_global', get_template_directory_uri() . '/dist/css/main.min.css', false, null);


		// Scripts
		wp_register_script('bootstrap5', get_template_directory_uri() . '/lib/bootstrap.bundle.min.js', false, '5.1.3', true);
		wp_enqueue_script('bootstrap5');

		wp_register_script('child_js_global', get_template_directory_uri() . '/dist/main.js', array('jquery'), '1.1', true);
		wp_enqueue_script('child_js_global');
	}
}
add_action('wp_enqueue_scripts', 'maweo_enqueues', 100);
