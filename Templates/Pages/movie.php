<?php
if (!isset($_GET["m"]) || empty($_GET["m"]))
    redirect("/");
$mInfo = Movies::_getInfo_FromID($_GET["m"]);
?>

<section>
    <div class="row mt-3">
        <div class="col-12">
            <div class="row">
                <?php absURI_to_relURI($mInfo["URI"]); ?>
                <video class="col-12" controls autoplay>
                    <source src="<?php echo $mInfo["URI"]; ?>" type="video/mp4">
                </video>
                <div class="col-12 mt-3">
                    <h1><?php echo $mInfo["name"] . " (" . string_to_year($mInfo["dateReleased"]) . ")"; ?></h1>
                    <p class="title-sub"><?php echo $mInfo["production"]; ?></p>
                    <p class="title-sub">Added: <?php echo strtodate($mInfo["dateAdded"]); ?></p>
                </div>
                <div class="col-12">
                    <p class="font-weight-bold">Description:</p>
                    <p><?php echo $mInfo["description"]; ?></p>
                </div>

            </div>
        </div>
    </div>
</section>
