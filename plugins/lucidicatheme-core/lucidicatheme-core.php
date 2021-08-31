<?php
/*
Plugin Name: Lucidicatheme core plugin
Plugin URI: https://lucidica.com/
Description: Core plugin for lucidica theme 
Version: 1.8
Author: Automattic
Author URI: https://lucidica.com/
License: GPLv2 or later
Text Domain: lucidica-core
*/

if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}


  require plugin_dir_path( __FILE__ )  . '/inc/metaboxes.php';
 require plugin_dir_path( __FILE__ ) . '/inc/acf.php';
 require plugin_dir_path( __FILE__ ) . '/inc/custom_post_type.php';
 require plugin_dir_path( __FILE__ ) . '/inc/elementor.php';