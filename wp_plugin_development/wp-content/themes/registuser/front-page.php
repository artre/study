<?php
	get_header();
	
	
	
?>
	
	
	
<div class="ak_form">
<?php the_content(); ?>


<?php
    $current_user = wp_get_current_user();
    /**
     * @example Safe usage: $current_user = wp_get_current_user();
     * if ( !($current_user instanceof WP_User) )
     *     return;
     */
    echo 'Username: ' . $current_user->user_login . '<br />';
    echo 'User email: ' . $current_user->user_email . '<br />';
    echo 'User first name: ' . $current_user->user_firstname . '<br />';
    echo 'User last name: ' . $current_user->user_lastname . '<br />';
    echo 'User display name: ' . $current_user->display_name . '<br />';
    echo 'User ID: ' . $current_user->ID . '<br />';
?>	
	
<!--
<?php 
if ( is_user_logged_in() ) {
	$current_user = wp_get_current_user();
	printf('Wlcome, rigistered user: %s', esc_html( $current_user->user_login ) );
} else {
	echo 'Hi visitor. Please register';
// 	custom_registration_function();	
	
}

?>


<form name="register" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
	<label for="username">Username:</label>
	<input type="text" name="username" size="100"><br>
	<label for="email">Email:</label>
	<input type="text" name="email" size="100" ><br>
	<label for="password">Password: </label>
	<input type="text" name="pussword" >
	
	<input type="submit"> 
	
	
</form>
<p>info</p>
<?php 
	echo $_POST["username"]; 
	
	
	$username 	= $_POST["username"];
	$password 	= $_POST["password"];
	$email 		= $_POST["email"];
	
	wp_create_user($username, $password , $email);
	
?>
-->



</div>

	
	
	
	
	
	
	
	
<?php
	get_footer();
?>