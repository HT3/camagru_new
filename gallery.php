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
        <div class="choice">

        </div>
        <p>&nbsp;</p>
        <div class = "loginbox">
            <video id="video">Video No Work</video>
        </div>
    </body>
</html>