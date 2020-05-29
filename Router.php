<?php
global $incFile;

$request = $_SERVER["REQUEST_URI"];

$GETLoc = strpos($request, "?");
$reqGET = substr($request, $GETLoc);
if ($GETLoc)
    $reqStart = substr($request, 0, $GETLoc);
else
    $reqStart = substr($request, 0);


$slugs = array_filter(explode("/", $reqStart));


$actionObj = "";
$actionFunction = "";

$ajax = "";
$ajaxFile = "";

$gotoLoc = "";

if (isset($slugs[1]) && !empty($slugs[1])) {
    $routeType = $slugs[1];
    switch ($routeType) {
        case "action":
            if (isset($slugs[2]) && !empty($slugs[2]))
                $actionObj = ucfirst($slugs[2]) . "_Controller"; // The controller
            if (isset($slugs[3]) && !empty($slugs[3]))
                $actionFunction = $slugs[3]; // The function
            break;

        case "ajax":
            $ajax = $slugs[1];
            for ($i = 2; $i <= count($slugs); $i++) {
                if (isset($slugs[$i]) && !empty($slugs[$i]))
                    $ajaxFile .= $slugs[$i];
            }
            break;

        default:
            for ($i = 1; $i <= count($slugs); $i++) {
                if (isset($slugs[$i]) && !empty($slugs[$i]))
                    $gotoLoc .= $slugs[$i] . "/";
            }
            // Remove last '/'
            $finalSlash = strripos($gotoLoc, '/');
            $gotoLoc = substr_replace($gotoLoc, "", $finalSlash, 1);
            break;
    }
}

//s($slugs);
//s($actionObj);
//s($actionFunction);
//s($ajax);
//s($ajaxFile);

$incFile = realpath("") . "/Templates/Pages/home.php";

if (isset($gotoLoc) && !empty($gotoLoc)) {
    $incFile = "Templates/Pages/" . $gotoLoc . ".php";
}


if (!empty($actionObj) && !empty($actionFunction)) {
    // Include the controller
    $fp = realpath("") . "/controllers/" . $actionObj . ".php";
    s($fp);
    if (file_exists($fp)) {
        include($fp);
        // Go to controller and activate function
        $xObject = new $actionObj;
        $xObject->$actionFunction();
        exit();
    }

} else if (!empty($ajax) && !empty($ajaxFile)) {
    // Go to ajax folder and include ajax file
    $fp = realpath("") . "/Ajax/" . $ajaxFile . ".php";
    if (file_exists($fp)) {
        include($fp);
        exit();
    }
}

//s($slugs);