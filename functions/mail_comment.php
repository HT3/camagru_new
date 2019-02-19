<?php
    function mail_comment($username, $comment, $pic_id)
    {
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
        }
        $sql = "SELECT * FROM users WHERE username='$username' AND comment_choice='1'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0)
        {
            $res = $conn->query("SELECT * FROM users WHERE username='$username'");
            $res = $res->fetch();
            $subject = "You have a Comment on ".$pic_id;
            $headers = "From me@student.wethinkcode.co.za \r\n";
            $message = "Someone made this comment on your picture:\r\n"
            .$comment;
            
            $sent = mail($res['email'], $subject, $message, $headers);
        }
    }
?>