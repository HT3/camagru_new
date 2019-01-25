<?php
    include 'functions/change_password.php';
    session_start();
    if ($_POST['submit_forgot_password'] == OK) {
        $email = $_POST['email'];
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
        $sql = "SELECT * FROM users WHERE email='$email'";
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
            $new_password = '$'.bin2hex(openssl_random_pseudo_bytes(4));
            $new_pword = hash('sha256', $new_password);
            $sql = "UPDATE users SET password='$new_pword' WHERE email='$email'";
            try {
                $ex = $conn->prepare($sql);
                $ex->execute();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
                return (0);
            }
            $conn = null;
            $sent = mail($email, "New Password for Camagru", "Hey, how's it going?\nAny who let's get over the pleasantries, someone requested a password change.\nIf this was not you or otherwise, here is a temporary password: ".$new_password, "From: tjones@student.wethinkcode.co.za\r\n");
            if ($sent == true) {
                echo ('<script>alert("Email sent with a Temporary Password");window.location.href="login.php";</script>');
                return (1);
            }
            else {
                echo ('<script>alert("Incorrect Email");window.location.href="forgot_password.php";</script>');
                return (0);
            }
        }
        else {
            echo ('<script>alert("Email does not exist. Please register first.");window.location.href="register.php";</script>');
            return (0);
        }
    }
?>
<html>
    <head>
        <title>Forgot Password?</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./style/login.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>
    <body>
        <div class="loginbox">
        <h4>Forgot Password?</h4>
        <hr class="w3-clear">
        <h6>Please enter your email to recieve a temporary password:</h6><br/>
        <form action="forgot_password.php" method="POST">
        <input type="email" name="email" required>
        <button type="submit" class="btn" value="OK" name="submit_forgot_password">Submit</button>
        </form>
        </div>
    </body>
</html>