<?php
//header("Content-Type: application/json");
//execInBackground("youtube-dl --config-location '/var/www/html/youtubedl' " . $_POST["url"]);
echo exec("youtube-dl --config-location '/var/www/html/youtubedl' " . $_POST["url"] . " > /dev/null &");

//function execInBackground($cmd)
//{
//    if (substr(php_uname(), 0, 7) == "Windows") {
//        pclose(popen("start /B " . $cmd, "r"));
//    } else {
//        exec($cmd . " > /dev/null &");
//    }
//}
