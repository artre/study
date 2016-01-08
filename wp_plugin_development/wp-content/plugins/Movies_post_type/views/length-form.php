<?php
	$length = get_post_meta($post->ID, 'ak_polls_length', true);
?>
<p>
	<label for='ak_polls_length'> Length: </label>
	<input type='text' class='widefat' name='ak_polls_length' id='ak_polls_length' value='<?php echo esc_attr($length);?>' />
</p>
			