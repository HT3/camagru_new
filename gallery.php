<?php
    session_start();
    if ($_SESSION['username'] == "" || empty($_SESSION))
        echo '<script>alert("Please login first to access this page.");window.location.href="login.php";</script>';
?>
<html>
    <head>
        <title>Camagru</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./style/gallery.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>
    <body>
        <ul>
            <li><a class="active" href="./index.php">Camagru</a></li>
            <li><a href="./forgot_password.php">Forgot Password</a></li>
            <li><a href="./forgot_password.php">Account</a></li>
            <li><a href="./contact.html">Contact</a></li>
        </ul>
        <p>&nbsp;</p>
        <div class="whole">
        <?php
        include 'functions/images.php';
        $results = get_images();
        $pag = $_GET['pagination'];
        foreach($results as $key => $value) {
            if (($key >= ($pag * 5 - 5) && $key <($pag * 5)) || $pag == 0) {
                echo '<div class="loginbox">';
                echo '<div class="login">';
                echo '<h6>'.$value['username'].'  ID:'.$value['pic_id'].'</h6>';
                echo '<img src="'.$value['picture'].'"/>';
                echo '</div>';
                echo '<form action="functions/likes.php" method="POST">
                        <button type="submit" name="like_button" value= "'.$value['pic_id'].'"/><img class="like" src="images/like.png" style="width:20px;height:20px;">'; echo $value['Likes']; echo '</button>
                      </form>';
                echo '<form action="functions/delete_image.php" method="POST">
                        <input type=hidden name="true_username" value="'.$value['username'].'">
                        <button type="submit" name="delete_button" value="'.$value['pic_id'].'"/><img class="like" src="images/delete.png" style="width:20px;height:20px;"></button>
                      </form>
                      <form action="functions/comment.php" method="POST" target="'.$value['pic_id'].'">
                        <input type=hidden name="image" value="'.$value['pic_id'].'">
                        <input type=hidden name="username_image" value="'.$value['username'].'">
                        <button type="submit" name="comment_button" value="OK"/>><img class="like" src="images/comment.png" style="width:20px;height:20px;></button>
                      </form>
                      <iframe name="'.$value['pic_id'].'" width="90%" height="400px">Comments Not Working</iframe>';
                echo '</div>';
            }
        }
        ?>
        <canvas></canvas>
        </div>
        <p>&nbsp;</p>
        <div class="choice">
            1, 2, 3, 4, 5
        </div>
    </body>
</html>