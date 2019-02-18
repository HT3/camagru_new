<?php
    session_start();
    $user = $_SESSION['username'];
    $image_id = $_POST['delete_button'];
    $true_username = $_POST['true_username'];
    if ($user != $true_username)
        echo('<script>alert("Not Yours, Cannot Delete");window.location.href="../gallery.php";</script>');
    else {
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
        $sql = "DELETE FROM pictures WHERE pic_id='$image_id'";
        try {
            $conn->exec($sql);
        }
        catch(PDOException $e) {
            echo $e->getMessage();
            return (0);
        }
        $conn = null;
        echo('<script>window.location.href="../gallery.php";</script>');
    }
?>