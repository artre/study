<?php
/*
Plugin Name: JW Twitter Widget
Plugin URI: http://football.com
Description: Creating Widgets
Version: 1.0
Author: Tomek
Author URI: http://football.com
*/


class JW_Twitter_Widget extends WP_Widget {
	
	function __construct() 
	{
		$options = array(
			'description' 	=> 'Display and cache tweets',
			'name' 			=> 'Display Tweets'
		);
		
		parent::__construct('JW_Twitter_Widget', '', $options);
	}
	
	
	public function form($instance) 
	{	
		extract($instance);
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title');?>">Title: </label>
			<input 
				type="text" 
				class="widefat" 
				id="<?php echo $this->get_field_id('title'); ?>"
				name="<?php echo $this->get_field_name('title'); ?>"
				value="<?php if(isset($title)) echo esc_attr($title); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('username');?>">Twitter Username: </label>
			<input 
				type="text" 
				class="widefat" 
				id="<?php echo $this->get_field_id('username'); ?>"
				name="<?php echo $this->get_field_name('username'); ?>"
				value="<?php if(isset($username)) echo esc_attr($username); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('tweet_count');?>">Number of Tweets to Retrieve: </label>
			<input 
				type="number" 
				class="widefat" 
				style="width: 40px;"
				id="<?php echo $this->get_field_id('tweet_count'); ?>"
				name="<?php echo $this->get_field_name('tweet_count'); ?>"
				min="1"
				max="10"
				value="<?php echo !empty($tweet_count) ? $tweet_count : 5; ?>" />
		</p>
		<?php	
	}
	
	public function widget($args, $instance) 
	{
		extract($args);
		extract($instance);
				
		if ( empty($title) ) $title = 'Recent Tweets';
		
		$data = $this->twitter($tweet_count, $username);
		
		if ( false !== $data && isset($data->tweets) ) {
			echo $before_widget;
				echo $before_title;
					echo $title;
				echo $after_title;
				
				echo '<ul><li>' . implode('</li><li>', $data->tweets) . '</li></ul>';	
			echo $after_widget;
		}
	}
	
	private function twitter($tweet_count, $username) 
	{
		if ( empty($username) ) return false;
		
		$tweets = get_transient('recent_tweets_widget');
		
		if (!$tweets ||
			$tweets->username !== $username ||
			$tweets->tweet_count !== $tweet_count )
		{
			return $this->fetch_tweets($tweet_count, $username);
		}
		
		return $tweets;
	}
	
	private function fetch_tweets($tweet_count, $username)
	{
		$tweets = wp_remote_get("http://twitter.com/statuses/user_timeline/$username.json");
		$tweets = json_decode($tweets['body']);
		
		// There was a problem
		if ( isset($tweets->error) ) return false;
		
		$data = new stdClass();
		$data->username = $username;
		$data->tweet_count = $tweet_count;
		$data->tweets = array();
		
		foreach($tweets as $tweat){
			if ( $tweet_count-- === 0 ) break;
			$data->tweets[] = $this->filter_tweet($tweet->text);
		}
		
		set_transient('recent_tweets_widgets', $data, 60 * 5); // update data only every 5 min, ot not overload the server. I can use this for my polls. After user voted, show him results which are saved with set_transient. Update the results only every 5 min.
		return $data;
	}
	
	private function filter_tweet($tweet)
	{
		$tweet = preg_replace('/(http[^\s]+)/im', '<a href="$1">$1</a>', $tweet);
		$tweet = preg_replace('/@([^\s]+)/i', '<a href="http://twitter.com/$1">@$1</a>', $tweet);
		return $tweet;
	}
}

add_action('widgets_init', 'register_jw_twitter_widget');

function register_jw_twitter_widget() 
{	
	register_widget('JW_Twitter_Widget');
}