<?php
	get_header();
	
	
	
?>
	
	
	
<div class="ak_form">
<h1><?php //the_title(); ?></h1>	
	
<?php 
if ( is_user_logged_in() ) {
	$current_user = wp_get_current_user();
	printf('Wlcome, rigistered user: %s', esc_html( $current_user->user_login ) );
} else {
	echo 'Hi visitor. Please register';
// 	custom_registration_function();	
	
}

?>

<br><br><br>
<?php //the_content(); ?>

	<div id="ajaxLog" style="width: 100px; height: 100px; margin: 20px; cursor: pointer;line-height: 100px; background-color: green; color: white; font-weight: 900;">Log In</div>
	
	<div id="ajaxReg" style="width: 100px; height: 100px; margin: 20px; cursor: pointer;line-height: 100px; background-color: orange; color: white; font-weight: 900;">Register</div>

</div>

	
	
	
	
	
	
	
	
<?php
	get_footer();
?>