<?php
    function change_comment_notification($comment_email, $username)
    {
        session_start();
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
            echo "Connection Failed: ".$error->getMessage();
            return (-1);
        }
        $sql = "UPDATE users SET comment_choice='$comment_email' WHERE username='$username'";
        try {
            $ex = $conn->prepare($sql);
            $ex->execute();
        }
        catch(PDOException $e) {
            echo $e->getMessage();
            return (0);
        }
        $conn = null;
        return (1);
    }
?>