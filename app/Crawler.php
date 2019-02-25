
<?php

// From URL to get webpage contents.
$url = "https://www.geeksforgeeks.org/";

// Initialize a CURL session.
$ch = curl_init();

// Return Page contents.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

//grab URL and pass it to the variable.
curl_setopt($ch, CURLOPT_URL, $url);



$result = curl_exec($ch);

$file = dirname(__FILE__) . '/output.txt';

$data = $result;

file_put_contents($file, $data,FILE_APPEND);

//echo $result;

?>