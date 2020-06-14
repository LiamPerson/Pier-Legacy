<?php
// Get files from directory specified
if(!isset($_GET["symLnk"]))
    $dir = $_GET["directory"]; // Symbolic Linked
else
    $dir = ROOT . $_GET["directory"]; // Directory

$rootLength = strlen(ROOT);
$localDir = substr($dir, $rootLength);

consoleLog($dir);
?>

<!--<form action="" method="get">-->
<!--    <label for="listFilesFromX">List Files From</label>-->
<!--    <input id="listFilesFromX" type="text" name="directory" class="form-control" placeholder="Directory to search">-->
<!--    <button type="submit" class="btn btn-primary">Search</button>-->
<!--</form>-->
<div class="list-group mt-3">

    <?php
    // Make back button
    if (!empty($localDir) && $dir != ROOT && $_GET["directory"] != "stored") {
        $finalSlash = strripos($localDir, '/');
        $backOneDirectory = substr_replace($localDir, "", $finalSlash);
        echo '<a class="list-group-item list-group-item-action" href="/admin/list-files-in-directory?directory=' . $backOneDirectory . '"><i class="fas fa-arrow-left"></i> Back</a>';
    }


    // Each item
    $items = scandir($dir);
    foreach ($items as $item) {
        if ($item == '.' || $item == "..")
            continue;

        $extensionLocation = strripos($item, ".");
        if ($extensionLocation) {
            // Non-folders or directories
            $href = '/' . $localDir . "/" . $item;
            $icon = '<i class="fas fa-file"></i>';
            switch (substr($item, $extensionLocation)) {
                // Videos
                case ".mp4":
                case ".webm":
                    $icon = '<i class="fas fa-play-circle"></i>';
                    break;

                // Audio
                case ".mp3":
                case ".wav":
                case ".ogg":
                    $icon = '<i class="fas fa-volume-up"></i>';
                    break;

            }
            echo '<a class="list-group-item item-link list-group-item-action" href="' . $href . '">' . $icon . ' ' . $item . '</a>';
        } else {
            // Folders / Directories / Symbolic Links
            $fullLocation = $dir.'/'.$item;
            if(is_link($fullLocation))
                echo '<a class="list-group-item item-link list-group-item-action" href="/admin/list-files-in-directory?directory=' . $dir . "%2F" . $item . '&symLnk=1"><i class="fas fa-folder-plus"></i> ' . $item . '</a>';
            else
                echo '<a class="list-group-item item-link list-group-item-action" href="/admin/list-files-in-directory?directory=' . $localDir . "%2F" . $item . '"><i class="fas fa-folder"></i> ' . $item . '</a>';
        }


    }
    ?>
</div>