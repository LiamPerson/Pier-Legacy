<?php
global $incFile;

$request = $_SERVER["REQUEST_URI"];

$GETLoc = strpos($request,"?");

$reqStart = substr($request, 0, $GETLoc);
$reqGET = substr($request, $GETLoc);

$slugs = array_filter(explode("/", $reqStart));


$actionObj = "";
$actionFunction = "";

$ajax = "";
$ajaxFile = "";

$gotoLoc = "";

if (isset($slugs[1]) && !empty($slugs[1])) {
    switch ($slugs[1]) {
        case "action":
            $actionObj = $slugs[1];
            if (isset($slugs[2]) && !empty($slugs[2]))
                $actionFunction = $slugs[2];
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
                    $gotoLoc .= $slugs[$i];
            }
            break;
    }

}

//s($actionObj);
//s($actionFunction);
//s($ajax);
//s($ajaxFile);

$incFile = realpath("") . "/Templates/Pages/home.php";


if(isset($gotoLoc) && !empty($gotoLoc)) {
    $incFile = "Templates/Pages/". $gotoLoc . ".php";
}


if (!empty($actionObj) && !empty($actionFunction)) {
    // Go to controller and activate function
    // @todo make this work

} else if (!empty($ajax) && !empty($ajaxFile)) {
    // Go to ajax folder and include ajax file
    $fp = realpath("") . "/Ajax/" . $ajaxFile . ".php";
    if (file_exists($fp)) {
        include($fp);
        exit();
    }
}

//s($slugs);