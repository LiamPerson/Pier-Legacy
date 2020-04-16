<?php

function require_directory($path) {
    $files = glob($path . "/*.php"); // return array files
    $dirs = glob($path . "/*", GLOB_ONLYDIR); // return array files

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
    $dirs = glob($path . "/*", GLOB_ONLYDIR); // return array files

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

function seconds_to_timestamp($s): string {
    $timestamp = gmdate("H:i:s", $s);
    while (substr($timestamp, 0, 2) == "00")
        $timestamp = substr($timestamp, 3);
    return $timestamp;
}

function string_to_timestamp($s): string {
    return date("Y-m-d H:i:s", strtotime($s));
}

function time_ago($datetime, $max_units = 1) {
    $i = 0;
    $distant_timestamp = strtotime($datetime);
    $time = time() - $distant_timestamp;
    $tokens = [
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    ];

    $responses = [];
    while ($i < $max_units && $time > 0) {
        foreach ($tokens as $unit => $text) {
            if ($time < $unit) {
                continue;
            }
            $i++;
            $numberOfUnits = floor($time / $unit);

            $responses[] = $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '');
            $time -= ($unit * $numberOfUnits);
            break;
        }
    }

    if (!empty($responses)) {
        return implode(', ', $responses) . ' ago';
    }

    return 'Just now';
}

function redirect($url = null): void {
    if (!$url)
        $url = $_SERVER["HTTP_REFERER"];
    header("Location: " . $url);
}