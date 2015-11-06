<?php
	if (isset($_REQUEST['error_message'])) {
		$error_message = preg_replace("/\\\\/", '', $_REQUEST['error_message']);
	} else {
		$error_message = "Something went wrong, and that's how you ended up here.";
	}
?>
<html>
	<head>
		<link href="../css/phpMM.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="header"><h1>PHP & MySQL: The MIssing Manual</h1></div>
		<div id="example">Error PAGE</div>
		<div id="content">
			<h1>We're really sorry...</h1>
			<p><img src="../images/error.jpg" class="error" />
			<?php echo $error_message; ?>
			<span></p>
			<p>Don't worry, though, we've been notified that there's a
			problem, and we take these things seriously. In fact, if you want to
			contact us to find out more about what's happened, or you have any
			concerns, just <a href="mailto:info@yellowtagmedia.com">email us</a>
			and we'll be happy to get right back to you.</p>
			<p>In the meantime, if you want to go back to the page that caused
			the problem, you can do that <a href="javascript:history.go(-1);">by
			clicking here.</a> If the same problem occurs, though, you may
			want to come back a bit later. We bet we'll have things figured
			out by then. Thanks again... we'll see you soon. And again, we're
			really sorry for the inconvenience.</p>
		</div>
		<div id="footer"></div>
	</body>
</html>