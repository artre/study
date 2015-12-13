<?php
/*	
Plugin Name: JW Filter 
Plugin URI: artemkovalyk.com 
Description: Just for demo purposes.
Author: Artem Kovalyk
Author URI: http://artemkovalyk.com
Version: 1.0
*/

//add_filter('the_title', ucwords);

/*
add_filter('the_content', function($content) {
	return  $content . ' ' . time();
});
*/


/*

add_action('wp_footer', function() {
	echo 'Hello from the footer';
});
*/

/*
add_action('comment_post',function(){
	$email = get_bloginfo('admin_email');
	wp_mail(
		$email,
		'New Comment Posted',
		'A new comment has been left on your blog'
	);
});
*/


add_filter('the_content', function($content) {
	$id = get_the_ID();
	
	if ( !is_singular('post') ) {
		return $content;
	}
	$terms = get_the_terms( $id, 'category' );	
	$cats = array();
	
	foreach ( $terms as $term ) {
		$cats[] = $term->term_id;
	}
	
	$args = array(
		'posts_per_page' 	=> 3,
		'category__in'		=> $cats,
		'orderby' 			=> 'rand',
		'post__not_in' 		=> array($id)
	);
	
	$loop = new WP_Query( $args );
	
	if ( $loop->have_posts() ) {
		
		$content .= '
			<h2> You Also Might Like... </h2>
			<ul class="related-category-posts">';
		while ( $loop->have_posts() ) {
			$loop->the_post();	
			
			$content .= '
			<li>
				<a href="' . get_permalink() . '">' . get_the_title() . '</a>
			</li>';
		}
		$content .= '</ul>';
		wp_reset_query();
	}
	return $content;
	
	
}); 






















































