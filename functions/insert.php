<?php
    function insert_image($user, $image)
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
        $sql = "INSERT INTO pictures (username, picture, Likes) VALUES ('$user', '$image', '0')";
        try {
            $conn->exec($sql);
        }
        catch (PDOException $e) {
            echo "Error: ".$e->getMesaage();
        }
        $conn = null;
        return (1); 
    }