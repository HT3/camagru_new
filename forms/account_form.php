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
            echo ('<script>alert("Account Deleted");window.location.href="../login.php";</script>');
        }
        if ($_POST['new_username_check'] == '1' && htmlspecialchars($_POST['new_username_account']) != "")
        {
            $new_username = htmlspecialchars($_POST['new_username_account']);
            change_username($username, $password, $new_username);
            $username = $new_username;
        }
        if ($_POST['new_email_check'] == '1' && htmlspecialchars($_POST['new_email_account']) != "")
        {
            $new_email = htmlspecialchars($_POST['new_email_account']);
            change_email($username, $new_email, $password);
        }
        if ($_POST['new_password_check'] == '1' && htmlspecialchars($_POST['new_password_account']) != "")
        {
            $new_password = htmlspecialchars($_POST['new_password_account']);
            if (strlen($new_password) < 8 || !(preg_match('/\\d/', $new_password) > 0) || !(preg_match('/[\^£$%&*()}{@#~?,|=_+-]/', $new_password) > 0))
            {
                echo('<script>alert("Password too short, does not contain a digit or any special characters");window.location.href="../account.php";</script>');
            }
            else {
                $new_password = hash('sha256', $new_password);
                change_password($username, $password, $new_password);
                $password = $new_password;
            }
        }
        if ($_POST['new_comment_email_check'] == '1' && $_POST['new_comment_email_account'] != "")
        {
            $new_comment_email = $_POST['new_comment_email_account'];
            change_comment_notification($new_comment_email, $username);
        }
        echo('<script>alert("Your details were changed. Please proceed to the Main Page.");window.location.href="../index.php";</script>');
    }
    else
    {
        echo('<script>alert("Incorrect Username/Password");window.location.href="../account.php";</script>');
    }
?>