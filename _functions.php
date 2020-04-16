<?php

function require_directory($path) {
    $files = glob($path . "/*.php"); // return array files
    $dirs = glob( $path . "/*", GLOB_ONLYDIR); // return array files

    foreach ($files as $phpFile) {
        require_once("$phpFile");
    }

    foreach ($dirs as $dir) {
        $dir_files = glob($dir . "/*.php"); // return array files
        foreach ($dir_files as $phpFile) {
            require_once("$phpFile");
        }
    }
}

function include_directory($path) {
    $files = glob($path . "/*.php"); // return array files
    $dirs = glob( $path . "/*", GLOB_ONLYDIR); // return array files

    foreach ($files as $phpFile) {
        include("$phpFile");
    }

    foreach ($dirs as $dir) {
        $dir_files = glob($dir . "/*.php"); // return array files
        foreach ($dir_files as $phpFile) {
            include("$phpFile");
        }
    }
}

