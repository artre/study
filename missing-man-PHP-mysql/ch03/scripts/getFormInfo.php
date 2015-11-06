<?php
	$first_name = trim($_REQUEST['first_name']);
	$last_name = trim($_REQUEST['last_name']);
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
	
	
	$hobby = $_REQUEST['hobby'];
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
				Name: <?php echo $first_name . " " . $last_name; ?><br />
				Email Adress: <?php echo $email; ?><br />
				<a href="<?php echo $facebook_link; ?>">Your facebook page</a><br />
				<a href="<?php echo $twitter_url; ?>">Checkout your Twitter feed</a><br />
				Hobby: <?php echo $hobby; ?><br />
			</p>
		</div>
		<div id="footer"></div>
	</body>
</html>		