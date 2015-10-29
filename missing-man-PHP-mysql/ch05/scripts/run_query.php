<?php
	require '../../scripts/database_connection.php';
	
	$query_text = $_REQUEST['query'];
	$result = mysql_query($query_text);
	
/*
	$return_rows = false;
	
	$uppercase_query_text = strtoupper($query_text);
	$location = strpos($uppercase_query_text, "CREATE");
	if ($location === false) {
		$location = strpos($uppercase_query_text, "INSERT");
		if ($location === false) {
			$location = strpos($uppercase_query_text, "UPDATE");
			if ($location === false) {
				$location = strpos($uppercase_query_text, "DELETE");
				if ($location === false) {
					$location = strpos($uppercase_query_text, "DROP");
					if ($location === false) {
						// If we got here, it's not a CREQATE, INSERT, UPDATE, DELETE or DROP query. 
						// It should return rows.
						$return_rows = true;
					}
				}
			}
		}
	}
*/

/*
	Here is a cleaner way to do stuff commented above. Using regular expression
	^ (carat) means 'at the beginning'
	* means - any number of charachters that came before me, or none. In this case it will match if there is any number of white space before the reg expression
	i means - uppercase or lowercase
*/
	$return_rows = true;
	$regexpression = "/^ *(CREATE|INSERT|UPDATE|DELETE|DROP)/i";
	if ( preg_match($regexpression, trim($query_text)) ) {
		$return_rows = false;
	}
	
	
	if (!$result) {
		die("<p>Error in executing the SQL query " . $query_text . ": " . mysql_error() . "</p>");
	}
	
	if ($return_rows) {
		echo "<p>Results from your query:</p>";
		echo "<ul>";
		while ($row = mysql_fetch_row($result)) {
			echo "<li>{$row[0]}</li>";
		}
		echo "</ul>";
	} else {
		// No rows. Just report if the query ran or not
		echo "<p>Your query was processed successfully.</p>";
		echo "<p>{$query_text}</p>";
	}
	
	
?>