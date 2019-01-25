<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="./style/login.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>
    <body>
        <div class="loginbox">
            <img src="./images/avatar.png" class="avatar">
            <h1>Login</h1>
            <form method="POST" name="login" action="forms/login_form.php">
                <p>Username</p>
                <input type="text" name="username_login" pattern=".{5,100}" placeholder="Enter Username">
                <p>Password</p>
                <input type="password" name="password_login" required autocomplete="off" placeholder="Enter Password">
                <button type="submit" name="submit_login" class="btn">Login</button>
                <p>&nbsp;</p>
                <a href="#">Guest Gallery</a><br/>
                <a href="register.php">Don't have an account?</a><br/>
                <a href="forgot_password.php">Forgot Password?</a>
            </form>
        </div>
    </body>
</html>