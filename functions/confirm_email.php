<?php
    include_once "delete.php";
    function confirm_email($username, $email, $password)
    {
        session_start();
        $to = $email;
        $subject = "Camagru: Account Confirmation";
        $confirm_link = hash('sha256', $username);
        $headers = "From : cunt@student.wethinkcode.co.za \r\n";
        $message = "Welcome, $username to Camagru \n
Thank you joining this new experience, so please confirm your account with the following link:
http://127.0.0.1:8080/camagru/functions/confirmation.php?passkey=$confirm_link\n
Kind regards,
The Camagru Team";
        $sent = mail($to, $subject, $message, $headers);
        if ($sent == true)
            echo('<script>alert("Email sent, please check your email to confirm your Camagru account");window.location.href="../login.php"</script>');
        else {
            delete_account($username, $password);
            echo('<script>alert("Email not sent, please try to sign up with the correct email");window.location.href="../register.php"</script>');
        }
    }
?>