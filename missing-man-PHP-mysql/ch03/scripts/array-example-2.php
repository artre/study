<?php
$file_cabinet['first_name'] = "Derek";
$file_cabinet['last_name'] = "Kovalyk";
$file_cabinet['email'] = "derek@DerekTrucks.com";
$file_cabinet['facebook_url'] = "http://www.facebook.com/DerekTrucks";
$file_cabinet['twitter_handle'] = "@derekandsusan";


$first_name = $file_cabinet['first_name'];
$last_name = $file_cabinet['last_name'];
$email = $file_cabinet['email'];
$facebook_url = $file_cabinet['facebook_url'];
$twitter_handle = $file_cabinet['twitter_handle'];

echo $first_name . " " . $last_name . "<br />";
echo "\nEmail: " . $email . "<br />";
echo "\nFacebook URL: " . $facebook_url . "<br />";
echo "\nTwitter Hnadle: " . $twitter_handle . "<br />";	

echo "<br /><br />";

var_dump($file_cabinet);
	
	
?>