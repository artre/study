<?php	
	require '../../scripts/app_config.php';
	
	mysql_connect($database_host, $username, $password)
		or die("<p>Error connecting to database: " . mysql_error() . "</p>");
	
	echo "<p>Connected to MySQL!";
	
	mysql_select_db($database_name)
		or die("<p>Error selecting the database missing_manual_php_msql" . mysql_error() . "</p>");
		
	echo "<p>Connected to MySQL, using database missing_manual_php_msql...</p>";	
	
	$result = mysql_query("SHOW TABLES;");
	
	if (!$result) {
		die("<p>Error in listing tables: " . mysql_error() . "</p>");
	}
	
	echo "<p>Tables in database:</p>";
	echo "<ul>";
	while ($row = mysql_fetch_row($result)) {
		// do something with $row
		echo "<li>Table: {$row[0]}</li>";
	}
	echo "</ul>";
?>