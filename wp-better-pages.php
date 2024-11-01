<?php
/*
* Plugin Name: Wp Better Pages
* Description: Build better looking pages using CSS Grid. Use this plugin to make optins, CTA, reviews, coupons, social media, table of content, landing pages and more.
* Version: 1.0
* Author: Amit Upadhyay
* Author URI: https://wpbetterpages.com/
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

include( plugin_dir_path( __FILE__ ) . 'functions/wpbetterlp.php');
include( plugin_dir_path( __FILE__ ) . 'functions/shortcodes.php');
include( plugin_dir_path( __FILE__ ) . 'functions/metaboxes.php');
include( plugin_dir_path( __FILE__ ) . 'functions/options.php');


?>
