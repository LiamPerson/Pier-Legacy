<?php
// Requires and Includes
require (realpath("") . "/config/config.php");
require (realpath("") . "/_functions.php");
require (realpath("") . "/core/kint.phar");
require_directory(realpath("") . "/objects");

// Define globals
global $db;
$db = new Database();

// Always have this last!!!
require (realpath("") . "/Router.php");
