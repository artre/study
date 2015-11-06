<?php
$file_cabinet[0] = "Derek";
$file_cabinet[1] = "Kovalyk";
$file_cabinet[2] = "derek@DerekTrucks.com";
$file_cabinet[3] = "http://www.facebook.com/DerekTrucks";
$file_cabinet[4] = "@derekandsusan";


$first_name = $file_cabinet[0];
$last_name = $file_cabinet[1];
$email = $file_cabinet[2];
$facebook_url = $file_cabinet[3];
$twitter_handle = $file_cabinet[4];

echo $first_name . " " . $last_name;
echo "\nEmail: " . $email;
echo "\nFacebook URL" . $facebook_url;
echo "\nTwitter Hnadle" . $twitter_handle;	


echo "<br /><br />";

var_dump($file_cabinet);	
	
?>