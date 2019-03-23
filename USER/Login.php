<?php include('Connection.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title> User Login Page </title>
    <link rel="stylesheet" type="text/css" href="CSS/Style1.css">
</head>
<body style="background:url(Image/Background/background.jpg);background-size:100% ;background-repeat:no-repeat;">

<div class="header">
    <h2> Login </h2>
</div>

<form method="post" action="Login.php">

    <!-- Display validation errors -->
    <?php include('errors.php'); ?>

    <div class="input-group">
        <label>Username</label>
        <input type="text" name="username" id="username">
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password">
    </div>

    <div class="input-group">
        <button type="submit" class="btn" name="log_user"><b>Sign In</b></button>
    </div>
    <div class="clearfix">
        <button onclick="window.location.href='Registration.php'" type="button" class="btn1" ><b>Register</b></button>
        <button onclick="window.location.href='ForgotPassword.php'" type="button" class="btn1"><b>Forgot Password</b></button>
    </div>
</form>
</html>
