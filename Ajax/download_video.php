<?php
header('Content-Type: application/json');
$v = Youtube::_getID_FromURL($_POST["url"]);
$return = "";

// Get Video Information
$vJSON = file_get_contents("https://www.youtube.com/oembed?url=http%3A//youtube.com/watch%3Fv%3D" . $v . "&format=json");

// If video exists
if ($vJSON) {
    $vInfo = json_decode($vJSON,true);
    // Download Thumbnail
    $thumbFilePath = Youtube::_saveVideoThumbnail_FromURL($vInfo["thumbnail_url"], $v);

    // Get Author
    $authorID = Youtube::_getAuthorID_FromURL($vInfo["author_url"]);


    // Enter information into database

    // Get Thumbnail
//    $contents = file_get_contents(Youtube::_bigVideoThumbnail_FromID($v));

    // If contents exists
//    $file = file_put_contents(IMG_DIR . THUMBNAIL_DL_VIDEOS_DIR . $v . ".0.jpg", $contents);
//    exec("youtube-dl --config-location '/var/www/html/config/youtube-dl/mp4' " . $_POST["url"] . " > /dev/null &");
}


echo $return;