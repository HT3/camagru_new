<?php
    session_start();
    include '../functions/c_email.php';
    include '../functions/c_username.php';
    include '../functions/c_password.php';
    include '../functions/c_comment_notification.php';
    include '../functions/login.php';
    include '../functions/delete.php';
    $username = htmlspecialchars($_POST['username_account']);
    $password = hash('sha256', htmlspecialchars($_POST['password_account']));
    if (login($username, $password) == 1) {
        if ($_POST['submit_delete'] == OK)
        {
            delete($username, $password);
            $_SESSION['username'] ==  "";
            $_SESSION = "";
            session_destroy();
            echo ('<script>alert("Account Deleted");window.location.href="../login.php";</script>')
        }
        if ($_POST['new_username_check'] == '1' && htmlspecialchars($_POST['new_username_account']) != "")
        {
            $new_email = htmlspecialchars($_POST['new_email_account']);
            change_email
        }
    }