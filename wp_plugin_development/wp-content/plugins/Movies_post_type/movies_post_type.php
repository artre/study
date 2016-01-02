<?php
/*
Plugin Name: Poll Custom Post Type
Plugin URI: http://football.com
Description: Learn Creating Custom Post Type 
Version: 1.0
Author: Tomek
Author URI: http://football.com
*/


class AK_Polls_Post_Type 
{	
	public function __construct()
	{
		$this->register_post_type();
		$this->taxonomies();
	}
	
	public function register_post_type()
	{
		$args = array(
			'labels' 	=> array(
				'name'			=> 'Polls',
				'singular_name'	=> 'Poll',
				'add_new'		=> 'Add new Poll',
				'add_new_item'	=> 'Add new Poll',
				'edit_item'		=> 'Edit Item',
				'new_item'		=> 'Add new Item',
				'view_item'		=> 'View Poll',
				'search_items'	=> 'Search Polls',
				'not_found'		=> 'No Polls Found',
				'not_found_in_trash' => 'No Polls Found in Trash'
			),
			'query_var'	=> 'polls',
			'rewrite'	=> array(
				'slug'			=> 'polls/',
			),
			'public'	=> true,
			'menu_position' => 5,
			'menu_icon'	=> admin_url() . '/images/date-button.gif',
			'supports'	=> array('title', 'editor', 'author', 'thumbnail', 'comments', 'excerpt' )
		);
		
		register_post_type('ak_polls', $args);
	}
	
	public function taxonomies()
	{
		$taxonomies = array();
		
		$taxonomies['poll_cat'] = array(
			'hierarchical'	=> true,
			'query_var'		=> 'poll_category',
			'rewrite'		=> array(
				'slug'	=> 'polls/category'
			),
			'labels' 	=> array(
				'name'			=> 'Poll Categoris',
				'singular_name'	=> 'Poll Category',
				'add_new'		=> 'Add new Poll Category',
				'add_new_item'	=> 'Add new Poll Category',
				'edit_item'		=> 'Edit Poll Category',
				'new_item'		=> 'Add new Poll Category',
				'view_item'		=> 'View Poll Category',
				'search_items'	=> 'Search Poll Categories',
				'popular_items'	=> 'Popular Poll Categories',
				'separate_items_with_comments' => 'Separate Poll Categories with commas',
				'add_or_remove_items' => 'Add or remove Poll Category',
				'choose_from_most_used' => 'Choose from most used Poll Categories'
			)
		);
		
		$taxonomies['genre'] = array(
			'hierarchical'	=> true,
			'query_var'		=> 'poll_genre',
			'rewrite'		=> array(
				'slug'	=> 'polls/genre'
			),
			'labels' 	=> array(
				'name'			=> 'Poll Genre',
				'singular_name'	=> 'Poll Genre',
				'add_new'		=> 'Add new Poll Genre',
				'add_new_item'	=> 'Add new Poll Genre',
				'edit_item'		=> 'Edit Poll Genre',
				'new_item'		=> 'Add new Poll Genre',
				'view_item'		=> 'View Poll Genre',
				'search_items'	=> 'Search Poll Genres',
				'popular_items'	=> 'Popular Poll Genres',
				'separate_items_with_comments' => 'Separate Poll Genres with commas',
				'add_or_remove_items' => 'Add or remove Poll Genre',
				'choose_from_most_used' => 'Choose from most used Poll Genres'
			)
		);
		
		$this->register_all_taxonomies($taxonomies);
	}
	
	public function register_all_taxonomies($taxonomies)
	{
		foreach($taxonomies as $name => $arr) {
			register_taxonomy($name, array('ak_polls'), $arr);
		}
		
	}
	
	public function metaboxes()
	{
		add_action('add_meta_boxes', function(){
			// css id, title, cb function, page (post_type), priority, cb function arguments
			add_meta_box();
		})
	}
	
}




add_action('init', function(){
	new AK_Polls_Post_Type();
});









































