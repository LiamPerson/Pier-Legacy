<?php

$vidID = $_POST['vidID'];
$url = "http://gdata.youtube.com/feeds/api/videos/". $vidID;
$doc = new DOMDocument;
$doc->load($url);
$title = $doc->getElementsByTagName("title")->item(0)->nodeValue;

echo $url;
echo $title;