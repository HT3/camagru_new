<?php
    include '../functions/login.php';
    session_start();
    $username = htmlspecialchars($_POST['username_login']);
    $password = htmlspecialchars($_POST['password_login']);

    if (login($username, hash('sha256',$password)) == 1)
    {
        $_SESSION['username'] = $username;
        header('Location:../index.php');
    }
    else
    {
        echo '<script>alert("Check your details again or Confirm your Account");window.location.href="../login.php";</script>';
    }
?>