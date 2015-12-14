<?php
/*
Plugin Name: Twitter Shower
Plugin URL: http://artemkovalyk.com
Description: Simple shortcode
Version: 1.0
Author: Artem Kovalyk
Author URI: http://artemkovalyk.com
*/



add_shortcode('twitter', function($atts, $content){
	$atts = shortcode_atts(
		array(
			'username' => 'envatowebdev',
			'content' => !empty($content) ? $content : 'Follow me on Twitter',
			'show_tweets' => false,
			'tweet_reset_time' => 10,
			'num_tweets' => 5
		), $atts
	);
	
	extract($atts);
	
	if ($show_tweets) {
		$tweets = fetch_tweets($num_tweets, $username, $tweet_reset_time);
	}
	
	
	return "<a href='http://twitter.com/$username' target='blank'>$content</a>";
});


function fetch_tweets($num_tweets, $username, $tweet_reset_time) {
	
	$tweets = curl("http://twitter.com/statuses/user_timeline/$username.json");
	
/*
	echo '<pre>';
	print_r($tweets);
	echo '</pre>';
*/
	
	foreach($tweets as $tweet) {
		echo $tweet->text;
	}
}

function curl($url) {
	$c = curl_init($url);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($c, CURLOPT_CONNECTTIMEOUT, 3);
	curl_setopt($c, CURLOPT_TIMEOUT, 5);
	
	return json_decode( curl_exec($c));
}































