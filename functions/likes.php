<?php
    session_start();
    $image_id = $_POST['like_button'];
    $host = 'localhost';
    $user = 'root';
    $pass = 'qwerty1234';
    $db = 'db_camagru';
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
    $db_options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    try {
        $conn = new PDO($dsn, $user, $pass, $db_options);
    }
    catch(PDOException $error) {
        echo "Connection Failure: ".$error->getMessage();
        return (-1);
    }
    $sql1 = "UPDATE pictures SET Likes = Likes+1 WHERE pic_id='$image_id'";
    try {
        $conn->exec($sql1);
    }
    catch(PDOException $e) {
        echo $e->getMessage();
        return (0);
    }
    $conn = null;
    echo '<script>window.location.href="../gallery.php";</script>';
?>