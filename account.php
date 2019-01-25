<?php
    session_start();
    if ($_SESSION['username'] == "" || empty($_SESSION))
        echo '<script>alert("Please login first to access this page.");window.location.href="login.php";</script>'
?>
<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>Account Management</title>
        <link rel="stylesheet" type="text/css" href="./style/account.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>
    <body>
    <ul>
        <li><a class="active" href="./index.php">Camagru</a></li>
        <li><a href="./gallery.php">Gallery</a></li>
        <li><a href="./forgot_password.php">Forgot Password</a></li>
        <li><a href="./contact.html">Contact</a></li>
    </ul>
    <p>&nbsp;</p>
    <div class="loginbox">
        <form action="./forms/account_form.php" method="POST">
            <p><h1>Input Login Details</h1></p>
            <input type="text" placeholder="Enter Username" name="username_account" pattern=".{5,100}" name="email" required><br/>
            <input type="password" placeholder="Enter Password" name="password_account" pattern=".{5,100}" name="email" required>
            <p>&nbsp;</p>
            <div>
                <input type="checkbox" name="new_username_check" value="1" id="new_username_check">
                <input type="text" placeholder="Enter New Username" pattern=".{5,100}" name="new_username_account" id="new_username_account" autocomplete="off"><br/>
            </div>
            <div>
                <input type="checkbox" name="new_email_check" value="1" id="new_email_check">
                <input type="email" placeholder="Enter New Email" pattern=".{5,100}" name="new_email_account" id="new_email_account" autocomplete="off"><br/>
            </div>
            <div>
                <input type="checkbox" name="new_password_check" value="1" id="new_password_check">
                <input type="text" placeholder="Enter New Password" name="new_password_account" id="new_password_account" autocomplete="off"><br/>
            </div>
            <div>
                <input type="checkbox" name="new_comment_email_check" value="1" id="new_comment_email_check">
                <select name="new_comment_email_account" id="new_comment_email_account">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <p>&nbsp;</p>
            <div style="text-align:center;">
                <button type="submit" class="btn" value="OK" name="submit_account">Submit</button>
                <p>&nbsp;</p>
                <button type="submit" class="btn" value="OK" name="submit_delete">Delete Account</button>
            </div>
        </form>
    </div>
    </body>
</html>