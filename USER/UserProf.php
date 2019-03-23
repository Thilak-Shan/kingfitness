<?php include ('Connection.php');?>
<!DOCTYPE html>
<html>
<head>
    <title> User Profile Page </title>
    <link rel="stylesheet" type="text/css" href="CSS/Style2.css">
</head>
<body style="background:url(Image/Background/background.jpg);background-size:100% ;background-repeat:no-repeat;">
<div class="header">
    <h2> User Profile </h2>
</div>
<div class="form1">

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
    <table>
        <tr><td> Full Name      : </td><td><?php echo $funame; ?></td></tr>
        <tr><td> Address        : </td><td><?php echo $address; ?></td></tr>
        <tr><td> Date of Birth  : </td><td><?php echo $dob; ?></td></tr>
        <tr><td> Gender         : </td><td><?php echo $gender; ?></td></tr>
        <tr><td> Contact No     : </td><td><?php echo $phone; ?></td></tr>
        <tr><td> Email Address  : </td><td><?php echo $email; ?></td></tr>
    </table>
    <button onclick="window.location.href='UpdateProfile.php'" class="btn" type="button" name="user_update" id="userupdate">Update</button>
    <button onclick="window.location.href='User.php'" class="btn" type="button" name="user_back" id="userback">Back</button>
</div>


</body>
</html>
