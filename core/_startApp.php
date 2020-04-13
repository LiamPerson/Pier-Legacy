<?php
// Requires and Includes
require (realpath("") . "../config/config.php");
require (realpath("") . "../_functions.php");
require (realpath("") . "../core/kint.phar");
require_directory(realpath("") . "/objects");

// Define globals
global $db;
$db = new mysqli(IP_ADDRESS . ":" . PORT . "/" . DB_NAME, DB_USERNAME, DB_PASSWORD);

if($db->connect_error) {
    die("Connection to the mySQL server (mariaDB) failed: ". $db->connect_error. " ... This could be caused by not setting up your MariaDB, incorrect IP address or port, incorrect credentials, port in use for another application. Please check that you have set up your MariaDB correctly and that it is running.");
}
//echo "Connected successfully!";