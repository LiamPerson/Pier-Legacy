<?php
// Get files from directory specified
$dir = $_GET["directory"]; // Symbolic Linked
$rootLength = strlen(ROOT);
if(empty($dir))
    $dir = '/';

consoleLog($dir);
?>

<div class="list-group mt-3">

    <?php
    // Make back button
    $finalSlash = strripos($dir, '/');
    $backOneDirectory = substr_replace($dir, "", $finalSlash);
    echo '<a class="list-group-item list-group-item-action" href="/admin/list-files-in-directory?directory=' . $backOneDirectory . '"><i class="fas fa-arrow-left"></i> Back</a>';


    // Each item
    $items = scandir($dir);
    foreach ($items as $item) {
        if ($item == '.' || $item == "..")
            continue;

        $extensionLocation = strripos($item, ".");
        if ($extensionLocation) {
            // Non-folders or directories
            $href = $dir . "/" . $item;
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
            if (is_link($dir . '/' . $item))
                echo '<a class="list-group-item item-link list-group-item-action" href="/admin/list-files-in-directory?directory=' . $dir . "%2F" . $item . '"><i class="fas fa-folder-plus"></i> ' . $item . '</a>';
            else
                echo '<a class="list-group-item item-link list-group-item-action" href="/admin/list-files-in-directory?directory=' . $dir . "%2F" . $item . '"><i class="fas fa-folder"></i> ' . $item . '</a>';
        }


    }
    ?>
</div>