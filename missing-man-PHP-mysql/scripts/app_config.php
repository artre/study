<?php
	
// Set up debug mode
define("DEBUG_MODE", true);

function debug_print($message) {
	if (DEBUG_MODE) {
		echo $message;
	}
}

function handle_error($user_error_message, $system_error_message) {
	header("Location: " . SITE_ROOT ."scripts/show_error.php?" .
	"error_message={$user_error_message}&" .
	"system_error_message={$system_error_message}");
	exit();
}

function get_web_path($file_system_path) {
	return str_replace('/Volumes/Macintosh HD'.$_SERVER['DOCUMENT_ROOT'], '', $file_system_path);
}

// Site root
define("SITE_ROOT", "http://localhost:8888/study/missing-man-PHP-mysql/");

// Location of web files on host
define("HOST_WWW_ROOT", "/Volumes/Macintosh HD/Applications/MAMP/htdocs/study/missing-man-PHP-mysql/");
$image_fieldname = "user_pic";

// Potanitial PHP upload errors
$php_errors = array(1 => 'Maximum file size in php.ini exceeded',
					2 => 'Maximum file size in HRML form exceeded',
					3 => 'Only part of the file was uploaded',
					4 => 'No file was selected to upload');
	
// Database connection constants
define("DATABASE_HOST", "localhost");
define("DATABASE_USERNAME", "root");
define("DATABASE_PASSWORD", "root");
define("DATABASE_NAME", "missing_man_php_mysql");

?>