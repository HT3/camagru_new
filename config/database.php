<?php
    $dsn = "mysql:host=localhost;charset=utf8mb4";
    $username = 'root';
    $pass = 'qwerty1234';
    $db = 'db_camagru';
    $db_options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    try 
    {
        $conn = new PDO($dsn, $username, $pass, $db_options);
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
?>