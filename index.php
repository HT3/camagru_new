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
        <div id="upload" class="loginbox">
            <img id="upload_image" alt="Please Upload An Image" class="photobooth"><br/>
            <input type="file" name="img_upload" id="img_upload">
        </div>
        <script src="./camera.js"></script>
    </body>
</html>