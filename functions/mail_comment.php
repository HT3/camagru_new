<?php
    function mail_comment($user, $username, $comment, $pic_id)
    {
        session_start();
        $host = 'localhost';
        $usa = 'root';
        $password = 'qwerty1234';
        $db = 'db_camagru';
        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
        $db_options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        try {
            $conn = new PDO($dsn, $usa, $password, $db_options);
        }
        catch(PDOException $error) {
            echo "Connection Failure: ".$error->getMessage();
            return (-1);
        }
        $sql = "SELECT * FROM users WHERE username='$user'";
        try {
            $stmt = $conn->prepare($sql);
            $stmt->exec();
        }
        catch (PDOException $error) {
            echo "Error: ".$err->getMessage();
            return (0);
        }
        if ($stmt->rowCount() > 0)
        {
            $res = $stmt->fetchAll();
            $subject = "You have a Comment on ".$pic_id;
            $headers = "From me@student.wethinkcode.co.za \r\n";
            $message = "Someone made this comment on your picture\r\n"
            .$comment;
            $to = $res[0]['email'];
            $sent = mail($to, $subject, $message, $headers);
        }
    }
?>