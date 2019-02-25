
<?php

$curl = curl_init();

//        $url = 'https://www.geeksforgeeks.org/';
$url = 'http://newyork.craigslist.org/search/bka';

// Return Page contents.
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_URL, $url);

$result = curl_exec($curl);

$books = array();

preg_match_all("!<a.*class=.result-title hdrlnk.*>(.*?)<\/a>!", $result, $match);

$books['name'] = $match[1];

$data = $books['name'];

//        $data = $result . "\n";

curl_close($curl);

$file = dirname(__FILE__) . '/output.txt';

file_put_contents($file, $data,FILE_APPEND);
?>