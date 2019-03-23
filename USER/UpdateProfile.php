<?php include('Connection.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title> User Profile Page </title>
    <link rel="stylesheet" type="text/css" href="CSS/Style1.css">
</head>
<body style="background:url(Image/Background/background.jpg);background-size:200% ;background-repeat:no-repeat;">
<div class="header">
    <h2> Update Profile </h2>
</div>

<form method="post" action="UpdateProfile.php">

    <!-- Display validation errors -->
    <?php include('errors.php'); ?>

    <h2><?php echo $_SESSION['username']; ?>'s Profile </h2><br>

    <?php

    $uname = $_SESSION['username'];
    $db1 = mysqli_connect('127.0.0.1','root','','kingoffitness');
    $rec = mysqli_query($db1,"SELECT * FROM userdetails WHERE Username = '".$uname."'");
    $record = mysqli_fetch_array($rec);
    $funame = $record['FullName'];
    $address = $record['Address'];
    $dob = $record['DOB'];
    $gender = $record['Gender'];
    $phone = $record['Phone'];
    $email = $record['Email'];
    ?>
    <div class="input-group">
        <label>Full Name</label>
        <input type="text" name="fullname" value="<?php echo $funame; ?>" required pattern="^[A-Za-z]+">
    </div>
    <div class="input-group">
        <label>Gender</label>
        <input type="text" name="gender" value="<?php echo $gender; ?>"required>
    </div>
    <div class="input-group">
        <label>Date of Birth</label>
        <input type="date" name="dob" value="<?php echo $dob; ?>"required>
    </div>
    <div class="input-group">
        <label>Phone</label>
        <input type="text" name="phone" value="<?php echo $phone; ?>"required pattern="[0-9]{10}"/>
    </div>
    <div class="input-group">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $email; ?>"required >
    </div>
    <div class="input-group">
        <label>Address</label>
        <input type="text" name="address" value="<?php echo $address; ?>"required pattern="^[A-Za-z0-9]+">
    </div>

    <div class="input-group">
        <button type="submit" class="btn" name="update_user"><b>Update</b></button>
    </div>

    <div class="input-group">
        <button onclick="window.location.href='UserProf.php'" type="button" class="btn" name="back"><b>Back</b></button>
    </div>
</form>
</html>