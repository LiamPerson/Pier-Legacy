
<h1 class="mt-3">Movie File</h1>
<div id="alertMessage" class="alert alert-danger" style="display: none;"></div>
<div class="uploader-container mb-3" id="uploadMovie">
    <div id="movieUpload" class="uploader" ondragleave="dragLeaveHandler(event);"
         ondrop="dropHandler(event);" ondragover="dragOverHandler(event);" data-title="Drop movie on me"></div>
    <div class="uploading" style="display: none;"><span>Uploading ...</span></div>
    <video onerror="console.log(event.target.error.code)" id="moviePreview" src="" style="display:none;" controls></video>
    <button type="button" id="removeMovie" onclick="removeContent();" style="display: none" class="close-video">
        <i class="fa fa-fw fa-trash-alt"></i>
    </button>
</div>

<form action="/action/admin/addNewMovie" onsubmit="checkValidMovieSubmission(this);" method="post" enctype="multipart/form-data">

    <!--Metadata-->
    <input type="hidden" id="addMovie_width" name="video_width" value="">
    <input type="hidden" id="addMovie_height" name="video_height" value="">
    <input type="hidden" id="addMovie_thumbnail_filetype" name="thumbnail_type" value="">
    <input type="hidden" id="addMovie_movie_filetype" name="movie_type" value="">
    <input type="hidden" id="addMovie_movie_length" name="movie_length" value="">

    <!--Movie Title-->
    <div class="form-group">
        <label for="addMovie_title">Title</label>
        <input id="addMovie_title" type="text" name="title" class="form-control" placeholder="Movie Title" required>
    </div>

    <!--Movie Description-->
    <div class="form-group">
        <label for="addMovie_description">Description</label>
        <textarea name="description" class="form-control" id="addMovie_description" cols="30" rows="10" placeholder="Movie's description..."></textarea>
    </div>

    <!--Movie Genre-->
    <div class="form-group">
        <label for="addMovie_genre">Genre</label>
        <select name="genre" id="addMovie_genre">
            <option selected value="Action">Action</option>
            <option value="Horror">Horror</option>
            <option value="Crime">Crime</option>
            <option value="Adventure">Adventure</option>
            <option value="Art">Art/Experimental</option>
        </select>
    </div>

    <!--Movie Language-->
    <div class="form-group">
        <label for="addMovie_language">Spoken Language</label>
        <select name="language" id="addMovie_language">
            <option selected value="English">English</option>
            <option value="Chinese">Chinese</option>
            <option value="Japanese">Japanese</option>
        </select>
    </div>

    <!--Movie Subtitle Language-->
    <div class="form-group">
        <label for="addMovie_subtitle">Subtitle Language</label>
        <select name="subtitle" id="addMovie_subtitle">
            <option selected value="None">No subtitles.</option>
            <option value="English">English</option>
            <option value="Chinese">Chinese</option>
            <option value="Japanese">Japanese</option>
        </select>
    </div>

    <!--Thumbnail Image-->
    <div class="form-group">
        <label>Thumbnail</label>
        <input type="file" accept="image/png, image/jpeg" class="form-control" name="thumbnail" required onchange="updateThumbnail(this)">
        <div id="thumbnailContainer" style="width: 244px; height: 364px; position: relative;"><img style='position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover' src="/img/thumbnail/movies/placeholder.thumb.jpg" alt="Please set an image."></div>
    </div>

    <!--Movie Release Date-->
    <div class="form-group">
        <label for="addMovie_publicationDate">Release Date</label>
    <input type="date" id="addMovie_publicationDate" name="release_date" placeholder="Movie Publication Date" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Upload</button>
</form>

<div id="addMovie_response" style="display: none;">
    <h1>Response:</h1>
    <pre></pre>
</div>



<script type="application/javascript">
    var MovieBlob = null;

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
                $("#addMovie_movie_filetype").val(file.type);

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
                        MovieBlob = new Blob([new Uint8Array(buffer)], {type: file.type})
                        var videoURL = window.URL.createObjectURL(MovieBlob);
                        preview.attr("src", videoURL);
                        preview.show();

                        // Log video metadata
                        preview.get(0).addEventListener("loadedmetadata", function (e) {
                            $("#addMovie_width").val(preview.get(0).videoWidth);
                            $("#addMovie_height").val(preview.get(0).videoHeight);
                            $("#addMovie_movie_length").val(preview.get(0).duration);
                        });

                        closeBtn.show();
                        uploader.hide();
                        uploading.hide();
                        var videoElement = document.getElementById('moviePreview');
                        videoElement.load();
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

        MovieBlob = false;
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
        if (MovieBlob) {
            console.log("Movie loaded, uploading!");

            // Create form data to append movie to.
            let formData = new FormData(ele);
            formData.append("movie_file", MovieBlob);
            console.log("Sending the following form data: ", formData);

            // Send the data using XMLHttpRequest
            var XHR = new XMLHttpRequest();
            XHR.open("POST", ele.action, true);
            XHR.onload = function (XHREvent) {

                // Log response
                console.log(XHREvent.srcElement.response); // This is the PHP response.
                const responseContainer = $("#addMovie_response");
                responseContainer.show();
                responseContainer.children("pre").html(XHREvent.srcElement.response);
                if(XHR.status == 200) {
                    console.log("Upload complete!");
                } else {
                    console.log("An error has occurred while uploading. Error code: " + XHR.status);
                }

            }
            XHR.send(formData);

            // ele.submit(); Don't submit this
        }
    }

    function updateThumbnail(ele) {
        if (ele.files && ele.files[0]) {

            // Log thumbnail filetype in Metadata of form
            $("#addMovie_thumbnail_filetype").val(ele.files[0].type);

            var reader = new FileReader();
            reader.onload = function (e) {
                $('#thumbnailContainer').html("<img src='" + e.target.result + "' style='position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover'>");
            }
            reader.readAsDataURL(ele.files[0]); // convert to base64 string
        }
    }
</script>