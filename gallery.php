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
            <li><a href="./account.php">Account</a></li>
            <li><a href="functions/logout.php">Logout</a></li>
            <li><a href="./contact.html">Contact</a></li>
        </ul>
        <p>&nbsp;</p>
        <div id="main">
        <?php
        include 'functions/images.php';
        include 'functions/get_comments.php';
        $pag = $_GET['pagination'];
        $results = get_images();
        foreach($results as $key => $value) {
            if (($key >= ($pag * 5 - 5) && $key < ($pag * 5)) || $pag == 0) {
                echo '<div class="next">';
                echo '<div class="loginbox">';
                echo '<div class="whole">';
                echo '<h6>'.$value['username'].'  ID:'.$value['pic_id'].'</h6>';
                echo '<img src="'.$value['picture'].'"/>';
                echo '<form action="functions/likes.php" method="POST">
                        <button type="submit" name="like_button" value= "'.$value['pic_id'].'"/><img src="images/like.png" style="width:20px;height:20px;">'; echo $value['Likes']; echo '</button>
                      </form>';
                echo '<form action="functions/delete_image.php" method="POST">
                        <input type=hidden name="true_username" value="'.$value['username'].'">
                        <button type="submit" name="delete_button" value="'.$value['pic_id'].'"/><img src="images/delete.png" style="width:20px;height:20px;"></button>
                      </form>
                      <form action="functions/insert_comments.php" method="POST">
                        <textarea type="text_area" id="comment" name="comment" class="comment"></textarea>
                        <input type="hidden" name="image_id" value="'.$value['pic_id'].'">
                        <button type="submit" name="comment_submit" id="comment_submit" value="">Comment</button>
                    </form>';
                echo '<br/>';
                echo '<br/>';
                $result = get_comments($value['pic_id']);
                echo '<div class="scroll">';
                foreach ($result as $t){
                    echo '<div class="comment_box">';
                        echo '<h6>'.$t['username'].':'.$t['comment'].'</h6>';
                    echo '</div>';
                }
                echo '</div>';
                echo '</div><br/>';
                echo '</div>';
                echo '</div>';
            }
        }
        ?>
        </div>
        <p>&nbsp;</p>
        <form action="gallery.php" method="POST">
            <label for="pagination">Page</label>
            <div class="choice">
                <a href="gallery.php?pagination=1">1</a>
                <a href="gallery.php?pagination=2">2</a>
                <a href="gallery.php?pagination=3">3</a>
                <a href="gallery.php?pagination=4">4</a>
                <a href="gallery.php?pagination=5">5</a>
            </div>
            <script>
                document.getElementById('pagination').addEventListener("change", function() {
                    document.getElementById('page').submit();
                    document.getElementById('pagination').selectedIndex = "2";
                }, false);
            </script>
        </form>
    </body>
</html>