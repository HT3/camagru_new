<?php
    function get_comments($pic_id)
    {
        session_start();
        $host = 'localhost';
        $username = 'root';
        $password = 'qwerty1234';
        $db = 'db_camagru';
        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
        $db_options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        try {
            $conn = new PDO($dsn, $username, $password, $db_options);
        }
        catch(PDOException $error) {
            echo "Connection Failure: ".$error->getMessage();
            return (-1);
        }
        $sql = "SELECT * FROM comments WHERE picture_id='$pic_id'";
        $req = $conn->prepare($sql);
        $req->execute();
        if ($req->rowCount() > 0)
            return $req->fetchAll();
        else
            return (0);
    }
?>