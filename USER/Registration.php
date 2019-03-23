<?php include('Connection.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title> User Registration Page </title>
    <link rel="stylesheet" type="text/css" href="CSS/Style1.css">
</head>
<body style="background:url(Image/background.jpg);background-size:100% ;background-repeat:no-repeat;">
    <div class="header">
        <h2> Registration </h2>
    </div>
    <div  style="float: right;">
        <button onclick="window.location.href='Login.php'" type="button" class="" ><b>Admin Login</b></button>
    </div>

    <form method="post" action="Registration.php">

    <!-- Display validation errors -->
        <?php include('errors.php'); ?>

    <div class="input-group">
        <label>Username</label>
        <input type="text" name="username" value="<?php echo $username; ?>" required>
    </div>
    <div class="input-group">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $email; ?>" required>
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password_1" required>
    </div>
    <div class="input-group">
        <label>Confirm password</label>
        <input type="password" name="password_2" required>
    </div>

    <div class="input-group">
        <button type="submit" class="btn" name="reg_user"><b>Register</b></button>
    </div>
    <p>
        Already a Registed? <a href="Login.php">Sign in</a>
    </p>
    </form>
</html>
