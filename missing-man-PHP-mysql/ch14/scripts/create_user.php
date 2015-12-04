<?php
	require_once '../../scripts/database_connection.php';
	
	$first_name = trim($_REQUEST['first_name']);
	$last_name = trim($_REQUEST['last_name']);
	$username = trim($_REQUEST['username']);
	$password = trim($_REQUEST['password']);
	$email = trim($_REQUEST['email']);
	
	$facebook_link = str_replace("facebook.org", "facebook.com", trim($_REQUEST['facebook_url']));
	$position = strpos($facebook_link, "facebook.com");
	if ($position === false) {
		$facebook_link = "http://www.facebook.com/" . $facebook_link;
	}
	$position = strpos($facebook_link, "http://");
	if ($position === false) {
		$facebook_link = "http://" . $facebook_link;
	}
	
	$twitter_handle = str_replace("twitter.org", "twitter.com", trim($_REQUEST['twitter_handle']));
	$twitter_url = "http://www.twitter.com/";
	$position = strpos($twitter_handle, "@");
	if ($position === false) {
		$twitter_url = $twitter_url . $twitter_handle;
	} else {
		$twitter_url = $twitter_url . substr($twitter_handle, $position + 1);
	}
	
	$hobby = trim($_REQUEST['hobby']);
	$bio = trim($_REQUEST['bio']);
	
	$upload_dir = HOST_WWW_ROOT . "uploads/profile_pics/";
	$image_fieldname = "user_pic";
	
	// Make sure we didn't have an error uploading the image
	($_FILES[$image_fieldname]['error'] == 0)
		or handle_error("the server couldn't upload the image you selected.", $php_errors[$_FILES[$image_fieldname]['error']]);
		
	// Is this file the result of a valid upload?
	@is_uploaded_file($_FILES[$image_fieldname]['tmp_name'])
		or handle_error("you were trying to do something naughty. Shame on you!", "Uploaded request: file named " . "'{$_FILES[$image_fieldname]['tmp_name']}'");
		
	// Is this actually an image?
	@getimagesize($_FILES[$image_fieldname]['tmp_name'])
		or handle_error("you selected a file for your picture that isn't an image.",
		"{$_FILES[$image_fieldname]['tmp_name']} isn't a valid image file.");
		
	// Name the file uniquely
	$now = time();
	while (file_exists($upload_filename = $upload_dir . $now . '-' . $_FILES[$image_fieldname]['name'])) {
		$now++;
	}
	
	// Finally, move the file to its permanent location
	@move_uploaded_file($_FILES[$image_fieldname]['tmp_name'], $upload_filename)
		or handle_error("we had a problem saving your image to its permanent location.",
						"permissions or related error moving file to {$upload_filename}");
					
	// Interact with MySQL
	$insert_sql = sprintf("INSERT INTO users (first_name, last_name, username, password, email, facebook_url, twitter_handle, hobby, bio, user_pic_path) " .
							"VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s');",
							mysql_real_escape_string($first_name),
							mysql_real_escape_string($last_name),
							mysql_real_escape_string($username),
							mysql_real_escape_string(crypt($password, $username)),
							mysql_real_escape_string($email),
							mysql_real_escape_string($facebook_url),
							mysql_real_escape_string($twitter_handle),
							mysql_real_escape_string($hobby),
							mysql_real_escape_string($bio),
							mysql_real_escape_string($upload_filename)
						);
					
	// Inser the user into the database
	mysql_query($insert_sql)
		or die(mysql_error());
		
	// Redirect the user to the page that displays user information
	header("Location: ../show_user.php?user_id=" . mysql_insert_id());
	exit();
		
?>

<html>
	<head>
		<link href="../../css/phpMM.css" type="text/css" rel="stylesheet"/>
	</head>
	<body>
		<div id="header"><h1>PHP & MySQL: The MIssing Manual</h1></div>
		<div id="example">Example - 3-1</div>
		<div id="content">
			<p>Here's a record of what informaiton you submitted:</p>
			<p>
				Name: <?php echo $first_name;?><br />
				Last Name: <?php echo $last_name;?><br />
				Email Adress: <?php echo $email; ?><br />
				<a href="<?php echo $facebook_link; ?>">Your facebook page</a><br />
				<a href="<?php echo $twitter_url; ?>">Checkout your Twitter feed</a><br />
				Hobby: <?php echo $hobby; ?><br />
			</p>
			<p>Bio:<br/>
				<?php echo $bio; ?>
			</p>
		</div>
		<div id="footer"></div>
	</body>
</html>	