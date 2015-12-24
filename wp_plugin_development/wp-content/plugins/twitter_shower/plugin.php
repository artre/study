<?php
/*
Plugin Name: Twitter Shower
Plugin URI: http://football.com
Description: Simple shortcode
Version: 1.0
Author: Tomek
Author URI: http://football.com
*/

add_shortcode('twitter', function($atts, $content) {
	$atts = shortcode_atts(
		array(
			'username' => 'envatowebdev',
			'content' => !empty($content) ? $content : 'Follow me on Twitter!'
		), $atts	
	);
	
	extract($atts); //  extract - Import variables into the current symbol table from an array
	
	return "<a href='http://twitter.com/$username' target='_blank'>$content</a>";
	
});	
