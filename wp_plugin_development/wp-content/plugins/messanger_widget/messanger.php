<?php
error_reporting(E_ALL);
/*
Plugin Name: Messanger
Plugin URI: http://football.com
Description: Creating Widgets
Version: 1.0
Author: Tomek
Author URI: http://football.com
*/	

class Messanger extends WP_Widget {
	
	function __construct() 
	{
		$params = array(
			'description' 	=> 'Display messages to readers',
			'name' 			=> 	'Messager'
		);
		
		parent::__construct('Messager', '', $params);
	}
	
	
	public function form() 
	{
		
	}
	
	public function widget() 
	{
		
	}
}

add_action('widgets_init', 'jw_register_messanger');

function jw_register_messanger() 
{
	register_widget('Messanger');
}



