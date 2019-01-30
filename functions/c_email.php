<?php
    function change_email($username, $new_email, $password)
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
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        try {
            $conn->query($sql);
        }
        catch(PDOException $e) {
            echo $e->getMessage();
            return (0);
        }
        $sql1 = "UPDATE users SET email='$new_email' WHERE username='$username' AND password='$password'";
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