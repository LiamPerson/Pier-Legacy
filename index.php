<?php
?>


<head>
    <title>Test page</title>
    <link rel="stylesheet" href="dist/bootstrap-4.0.0-dist/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="dist/css/custom.css" type="text/css">
</head>
<script src="dist/bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>


<main class="container-fluid">
    <div class="d-flex align-items-center justify-content-center w-100 h-100">
        <div class=" w-50 text-center">
            <div class="form-group">
                <form action="" onsubmit="downloadVideo();">
                    <label for="downloadURL" class="h1 font-weight-bold">Download Youtube Videos</label>
                    <input type="text" id="downloadURL" class="form-control" value="" name="url" style="height: 50px" placeholder="https://www.youtube.com/watch?v=5IHWfgX3RJs">
                    <button type="submit" class="btn btn-primary btn-block">Download</button>
                </form>
            </div>
            <div class="form-group">
                <div id="showDownloadsContainer" style="display: none;">
                    <h1>Video downloading... <div class="loader"></div></h1>
                    <p><a target="_blank" href="youtubedl/">View downloaded videos</a></p>
                </div>
                <a target="_blank" href="youtubedl/">Downloaded Videos</a>
            </div>
        </div>
    </div>
</main>

<?php
?>

<script src="dist/js/jquery-3.4.1.min.js"></script>
<script src="dist/bootstrap-4.0.0-dist/js/popper.min.js"></script>

<script type="text/javascript">
    function downloadVideo() {
        event.preventDefault();
        let URL = $("#downloadURL").val();
        // Check if URL is entered
        if (URL) {
            // Check if URL has proper
            // let URLEmbed = validateYouTubeUrl(URL);
            let URLEmbed = true;
            console.log(URLEmbed);
            if (URLEmbed) {
                // validateUrl(URL).then(res => {
                //         console.log(res);
                //         //do something with the results
                //     }).catch({
                //     // log the error
                //     // console.log("error");
                // })
                $("showDownloadsContainer").show();
                $.ajax({
                    method: "POST",
                    url: "Ajax/download_video",
                    data: {url: URL}
                }).done(function (data) {
                    console.log(data);
                });

            } else {
                console.log("Invalid URL, no video found.");
            }
            // console.log(URL.indexOf("?v="));
            // console.log(URL);
        } else {
            console.log("No url entered.");
        }

    }

    function validateYouTubeUrl(url) {
        if (url !== undefined || url !== '') {
            var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
            var match = url.match(regExp);
            if (match && match[2].length === 11) {
                // Do anything for being valid
                return 'https://www.youtube.com/embed/' + match[2];

                // if need to change the url to embed url then use below line
                // $('#ytplayerSide').attr('src', 'https://www.youtube.com/embed/' + match[2] + '?autoplay=0');
            } else {
                // Do anything for not being valid
                return false;
            }
        }
    }
</script>
