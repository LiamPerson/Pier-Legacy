<section class="gridSection">
    <h2 class="gridTitle">All Movies</h2>
    <div class="row">
        <?php
        $movies = Movies::_getLatestMovies(144);
        foreach ($movies as $movie) {
            ?>

            <div data-href="movie?m=<?php echo $movie["ID"]; ?>" class="col-xl-2 col-md-4 col-sm-6 movieThumbnail-main" onclick="goToHREF(this)">
                <div class="movieThumbnailContainer">
                    <div class="movieThumbnail-afterContainer">
                        <img src="<?php echo $movie["posterURI"] ?>" alt="Movie poster for: <?php echo $movie["title"]; ?>" class="movieThumbnail">
                        <time><?php echo seconds_to_timestamp($movie['length']); ?></time>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <h6 class="movieThumbnail-Title" title="<?php echo $movie["title"] . " (".string_to_year($movie["dateReleased"]).")"; ?>"><?php echo $movie["title"]; ?></h6>
                        <a href="#" class="movieThumbnail-CreatorName"><?php echo $movie['production']; ?></a>
                        <p class="movieThumbnail-AddedDate"><?php echo string_to_year($movie['dateReleased']); ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>