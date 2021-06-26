<h1>Movie File</h1>
<div id="alertMessage" class="alert alert-danger" style="display: none;"></div>
<div class="uploader-container" id="uploadMovie">
    <div id="movieUpload" class="uploader" ondragleave="dragLeaveHandler(event);"
         ondrop="dropHandler(event);" ondragover="dragOverHandler(event);" data-title="Drop movie on me"></div>
    <div class="uploading" style="display: none;"><span>Uploading ...</span></div>
    <video onerror="console.log(event.target.error.code)" id="moviePreview" src="" style="display:none;" controls></video>
    <button type="button" id="removeMovie" onclick="removeContent();" style="display: none" class="close-video">
        <i class="fa fa-fw fa-trash-alt"></i>
    </button>
</div>

<form action="/action/admin/addNewMovie" onsubmit="checkValidMovieSubmission(this);" method="post" enctype="multipart/form-data">
    <input type="text" name="title" class="form-control" placeholder="Movie Title" required>
    <textarea name="description" class="form-control" id="" cols="30" rows="10" placeholder="Movie's description..."></textarea>
    <input type="file" accept="image/png, image/jpeg" class="form-control" name="thumbnail" required onchange="updateThumbnail(this)">
    <div id="thumbnailContainer" style="width: 244px; height: 364px; position: relative;"><img style='position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover' src="/img/thumbnail/movies/placeholder.thumb.jpg" alt="Please set an image."></div>
    <input type="date" name="upload" placeholder="Movie Publication Date" class="form-control">
    <button type="submit" class="btn btn-primary">Upload</button>
</form>


<script type="application/javascript">
    var isMovieLoaded = false;

    function dropHandler(ev) {
        // Clear messages and reset drag content
        var preview = $("#uploadMovie video");
        var closeBtn = $("#uploadMovie .close-video");
        var uploader = $("#uploadMovie .uploader");
        var alert = $("#alertMessage");
        var uploading = $("#uploadMovie .uploading");

        uploading.hide().find("span").html("Uploading ...");
        alert.hide();
        preview.hide();
        closeBtn.hide();
        uploader.removeClass("hover");

        // Prevent default behavior (Prevent file from being opened)
        ev.preventDefault();

        if (ev.dataTransfer.items && ev.dataTransfer.items[0]) {
            // If dropped item isn't a file, reject it
            if (ev.dataTransfer.items[0].kind === 'file') {
                var file = ev.dataTransfer.items[0].getAsFile();
                // Check file type is a video
                if (file.type === "video/mp4"
                    || file.type === "video/ogg"
                    || file.type === "video/webm") {
                    // Display "uploading" then show video
                    uploading.show();
                    uploader.hide();
                    var reader = new FileReader();

                    // Display upload percentage
                    reader.onprogress = function (e) {
                        // Translate bytes to percentage
                        var percentage = ((e.loaded / file.size) * 100).toFixed(2);
                        uploading.find("span").html("Uploading: " + percentage + "%");
                        console.log(e.loaded);
                    }

                    reader.onload = function (e) {
                        // Must use buffers as the user can upload large files
                        var buffer = e.target.result;
                        var videoBlob = new Blob([new Uint8Array(buffer)], {type: file.type})
                        var videoURL = window.URL.createObjectURL(videoBlob);
                        preview.attr("src", videoURL);
                        preview.show();
                        closeBtn.show();
                        uploader.hide();
                        uploading.hide();
                        var videoElement = document.getElementById('moviePreview');
                        videoElement.load();

                        isMovieLoaded = true;
                        console.log(videoURL);
                    }

                    reader.readAsArrayBuffer(file);

                } else {
                    displayMessage("#alertMessage", "Incorrect file type. Must be of type mp4, ogg, or webm");
                }
            } else {
                displayMessage("#alertMessage", "Incorrect file type or not a file. File must be of type mp4, ogg, or webm");
            }
        }
    }

    function removeContent() {
        $("#removeMovie").hide();
        $("#moviePreview").hide();
        $("#movieUpload").show();
        $("#movieUpload .uploading").hide();

        // Unload video
        var videoElement = document.getElementById('moviePreview');
        videoElement.pause();
        videoElement.removeAttribute('src'); // empty source
        videoElement.load();

        isMovieLoaded = false;
    }

    function dragOverHandler(ev) {
        $("#movieUpload").addClass("hover");
        // Prevent default behavior (Prevent file from being opened)
        ev.preventDefault();
    }

    function dragLeaveHandler(ev) {
        $("#movieUpload").removeClass("hover");
        ev.preventDefault();
    }

    function checkValidMovieSubmission(ele) {
        event.preventDefault();
        var form = $(ele);

        // Check that the movie is uploaded
        if(isMovieLoaded) {
            console.log("Movie loaded, uploading!");
            ele.submit();
        }
    }

    function updateThumbnail(ele) {
        if (ele.files && ele.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#thumbnailContainer').html("<img src='"+e.target.result+"' style='position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover'>");
            }
            reader.readAsDataURL(ele.files[0]); // convert to base64 string
        }
    }
</script>