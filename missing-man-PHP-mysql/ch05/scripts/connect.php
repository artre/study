<?php
	mysql_connect("localhost", "root", "root")
		or die("<p>Error connecting to database: " . mysql_error() . "</p>");
	
	echo "<p>Connected to MySQL!";
	
	mysql_select_db("missing_manual_php_msql")
		or die("<p>Error selecting the database missing_manual_php_msql" . mysql_error() . "</p>");
		
	echo "<p>Connected to MySQL, using database missing_manual_php_msql.</p>";	
	
	$result = mysql_query("SHOW TABLES;");
	
	if (!$result) {
		die("<p>Error in listing tables: " . mysql_error() . "</p>");
	}
?>