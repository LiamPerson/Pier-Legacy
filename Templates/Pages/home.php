<!--Videos-->
<section class="gridSection">
    <h2 class="gridTitle">Latest Videos</h2>
    <div class="row">
        <?php
        $dlVids = DL_Videos::_getLatestVideos();
        foreach ($dlVids as $vid) {
            $vidCreator = DL_Videos::_getCreatorInfo_byCreatorID($vid["creatorID"]);
            ?>
            <div data-href="#" class="col-md-6 col-xl-3 videoThumbnail-main">
                <div class="videoThumbnailContainer">
                    <div class="videoThumbnail-afterContainer">
                        <img src="<?php echo $vid["thumbnailURI"]; ?>" class="videoThumbnail" alt="Thumbnail for video: <?php echo $vid["name"]; ?>">
                        <time><?php echo $vid["length"]; ?></time>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="pl-1x">
                        <img src="<?php echo $vidCreator["thumbnailURI"]; ?>" class="creatorThumbnail" alt="Thumbnail for <?php echo $vidCreator["name"]; ?>">
                    </div>
                    <div class="col">
                        <h6 class="videoThumbnail-Title" title="<?php echo $vid["name"]; ?>"><?php echo $vid["name"]; ?></h6>
                        <a href="#" class="videoThumbnail-CreatorName"><?php echo $vidCreator["name"]; ?></a>
                        <p class="videoThumbnail-AddedDate"><?php echo time_ago($vid["dateAdded"]); ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<!--Movies-->
<section class="gridSection">
    <h2 class="gridTitle">Latest Movies</h2>
    <div class="row">
        <?php //@todo proceedurally generate up to 12 movies    ?>


        <div data-href="#" class="col-md-3 videoThumbnail-main">
            <div class="videoThumbnailContainer">
                <div class="videoThumbnail-afterContainer">
                    <img src="img/thumbnail/dl_videos/0.jpg" class="videoThumbnail" alt="">
                    <time>1:24:28</time>
                </div>
            </div>
            <div class="row mt-3">
                <div class="pl-1x">
                    <img src="img/thumbnail/creator/unnamed.jpg" class="creatorThumbnail" alt="">
                </div>
                <div class="col">
                    <h6 class="videoThumbnail-Title" title="Ｈ Ｏ Ｕ Ｓ Ｅ 6 (Lo-Fi House Mix)">Ｈ Ｏ Ｕ Ｓ Ｅ 6 (Lo-Fi House Mix)</h6>
                    <a href="#" class="videoThumbnail-CreatorName">Kiffen Beats</a>
                    <p class="videoThumbnail-AddedDate">12 hours ago</p>
                </div>
            </div>
        </div>

    </div>
</section>

<!--Shows-->
<section class="gridSection">
    <h2 class="gridTitle">Latest Shows</h2>
    <div class="row">
        <?php //@todo proceedurally generate up to 12 videos    ?>


        <div data-href="#" class="col-md-3 videoThumbnail-main">
            <div class="videoThumbnailContainer">
                <div class="videoThumbnail-afterContainer">
                    <img src="img/thumbnail/dl_videos/0.jpg" class="videoThumbnail" alt="">
                    <time>1:24:28</time>
                </div>
            </div>
            <div class="row mt-3">
                <div class="pl-1x">
                    <img src="img/thumbnail/creator/unnamed.jpg" class="creatorThumbnail" alt="">
                </div>
                <div class="col">
                    <h6 class="videoThumbnail-Title" title="Ｈ Ｏ Ｕ Ｓ Ｅ 6 (Lo-Fi House Mix)">Ｈ Ｏ Ｕ Ｓ Ｅ 6 (Lo-Fi House Mix)</h6>
                    <a href="#" class="videoThumbnail-CreatorName">Kiffen Beats</a>
                    <p class="videoThumbnail-AddedDate">12 hours ago</p>
                </div>
            </div>
        </div>

    </div>
</section>

<!--Music-->
<section class="gridSection">
    <h2 class="gridTitle">Latest Music</h2>
    <div class="row">
        <?php //@todo proceedurally generate up to 12 videos    ?>


        <div data-href="#" class="col-md-3 videoThumbnail-main">
            <div class="videoThumbnailContainer">
                <div class="videoThumbnail-afterContainer">
                    <img src="img/thumbnail/dl_videos/0.jpg" class="videoThumbnail" alt="">
                    <time>1:24:28</time>
                </div>
            </div>
            <div class="row mt-3">
                <div class="pl-1x">
                    <img src="img/thumbnail/creator/unnamed.jpg" class="creatorThumbnail" alt="">
                </div>
                <div class="col">
                    <h6 class="videoThumbnail-Title" title="Ｈ Ｏ Ｕ Ｓ Ｅ 6 (Lo-Fi House Mix)">Ｈ Ｏ Ｕ Ｓ Ｅ 6 (Lo-Fi House Mix)</h6>
                    <a href="#" class="videoThumbnail-CreatorName">Kiffen Beats</a>
                    <p class="videoThumbnail-AddedDate">12 hours ago</p>
                </div>
            </div>
        </div>

    </div>
</section>