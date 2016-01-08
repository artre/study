<?php


get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php			
			
/*
		$posts = get_field('foot');
		
		$text = get_field('texto');
*/
		
// 		echo($text);
		if( $posts ) { ?>
		    <ul>
		    <?php foreach( $posts as $post){ // variable must be called $post (IMPORTANT) ?>
		        <?php setup_postdata($post); ?>
		        <li>
		            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		        </li>
		    <?php } ?>
		    </ul>
		    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		<?php } else { echo "nothing"; }?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>