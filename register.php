<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./style/register.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>
    <body>
        <div class="loginbox">
            <img src="./images/avatar.png" class="avatar">
            <h1>Register Here</h1>
            <form method="POST" action="./forms/register_form.php">
                <p>Username</p>
                <input type="text" name="username_signup" placeholder="Enter Username" pattern=".{5,100}" required autocomplete="off" value="<?php echo $username; ?>">
                <p>Email</p>
                <input type="email" name="email_signup" placeholder="Enter Email" required autocomplete="off" value="<?php echo $email; ?>">
                <p>Password</p>
                <input type="password" name="password_signup" required autocomplete="off" placeholder="Enter Password">
                <p>Confirm Password</p>
                <input type="password" name="confirm_password_signup" required autocomplete="off" placeholder="Re-enter Password">
                <button type="submit_signup" name="reg_user" class="btn" value="OK">Register</button><br/>
                <p>&nbsp;</p>
                <a href="login.php">Already a member? Sign in</a><br/>
                <a href="#">Guest Gallery</a><br/>
            </form>
        </div>
    </body>
</html>
