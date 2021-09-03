<section class="gridSection">
    <h2 class="gridTitle">All Videos</h2>
    <div class="row">
        <?php
        $dlVids = DL_Videos::_getLatestVideos(144);
        foreach ($dlVids as $vid) {
            $vidCreator = DL_Videos::_getCreatorInfo_byCreatorID($vid["creatorID"]);
            ?>
            <div data-href="watch?v=<?php echo $vid["ID"]; ?>" class="col-md-6 col-xl-3 videoThumbnail-main" onclick="goToHREF(this);">
                <div class="videoThumbnailContainer">
                    <div class="videoThumbnail-afterContainer">
                        <img src="<?php echo $vid["thumbnailURI"]; ?>" class="videoThumbnail" alt="Thumbnail for video: <?php echo $vid["title"]; ?>">
                        <time><?php echo seconds_to_timestamp($vid["length"]); ?></time>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="pl-1x">
                        <img src="<?php echo $vidCreator["thumbnailURI"]; ?>" class="creatorThumbnail" alt="Thumbnail for <?php echo $vidCreator["name"]; ?>">
                    </div>
                    <div class="col">
                        <h6 class="videoThumbnail-Title" title="<?php echo $vid["title"]; ?>"><?php echo $vid["title"]; ?></h6>
                        <a href="#" class="videoThumbnail-CreatorName"><?php echo $vidCreator["name"]; ?></a>
                        <p class="videoThumbnail-AddedDate"><?php echo time_ago($vid["dateAdded"]); ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
