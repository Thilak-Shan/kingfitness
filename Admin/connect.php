<?php
$conn = mysqli_connect('localhost:3308', 'root', 'student');
if (!$conn){
    die("Database Connection Failed" . mysqli_error($conn));
}
$select_db = mysqli_select_db($conn,'kingoftasty');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($conn));
}

// if save button is clicked


?>