<?php
    function get_images()
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
            echo "Connection Error: ".$error->getMessage();
            return (-1);
        }
        $sql = "SELECT * FROM pictures ORDER BY pic_id desc";
        $req = $conn->prepare($sql);
        $req->execute();
        if ($req->rowCount() > 0)
            return $req->fetchAll();
        else
            return (0);
    }
?>