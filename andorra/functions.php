<?php
/**
 * Andorra functions and definitions
 *
 * @package Andorra
*/

// Use a child theme instead of placing custom functions here
// http://codex.wordpress.org/Child_Themes

/* ------------------------------------------------------------------------- *
 *  Load theme files
/* ------------------------------------------------------------------------- */	
require_once trailingslashit(get_template_directory()) .'functions/andorra-functions.php'; 			// Theme Custom Functions
require_once trailingslashit(get_template_directory()) .'functions/andorra-customizer.php';			// Load Customizer
require_once trailingslashit(get_template_directory()) .'functions/andorra-image-sliders.php'; 		// Theme Custom Functions
require_once trailingslashit(get_template_directory()) .'functions/andorra-woocommerce.php';		// WooCommerce Support
require_once trailingslashit(get_template_directory()) .'functions/wp_bootstrap_navwalker.php';