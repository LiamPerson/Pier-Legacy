<?php
if (!isset($_GET["v"]) || empty($_GET["v"]))
    redirect("/");
$vInfo = DL_Videos::_getInfo_FromID($_GET["v"]);
$vidCreator = DL_Videos::_getCreatorInfo_byCreatorID($vInfo["creatorID"]);
?>

<section>
    <div class="row mt-3">
        <div class="col-xl-9">
            <div class="row">
                <?php absURI_to_relURI($vInfo["URI"]); ?>
                <video class="col-12 p-0" controls autoplay>
                    <source src="<?php echo $vInfo["URI"]; ?>" type="video/mp4">
                </video>
                <div class="col-12 mt-3">
                    <h1><?php echo $vInfo["title"]; ?></h1>
                    <p class="title-sub">Added: <?php echo strtodate($vInfo["dateAdded"]); ?></p>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center">
                            <div class="pl-1x mr-3">
                                <img src="<?php echo $vidCreator["thumbnailURI"]; ?>" class="creatorThumbnail" alt="Thumbnail for <?php echo $vidCreator["name"]; ?>">
                            </div>
                            <p class="mb-0"><strong><?php echo $vidCreator["name"]; ?> </strong><br> <span class="font-weight-light"><?php echo strtodate($vInfo["dateUploaded"]); ?></span></p>
                        </div>
                        <p class="descriptionOffset"><?php echo $vInfo["description"]; ?></p>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-xl-3">
                <?php
                $dlVids = DL_Videos::_getLatestVideos();
                foreach ($dlVids as $vid) {
                    $vidCreator = DL_Videos::_getCreatorInfo_byCreatorID($vid["creatorID"]);
                    ?>
                    <div data-href="watch?v=<?php echo $vid["ID"]; ?>" class="row mb-1 videoThumbnail-main" onclick="goToHREF(this);">
                        <div class="col-6">
                            <div class="videoThumbnailContainer">
                                <div class="videoThumbnail-afterContainer">
                                    <img src="<?php echo $vid["thumbnailURI"]; ?>" class="videoThumbnail" alt="Thumbnail for video: <?php echo $vid["title"]; ?>">
                                    <time><?php echo seconds_to_timestamp($vid["length"]); ?></time>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <h6 class="videoThumbnail-Title" title="<?php echo $vid["title"]; ?>"><?php echo shortenString($vid["title"],40); ?></h6>
                            <a href="#" class="videoThumbnail-CreatorName"><?php echo $vidCreator["name"]; ?></a>
                            <p class="videoThumbnail-AddedDate"><?php echo time_ago($vid["dateAdded"]); ?></p>
                        </div>
                    </div>
                <?php } ?>
        </div>
    </div>
</section>
