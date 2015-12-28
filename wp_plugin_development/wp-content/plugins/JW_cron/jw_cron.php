<?php
/*
Plugin Name: JW Cron
Plugin URI: http://football.com
Description: reacurring events
Version: 1.0
Author: Tomek
Author URI: http://football.com
*/

add_action('init', function() {
	$time = wp_next_scheduled('jw_cron_hook');
	wp_unschedule_event($time, 'jw_cron_hook');
	
	if (!wp_next_scheduled('jw_cron_hook')) {
		wp_schedule_event(time(), 'two-minutes', 'jw_cron_hook');
		//wp_schedule_single_event(time() + 3600, 'jw_cron_hook'); // if you want to schedule single event, which will be executed ones 
	}
});


add_action('admin_menu', function() {
	add_options_page('Cron Setting', 'Cron Setting', 'manage_options', 'jw-cron', function() {
		
		$cron = _get_cron_array();
		$schedules = wp_get_schedules();
		?>
		<div class="wrap">
			<h2>Cron Events Scheduled</h2>
			<?php
				foreach($schedules as $name) {
					echo "<h3>" . $name['display'] . ": " . $name['interval'] . "</h3>";
				}	
			?>
		</div>
		<?php
	});
});

add_action('jq_cron_hook', function() {
	$str = time();
	wp_mail('artre8@gmail.com', 'test', "this is a test mail at $str.");
});


// Create custom interval
add_filter('cron_schedules', function($schedules) {
	$schedules['two-minutes'] = array(
		'interval' => 120,
		'display' => 'Every Two Minutes'
	);
	
	$schedules['ten-minutes'] = array(
		'interval' => 600,
		'display' => 'Every Ten Minutes'	
	);
	
	return $schedules;
});

























