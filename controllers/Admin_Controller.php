<?php
class Admin_Controller {

    public function __construct() {
    }

    public function test() {
        echo "hello world!";
    }

    public function helloWorld() {
        echo "hello world! :)";
    }

    public function addNewMovie() {
        global $db;

        s($_FILES);
        s($_POST);

        // Clean title to remove spaces
        $title = str_replace(" ", "_", $_POST["title"]);
        $releaseYear = string_to_year($_POST["release_date"]);

        $genericURIString = $title . "_Y" . $releaseYear . "_G" . $_POST["genre"] . "_L" . $_POST["language"] . "_S" . $_POST["subtitle"] . "_" . $_POST["video_width"] . "x" . $_POST["video_height"] . "_" . Tokens::_GetTokenString();

        $movieURI = MOVIES_DIR . $genericURIString . "." . FileTypes::_GetFileExtension_FromMIMEType($_POST["movie_type"]);
        $thumbnailURI = THUMBNAIL_MOVIES_DIR . $genericURIString . "." . FileTypes::_GetFileExtension_FromMIMEType($_POST["thumbnail_type"]);

        // Move the uploaded files from temp storage to stored/movies and img/thumbnail/movies
        move_uploaded_file($_FILES["movie_file"]["tmp_name"], ROOT . $movieURI);
        move_uploaded_file($_FILES["thumbnail"]["tmp_name"], ROOT . $thumbnailURI);

        // Create new entry ...
        $db->query("INSERT INTO movies(
                               title,
                               description,
                               URI, 
                               movieType, 
                               posterURI, 
                               posterType, 
                               language, 
                               subtitle, 
                               dateReleased, 
                               genre,
                               length                    
                               ) VALUES (
                               :title,
                               :description,
                               :URI,
                               :movieType,
                               :posterURI,
                               :posterType,
                               :language,
                               :subtitle,
                               :dateReleased,
                               :genre,
                               :length
                   )");
        $db->bind(":title", $_POST["title"]);
        $db->bind(":description", $_POST["description"]);
        $db->bind(":URI", $movieURI);
        $db->bind(":movieType", FileTypes::_GetFileExtension_FromMIMEType($_POST["movie_type"]));
        $db->bind(":posterURI", $thumbnailURI);
        $db->bind(":posterType", FileTypes::_GetFileExtension_FromMIMEType($_POST["thumbnail_type"]));
        $db->bind(":language", $_POST["language"]);
        $db->bind(":subtitle", $_POST["subtitle"]);
        $db->bind(":dateReleased", $_POST["release_date"]);
        $db->bind(":genre", $_POST["genre"]);
        $db->bind(":length", $_POST["movie_length"]);
        $db->execute();
    }
}