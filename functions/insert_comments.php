<?php
    include 'user_details.php';
    include 'mail_comment.php';
    session_start();
    $image_id = $_POST['image_id'];
    $username = $_SESSION['username'];
    $comment = htmlspecialchars($_POST['comment']);
    $host = 'localhost';
    $user = 'root';
    $pass = 'qwerty1234';
    $db = 'db_camagru';
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
    $db_options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    if ($comment == "")
    {
        echo '<script>alert("Please input text");window.location.href="../gallery.php"</script>';
    }
    else {
        try {
            $conn = new PDO($dsn, $user, $pass, $db_options);
        }
        catch(PDOException $error) {
            echo "Connection Failure: ".$error->getMessage();
            return (-1);
        }
        $sql = "INSERT INTO comments (picture_id,username, comment) VALUES ('$image_id','$username','$comment')";
        try {
            $conn->exec($sql);
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
        mail_comment($username, $comment, $image_id);
        echo '<script>window.location.href="../gallery.php";</script>';
    }
?>