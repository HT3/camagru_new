<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <style>
            .comment_box {
                background: #fff;
            }
        </style>
    </head>
    <body>
        <h1>Comments</h1>
        <?php
            include 'get_comments.php';
            session_start();
            if (empty($_POST['image']) == false || empty($_POST['username_image']) == false){
                $_SESSION['pic_id'] = $_POST['image'];
                $_SESSION['user_image'] = $_POST['username_image'];
            }
            $results = get_comments($_SESSION['pic_id']);
            foreach ($results as $t){
                echo '<div class="comment_box">';
                echo  '<h3>'.$t['username'].'</h3>';
                echo '<p class="comment">'.$t['comment'].'</p>';
                echo '</div>';
            }
        ?>
        
    </body>
</html>