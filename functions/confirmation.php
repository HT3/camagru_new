<?php
    session_start();
    $passkey = $_GET['passkey'];
    $host = 'localhost';
    $username = 'root';
    $password = 'qwerty1234';
    $db = 'db_camagru';
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
    $db_options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    try
    {
        $conn = new PDO($dsn, $username, $password, $db_options);
    }
    catch(PDOException $err)
    {
        echo "Connection Failed: ".$err->getMessage();
        return (-1);
    }
    $sql = "SELECT * FROM users WHERE conf_code='$passkey'";
    try
    {
        $stmt = $conn->query($sql);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
        return ;
    }
    if ($stmt->rowCount() > 0)
    {
        $sql1 = "UPDATE users SET conf='1' WHERE conf_code='$passkey'";
        try {
            $ex = $conn->prepare($sql1);
            $ex->execute();
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
            return ;
        }
        echo('<script>alert("Account Confirmed");window.location.href="../login.php";</script>');
    }
    else
    {
        $conn = null;
        echo('<script>alert("Account not Confirmed. Please try again.");window.location.href="../register.php";</script>');
    }
    $conn = null;
?>