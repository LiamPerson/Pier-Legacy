<?php
//header("Content-Type: application/json");
//execInBackground("youtube-dl --config-location '/var/www/html/youtubedl' " . $_POST["url"]);
//var_dump($_POST);
//exit();


if(isset($_POST["mediaType"]) && !empty($_POST["mediaType"])) {
    switch ($_POST["mediaType"]) {
        case "mp4":
            echo exec("youtube-dl --config-location '/var/www/html/config/youtube-dl/mp4' " . $_POST["url"] . " > /dev/null &");
            break;

        case "mp3":
            echo exec("youtube-dl --config-location '/var/www/html/config/youtube-dl/mp3' " . $_POST["url"] . " > /dev/null &");
            break;

        default:
            echo exec("youtube-dl --config-location '/var/www/html/config/youtube-dl/default' " . $_POST["url"] . " > /dev/null &");
            break;
    }
}

//function execInBackground($cmd)
//{
//    if (substr(php_uname(), 0, 7) == "Windows") {
//        pclose(popen("start /B " . $cmd, "r"));
//    } else {
//        exec($cmd . " > /dev/null &");
//    }
//}
