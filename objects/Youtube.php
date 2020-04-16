<?php

class Youtube {

    public static function _getID_FromURL(string $url): ?string {
        $GETStart = strpos($url, "?v=");
        return substr($url, $GETStart + 3);
    }

    public static function _getAuthorID_FromURL(string $url): ?string {
        $breakPos = strpos($url, "/channel/");
        return substr($url, $breakPos + 9);
    }

    public static function _saveVideoThumbnail_FromURL(string $url, string $videoID) {
        $filePath = IMG_DIR . THUMBNAIL_DL_VIDEOS_DIR . $videoID . ".thumb.jpg";
        $success = file_put_contents($filePath, file_get_contents($url));
        if ($success)
            return $filePath;
        return false;
    }

    public static function _checkAuthor_FromSiteID(string $siteID) {
        global $db;


    }

}