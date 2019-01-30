<?php
    session_start();
    if ($_SESSION['username'] == "" || empty($_SESSION))
        echo '<script>alert("Please login first to access this page.");window.location.href="login.php";</script>';
    $time = $_SERVER['REQUEST_TIME'];
    $timeout_duration = 1800;
    if (isset($_SESSION['LAST_ACTIVITY']) && ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) 
    {
        session_unset();
        session_destroy();
        session_start();
    }
    $_SESSION['LAST_ACTIVITY'] = $time;
?>
<html>
    <head>
        <title>Camagru</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./style/index.css">
        <link rel="stylesheet" type="text/css" href="./webcam.js">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>
    <body>
        <ul>
            <li><a class="active" href="./index.php">Camagru</a></li>
            <li><a href="./gallery.php">Gallery</a></li>
            <li><a href="./forgot_password.php">Forgot Password</a></li>
            <li><a href="./forgot_password.php">Account</a></li>
            <li><a href="./contact.html">Contact</a></li>
        </ul>
        <p>&nbsp;</p>
        <div id="options" class="choice">
            <label for="cam_file">Input Method:</label>
            <select name="cam_file" id="cam_file">
                <option value="camera">Webcam</option>
                <option value="image_upload">Image Upload</option>
            </select>
        </div>
        <p>&nbsp;</p>
        <div id="camera" class="loginbox">
            <video id="video">Video No Work</video>
        </div>
        <p>&nbsp;</p>
        <div id="upload" class="loginbox">
            <img id="upload_image" alt="Please Upload An Image" class="photobooth"><br/>
            <input type="file" name="img_upload" id="img_upload">
        </div>
        <p>&nbsp;</p>
        <div class="box">
            <form id="export" action="functions/image_merge.php" method="POST">
                <input type="hidden" name="image_1" id="merged_image" value="">
                <input type="hidden" name="image_2" id="image_2" value="">
                <button type="submit" class="btn" name="exp_photo" id="export_photo" value="OK">Upload</button>
            </form>
        </div>
        <script>
            var width = 320;
            var height = 640;
            var stream = true;
            var video = document.getElementById('video');
            var canvas = document.getElementById('canvas');
            var photo = document.getElementById('photo');
            var start = document.getElementById('start');
            var cam = document.getElementById('cam');
            var cam_file_sel = document.getElementById('cam_file');
            var test = document.getElementById('test');
            document.querySelector('#sticker_image').src = document.getElementById('sticker_select').value;
            document.getElementById('image_upload').hidden = true;
            var img2 = document.getElementById('sticker_image');
            var image2 = document.getElementById('image_2');

                navigator.mediaDevices.getUserMedia({
                    video: true,
                    audio: false
                })
                .then(function(stream) {
                    video.srcObject = stream;
                    video.play();
                })
                .catch(function(err) {
                    console.log("Error: " + err);
                })
                video.addEventListener('canplay', function(ev) {
                    if (!streaming) {
                        height = video.videoHeight / (video.videoWidth / width);

                        video.setAttribute('width', 320);
                        video.setAttribute('height', 320);
                        canvas.setAttribute('width', width);
                        canvas.setAttribute('height', height);
                        streaming = true;
                    }
                }, false);

                function web_upload() {
                    if (cam_file_sel.value == "file") {
                        document.getElementById('camera').hidden = true;
                        document.getElementById('image_upload').hidden = false;
                    }
                    else {
                        document.getElementById('camera').hidden = false;
                        document.getElementById('image_upload').hidden = true;
                    }
                }

                setInterval(web_upload(),300);

                
                function takepicture() {
                    var exportBtn = document.getElementById('export');
                    image2.value = img2.src;
                    exportBtn.style.display = 'block';
                    if (cam_file_sel.value == "camera") {
                        var context = canvas.getContext('2d');
                        if (width && height) {
                            canvas.width = width;
                            canvas.height = height;
                            context.drawImage(video, 0, 0, width, height);
                            var data = canvas.toDataURL();
                            document.getElementById('merged_image').value = data;
                        }
                    }
                    else if (cam_file_sel.value == "file") {
                        var context = canvas.getContext('2d');
                        if (width && height) {
                            canvas.width = width;
                            canvas.height = height;
                            var img = document.getElementById('upload_image');
                            context.drawImage(img, 0, 0, width, height);
                            var data = canvas.toDataURL();
                            document.getElementById('merged_image').value = data;
                        }
                    }
                    else {
                        clearphoto();
                    }
                }
                
                function clearphoto() {
                        var context = canvas.getContext('2d');
                        context.fillStyle = "#AAA";
                        context.fillRect(0, 0, canvas.width, canvas.height);
                        var data = canvas.toDataURL('image/png');
                        photo.setAttribute('src', data);
                    }
                    start.addEventListener('click', function(ev) {
                        takepicture();
                        ev.preventDefault();
                    }, false);
                    cam_file_sel.addEventListener('change', function() {
                        if (cam_file_sel.value == "file") {
                            document.getElementById('camera').hidden = true;
                            document.getElementById('image_upload').hidden = true;
                        }
                    }, false);

                    document.querySelector('#img_upload').addEventListener('change', function() {
                        if (this.files.length === 0)
                            return;
                        var file = this.files[0];
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            document.querySelector('#upload_image').src = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }, false);


                document.querySelector('#sticker_select').addEventListener('change', function() {
                    document.querySelector('#sticker_image').src = document.getElementById('sticker_select').value;
                    var reader = new FileReader();
                }, false)
        </script>
    </body>
</html>