<?php
// Root Directory
//define("ROOT", "/var/www/html/"); // Linux Debian / Raspbian
define("ROOT", "D:/xampp/htdocs/Pier/"); // Windows D:/ XAMPP

// Your database's IP address relative to the database host
// (Most likely localhost)
define("IP_ADDRESS", "localhost");
// Your MariaDB's port. Default = 3306
define("PORT", "3306");

// Database definitions
define("DB_NAME","pier");
define("DB_USERNAME","root");
define("DB_PASSWORD","");



/* ### FILE LOCATIONS
 _____ _____ __    _____    __    _____ _____ _____ _____ _____ _____ _____ _____
|   __|     |  |  |   __|  |  |  |     |     |  _  |_   _|     |     |   | |   __|
|   __|-   -|  |__|   __|  |  |__|  |  |   --|     | | | |-   -|  |  | | | |__   |
|__|  |_____|_____|_____|  |_____|_____|_____|__|__| |_| |_____|_____|_|___|_____|
 */

// ### PHYSICAL STORAGE ###
define("STORAGE_DIR", "stored/");
// Movie storage
define("MOVIES_DIR", STORAGE_DIR . "movies/");
// Shows storage
define("SHOWS_DIR", STORAGE_DIR . "shows/");
// Music storage
define("MUSIC_DIR", STORAGE_DIR . "music/");
// Games storage
define("GAMES_DIR", STORAGE_DIR . "games/");
// YoutubeDL storage
define("DL_VIDEO_DIR", STORAGE_DIR . "downloads/youtubedl_video/");
define("DL_AUDIO_DIR", STORAGE_DIR . "downloads/youtubedl_audio/");

// ### IMAGES ###
define("IMG_DIR", "img/");
// Where to save downloaded video thumbnails in IMG_DIR
define("THUMBNAIL_DL_VIDEOS_DIR", IMG_DIR . "thumbnail/dl_videos/");
// Where to save downloaded video author thumbnails in IMG_DIR
define("THUMBNAIL_CREATOR_DIR", IMG_DIR . "thumbnail/creator/");
// Where movie poster thumbnails are located in IMG_DIR
define("THUMBNAIL_MOVIES_DIR", IMG_DIR . "thumbnail/movies/");