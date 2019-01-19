<?php
    function login($username, $password)
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
        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $sql = "SELECT * FROM users WHERE email='$username' AND password='$password' AND conf='1'";
            try {
                $stmt = $conn->query($sql);
            }
            catch(PDOException $e) {
                echo $e->getMessage();
                return (0);
            }
            if ($stmt->rowCount() > 0)
            {
                $conn = null;
                return (1);
            }
            else
                $conn = null;
            return (0);
        }
        else {
            $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' AND conf='1'";
            try {
                $stmt = $conn->query($sql);
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
                return (0);
            }
            if ($stmt->rowCount() > 0)
            {
                $conn = null;
                return (1);
            }
            else
                $conn = null;
            return (0);
        }
    }
?>