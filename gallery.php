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
        <style>

        </style>
    </head>
    <body>
        <ul>
            <li><a class="active" href="./index.php">Camagru</a></li>
            <li><a href="./forgot_password.php">Forgot Password</a></li>
            <li><a href="./forgot_password.php">Account</a></li>
            <li><a href="./contact.html">Contact</a></li>
        </ul>
        <p>&nbsp;</p>
        <div id="main">
        <?php
        include 'functions/images.php';
        $results = get_images();
        foreach($results as $key => $value) {
            if (($key >= ($pag * 5 - 5) && $key <($pag * 5)) || $pag == 0) {
                echo '<div class="loginbox">';
                echo '<div class="whole">';
                echo '<h6>'.$value['username'].'  ID:'.$value['pic_id'].'</h6>';
                echo '<img src="'.$value['picture'].'"/>';
                echo '</div></br>';
                echo '<form action="functions/likes.php" method="POST">
                        <button type="submit" name="like_button" value= "'.$value['pic_id'].'"/><img src="images/like.png" style="width:20px;height:20px;">'; echo $value['Likes']; echo '</button>
                      </form>';
                echo '<form action="functions/delete_image.php" method="POST">
                        <input type=hidden name="true_username" value="'.$value['username'].'">
                        <button type="submit" name="delete_button" value="'.$value['pic_id'].'"/><img src="images/delete.png" style="width:20px;height:20px;"></button>
                      </form>
                      <form action="functions/insert_comments.php" method="POST">
                        <textarea type="text_area" id="comment" name="comment" class="comment"></textarea>
                        <input type="hidden" name="image_id" value="'.$_SESSION['pic_id'].'">
                        <button type="submit" name="comment_submit" id="comment_submit" value="" onclick="window.location.href=">Comment</button>
                    </form>';  
                echo '</div>';
                echo '<br/>';
                echo '<br/>';
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