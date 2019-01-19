<?php
    include '../functions/register.php';
    include '../functions/confirm_email.php';
    session_start();
    $username = htmlspecialchars($_POST['username_signup']);
    $email = htmlspecialchars($_POST['email_signup']);
    $password = htmlspecialchars($_POST['password_signup']);
    $confirm_password = htmlspecialchars($_POST['confirm_password_signup']);

    if (strlen($password) < 8 || !(preg_match('/\\d/', $password) > 0) || !(preg_match('/[\^£$%&*()}{@#~?,|=_+-]/', $password) > 0))
    {
        echo('<script>alert("Password too short, does not contain a digit or any special characters");window.location.href="../register.php";</script>');
    }
    else if (preg_match('/<>/', $username) || preg_match('/<>/', $password))
    {
        echo('<script>alert("Nah Fam, get out of here with that sh*t");window.location.href="../register.php";</script>');
    }
    else if ($password != $confirm_password)
    {
        echo('<script>alert("Passwords do not match");window.location.href="../register.php";</script>');
    }
    else if (register($username, $email, hash('sha256', $password)) == 1)
    {
        confirm_email($username, $email, hash('sha256', $password));
    }
    else
    {
        echo('<script>alert("Username/Email already taken");window.location.href="../register.php";</script>');
    }
?>