<?php include('Connection.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title> Forgot Password Page </title>
    <link rel="stylesheet" type="text/css" href="CSS/Style1.css">
</head>
<body style="background:url(Image/background.jpg);background-size:100% ;background-repeat:no-repeat;">
<div class="header">
    <h2> Forgot Password </h2>
</div>

<form method="post" action="ForgotPassword.php">

    <!-- Display validation errors -->
    <?php include('errors.php'); ?>

    <div class="input-group">
        <label>E-mail</label>
        <input type="email" name="email" value="<?php echo $email; ?>">
    </div>
    <div class="input-group">
        <label>New Password</label>
        <input type="password" name="password_new">
    </div>
    <div class="input-group">
        <label>Confirm Password</label>
        <input type="password" name="password_con">
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="reset"><b>Reset</b></button>
    </div>
    <div class="input-group">
        <button onclick="window.location.href='Login.php'" type="button" class="btn" name="login1"><b>Login</b></button>
    </div>
</form>
</html>