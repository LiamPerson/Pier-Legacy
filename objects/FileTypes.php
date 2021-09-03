<?php

class FileTypes {

    private static $MIME_DICTIONARY = [
        "image/jpeg" => "jpeg",
        "image/bpm" => "bmp",
        "image/gif" => "gif",
        "image/jpg" => "jpg",
        "image/png" => "png",
        "image/svg+xml" => "svg",
        "image/tiff" => "tiff",
        "image/webp" => "webp",

        "video/mp4" => "mp4",
        "video/webm" => "webm",
        "video/mpeg" => "mpeg",
        "video/ogg" => "ogv"
    ];

    /***
     * Gets file extension without preceding . from file type.
     *
     * E.g: mp4 from video/mp4
     *
     * @param string $type
     * @return string
     */
    public static function _GetFileExtension_FromMIMEType(string $mime_type) : string {
        return FileTypes::$MIME_DICTIONARY[$mime_type];
    }
}