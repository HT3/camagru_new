<html>
    <head>
        <title>Camagru</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./style/ggallery.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <style>
        </style>
    </head>
    <body>
        <ul>
            <li><a class="active" href="./login.php">Camagru</a></li>
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
                echo '<br/>';
                echo '<br/>';
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
                <a href="ggallery.php?pagination=1">1</a>
                <a href="ggallery.php?pagination=2">2</a>
                <a href="ggallery.php?pagination=3">3</a>
                <a href="ggallery.php?pagination=4">4</a>
                <a href="ggallery.php?pagination=5">5</a>
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