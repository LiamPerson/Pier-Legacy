<?php

class Movies {

    public static function _getLatestMovies($count = null) {
        global $db;
        if (!$count)
            $count = 6;

        $sql = "SELECT * FROM movies LIMIT " . $count;
        $db->query($sql);
        $db->execute();
        $results = $db->resultSet();

        foreach ($results as &$result) {
            if (!isset($result["thumbnailURI"]) || empty($result["thumbnailURI"]))
                $result["thumbnailURI"] = IMG_DIR . THUMBNAIL_MOVIES_DIR . "placeholder.thumb.jpg";
        }

        return $results;
    }

    public static function _getInfo_FromID(int $ID) {
        global $db;

        $sql = "SELECT * FROM movies WHERE ID=:ID";
        $db->query($sql);
        $db->bind(":ID", $ID);
        $db->execute();
        return $db->single();
    }
}