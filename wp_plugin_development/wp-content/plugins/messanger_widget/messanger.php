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
	
	
	public function form($instance) 
	{	
		extract($instance);
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title');?>">Title: </label>
			<input 
				class="widefat"
				id="<?php echo $this->get_field_id('title');?>"
				name="<?php echo $this->get_field_name('title');?>"
				value="<?php if( isset($title)) echo esc_attr($title); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('desctiption');?>">Desctiption: </label>
			<textarea 
				class="widefat"
				rows="8"
				id="<?php echo $this->get_field_id('desctiption');?>"
				name="<?php echo $this->get_field_name('desctiption');?>"><?php if( isset($desctiption)) echo esc_attr($desctiption); ?></textarea>
		</p>
		<?php	
	}
	
	public function widget($args, $instance) 
	{
		extract($args);
		extract($instance);
		
		$title = apply_filters('widget_title', $title);
		$desctiption = apply_filters('widget_desctription', $desctiption);
		
		if ( empty($title)) $title = 'My Status'; // seting a deafault value
		if ( empty($desctiption) ) $desctiption = 'That\'s a beautiful day'; // seting a deafault value
		
		echo $before_widget;
			echo $before_title . $title . $after_title;
			echo "<p>$desctiption</p>";
		echo $after_widget;	
		
	}
}

add_action('widgets_init', 'jw_register_messanger');

function jw_register_messanger() 
{
	register_widget('Messanger');
}



