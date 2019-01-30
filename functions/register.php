<?php
    function register($username, $email, $password)
    {
        session_start();
        $host = 'localhost';
        $user = 'root';
        $pass = 'qwerty1234';
        $db = 'db_camagru';
        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
        $ccode = hash('sha256', $username);
        $db_options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        try {
            $conn = new PDO($dsn, $user, $pass, $db_options);
        }
        catch(PDOException $error) {
            echo "Connection Failure: ".$err->getMessage();
            return (-1);
        }
        $sql = "INSERT INTO users (username, email, password, conf, conf_code) VALUES ('$username', '$email', '$password', '0', '$ccode')";

        try {
            $stmt = $conn->exec($sql);
        }
        catch(PDOException $e) {
            echo $e->getMessage();
            return (0);
        }
        if ($stmt == true) {
            $conn = null;
            return (1);
        }
        else
        {
            $conn = null;
            return (0);
        }
    }
?>