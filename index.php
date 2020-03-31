<?php
?>


<head>
    <title>Pier</title>
    <link rel="stylesheet" href="dist/bootstrap-4.0.0-dist/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="dist/css/custom.css" type="text/css">
</head>
<script src="dist/bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>


<main class="container-fluid">
    <div class="d-flex align-items-center justify-content-center w-100 h-100">
        <div class="mw-50 text-center">
            <div class="form-group">
                <form action="" onsubmit="downloadVideo();">
                    <label for="downloadURL" class="h1 font-weight-bold">Download Media</label>
                    <div class="input-group">
                    <input type="text" id="downloadURL" class="form-control" value="" name="url" style="height: 50px" placeholder="https://www.youtube.com/watch?v=5IHWfgX3RJs">
                        <div class="input-group-append">
                            <select name="mediaType" id="mediaType">
                                <option value="mp4">MP4 (Video)</option>
                                <option value="mp3">MP3 (Music)</option>
                            </select>
                        </div>
                    </div>
                    <div class="alert alert-danger" style="display: none;" id="displayText"><small class="text-danger">Invalid URL</small></div>
                    <button type="submit" class="btn btn-primary btn-block" id="downloadButton">Download</button>
                </form>
            </div>
            <div class="form-group">
                <div id="showDownloadsContainer" style="display: none;">
                    <div class="d-flex justify-content-center">
                        <h5>Downloading...</h5>
                        <div class="loader" style="margin-left: 15px"></div>
                    </div>
                    <p><a target="_blank" href="youtubedl/">View downloaded media</a></p>
                </div>
                <a target="_blank" href="youtubedl/">Downloaded Videos</a>
                <div class="d-flex flex-wrap justify-content-between">
                    <a class="" target="_blank" href="movies/">🎥 Movies 🎥</a>
                    <a target="_blank" href="shows/">🎞️ Shows 🎞️</a>
                    <a class="" target="_blank" href="music/">🎵 Music 🎵</a>
                    <a target="_blank" href="flash/">🕹 Flash 🕹</a>
                    <a target="_blank" href="games/">🎮 Games 🎮</a>
                </div>
                <a target="_blank" href="shared/">Shared Files</a>
            </div>
        </div>
    </div>
</main>

<?php
?>

<script src="dist/js/jquery-3.4.1.min.js"></script>
<script src="dist/bootstrap-4.0.0-dist/js/popper.min.js"></script>

<script type="text/javascript">
    const displayText = $("#displayText");

    function downloadVideo() {
        displayText.hide();
        let dlButton = $("#downloadButton");
        let dlContainer = $("#showDownloadsContainer");
        event.preventDefault();
        let URLContainer = $("#downloadURL");
        let URL = URLContainer.val();
        // Check if URL is entered
        if (URL) {
            // Check if URL has proper
            // let URLEmbed = validateYouTubeUrl(URL);
            let URLEmbed = true;
            // console.log(URLEmbed);
            if (URLEmbed) {
                // validateUrl(URL).then(res => {
                //         console.log(res);
                //         //do something with the results
                //     }).catch({
                //     // log the error
                //     // console.log("error");
                // })
                dlButton.prop("disabled", true);
                dlContainer.slideDown();
                URLContainer.val("");
                $.ajax({
                    method: "POST",
                    url: "Ajax/download_video.php",
                    data: {url: URL}
                }).done(function (data) {
                    console.log(data);
                });

                // Enable the button again
                setTimeout(()=>{
                    dlButton.prop("disabled", false);
                    // errorText.hide();
                    displaySuccess("Media downloaded! ✔");
                    dlContainer.slideUp();
                }, 3000)

            } else {
                displayError("small").html("Invalid URL, video not found.");
                console.log("Invalid URL, no video found.");
            }
        } else {
            displayError("Invalid URL, no URL entered.");
            console.log("No url entered.");
        }

    }

    function displayError(msg) {
        displayText.removeClass("alert-success alert-info").addClass("alert-danger");
        displayText.children("small").removeClass("text-danger text-success text-info").addClass("text-danger");
        displayText.children("small").html(msg);
        displayText.show();
    }

    function displaySuccess(msg) {
        displayText.removeClass("alert-danger alert-info").addClass("alert-success");
        displayText.children("small").removeClass("text-danger text-success text-info").addClass("text-success");
        displayText.children("small").html(msg);
        displayText.show();
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
