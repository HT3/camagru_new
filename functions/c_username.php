<?php
    function change_username($old_username, $password, $new_username)
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
            echo "Connection Failure: ".$error->getMessage();
            return (-1);
        }
        $sql = "SELECT * FROM users WHERE username='$old_username' AND password='$password'";
        try {
            $conn->query();
        }
        catch(PDOException $e) {
            echo $e->getMessage();
            return (0);
        }
        $sql1 = "UPDATE users SET username='$new_username' WHERE username='$old_username'";
        try {
            $ex = $conn->prepare($sql1);
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