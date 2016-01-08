<?php
/*
Plugin Name: Tutsplus Post Notice
Plugin URI: http://football.com
Description: Plugin from the TutsPlus Introduction to Wordpress Plugin Development
Version: 1.0
Author: Tomek
Author URI: http://football.com
*/

// If this file is called directly, abort. For security add this code to a plugin
if ( ! defined('WPINC') ) {
	die;
}

require_once( plugin_dir_path( __FILE__ ) . 'class-tutsplus-post-notice-editor.php' );
require_once( plugin_dir_path( __FILE__ ) . 'class-tutsplus-post-notice.php' );

function tutsplus_post_notice_start() {
	
	$post_editor = new TutsPlus_Post_Notice_Editor();
	
	$post_notice = new TutsPlus_Post_Notice( $post_editor );
	$post_notice->initialize();
	
}
tutsplus_post_notice_start();



















