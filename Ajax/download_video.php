<?php
global $db;
// Get video data
$return = "error";
$vJSON = exec("youtube-dl -j --config-location " . ROOT . "/config/youtube-dl/mp4 " . $_POST["url"]);

// If video exists
if ($vJSON) {
    $vInfo = json_decode($vJSON, true);
    $videoID = $vInfo["display_id"];
    $thumbFilePath = Youtube::_saveVideoThumbnail_FromURL($vInfo["thumbnail"], $videoID);

    // Check if author exists in system
    $sql = "SELECT ID FROM authors_dlvideos WHERE siteID=:siteID";
    $db->query($sql);
    $db->bind(":siteID", $vInfo["uploader_id"]);
    $db->execute();
    $authorID = $db->single()["ID"];
    // If author doesn't exist, register author
    if (!(isset($authorID) && !empty($authorID))) {
        $sql = "INSERT INTO authors_dlvideos (siteID, name, channel_URL)
                                    VALUES (:siteID, :name, :channel_URL)";
        $db->query($sql);
        $db->bind(":siteID", $vInfo["uploader_id"]);
        $db->bind(":name", $vInfo["uploader"]);
        $db->bind(":channel_URL", $vInfo["channel_url"]);
        $db->execute();

        $authorID = $db->lastInsertId();
    }

    // Enter information into database
    $sql = "INSERT INTO dl_videos (
                       name, 
                       description,
                       authorID, 
                       URI, 
                       thumbnailURI,
                       originalURL, 
                       webpage_url,
                       siteID, 
                       category, 
                       length,
                       tags,
                       dateUploaded
                                ) VALUES (
                       :name,
                       :description,
                       :authorID, 
                       :URI, 
                       :thumbnailURI,
                       :originalURL, 
                       :webpage_url,       
                       :siteID, 
                       :category, 
                       :length,
                       :tags,
                       :dateUploaded                  
                                )";
    $db->query($sql);
    $db->bind(":name", $vInfo["fulltitle"]);
    $db->bind(":description", $vInfo["description"]);
    $db->bind(":authorID", $authorID);
    $db->bind(":URI", $vInfo["_filename"]);
    $db->bind(":thumbnailURI", $thumbFilePath);
    $db->bind(":originalURL", $_POST["url"]);
    $db->bind(":webpage_url", $vInfo["webpage_url"]);
    $db->bind(":siteID", $videoID);
    $db->bind(":category", $vInfo["categories"][0]);
    $db->bind(":length", seconds_to_timestamp($vInfo["duration"]));
    $db->bind(":tags", json_encode($vInfo["tags"]));
    $db->bind(":dateUploaded", string_to_timestamp($vInfo["upload_date"]));
    $db->execute();

    // Download video
//    exec("youtube-dl --config-location '" . ROOT . "config/youtube-dl/mp4' " . $_POST["url"] . " > /dev/null &");
    $return = "Media downloaded!";
}

header('Content-Type: application/json');
echo $return;