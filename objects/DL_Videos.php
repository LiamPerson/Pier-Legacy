<?php

class DL_Videos {

    public static function _getLatestVideos($count = null) {
        global $db;
        if (!$count)
            $count = 12;

        $sql = "SELECT * FROM dl_videos LIMIT " . $count;
        $db->query($sql);
        $db->execute();
        $results = $db->resultSet();

        foreach ($results as &$result) {
            if(!isset($result["thumbnailURI"]) || empty($result["thumbnailURI"]))
                $result["thumbnailURI"] = IMG_DIR . THUMBNAIL_DL_VIDEOS_DIR . "placeholder.thumb.jpg";
        }

        return $results;
    }

    public static function _getCreatorInfo_byCreatorID(int $aID) {
        global $db;

        $sql = "SELECT * FROM creators_dlvideos WHERE ID =:ID";
        $db->query($sql);
        $db->bind(":ID", $aID);
        $db->execute();
        $result = $db->single();
        if(!isset($result["thumbnailURI"]) || empty($result["thumbnailURI"]))
            $result["thumbnailURI"] = IMG_DIR . THUMBNAIL_CREATOR_DIR . "abstract-user-flat-4.svg";
        return $result;
    }

}