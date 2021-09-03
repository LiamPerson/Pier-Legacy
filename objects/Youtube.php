<?php

class Youtube {
    public static function _saveVideoThumbnail_FromURL(string $url, string $videoID) {
        $filePath = ROOT . THUMBNAIL_DL_VIDEOS_DIR . $videoID . ".thumb.jpg";
        $success = file_put_contents($filePath, file_get_contents($url));
        if ($success)
            return $filePath;
        return false;
    }

}