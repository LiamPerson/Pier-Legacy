<?php
global $incFile;

$request = $_SERVER["REQUEST_URI"];
$slugs = array_filter(explode("/", $request));

$actionObj = "";
$actionFunction = "";

$ajax = "";
$ajaxFile = "";

$gotoLoc = "";

if (isset($slugs[1]) && !empty($slugs[1])) {
    if (isset($slugs[2]) && !empty($slugs[2])) {
        switch ($slugs[2]) {
            case "action":
                $actionObj = $slugs[2];
                if (isset($slugs[3]) && !empty($slugs[3]))
                    $actionFunction = $slugs[3];
                break;

            case "ajax":
                $ajax = $slugs[2];
                for ($i = 3; $i <= count($slugs); $i++) {
                    if (isset($slugs[$i]) && !empty($slugs[$i]))
                        $ajaxFile .= $slugs[$i];
                }
                break;

            default:
                for ($i = 2; $i <= count($slugs); $i++) {
                    if (isset($slugs[$i]) && !empty($slugs[$i]))
                        $gotoLoc .= $slugs[$i];
                }
                break;
        }

    }
}

//s($actionObj);
//s($actionFunction);
//s($ajax);
//s($ajaxFile);

$incFile = realpath("") . "/Templates/Pages/home.php";

//s($slugs);
//s($gotoLoc);

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