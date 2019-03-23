<?php
$conn = mysqli_connect('127.0.0.1', 'root', '');
if (!$conn){
    die("Database Connection Failed" . mysqli_error($conn));
}
$select_db = mysqli_select_db($conn,'kingoffitness');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($conn));
}

// if save button is clicked


?>