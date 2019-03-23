<?php
session_start();

// initialize variables
$id = 0;
$name = "";
 $description ="";
$type = "";
$image = "";
$price="";
$edit_state = false;


// connect to database
$db1 = mysqli_connect('localhost:3308','root','student','kingoftasty');

// if save button is clicked
if(isset($_POST['save'])){

    $name = $_POST['name'];
    $description = $_POST['description'];
    $type = $_POST['type'];
    $image = $_POST['image'];
    $price=$_POST['price'];



    $sql1 = "INSERT INTO foods (name,description,type,image,price) 
VALUE ('$name','$description','$type','$image','$price')";
    mysqli_query($db1,$sql1);
    $_SESSION['msg'] = "Successfully Added";
    header('location: AddProduct.php');// redirect to addproduct page after inserting
}

// update records
if(isset($_POST['update'])) {

    $name = mysqli_real_escape_string($_POST['name']);
    $description = mysqli_real_escape_string($_POST['description']);
    $type = mysqli_real_escape_string($_POST['type']);
    $image = mysqli_real_escape_string($_POST['image']);
    $price = mysqli_real_escape_string($_POST['price']);


    //$id = mysql_real_escape_string($_POST['ProID']);

    mysqli_query($db1,"UPDATE foods SET name = '$name', description = '$description',type = '$type', image = '$image',price='$price' WHERE id = '$id'");
    $_SESSION['msg'] = "Successfully Updated";
    header('location: AddProduct.php');

}

// delete record
if (isset($_GET['delete'])){
    $id = $_GET['delete'];

    mysqli_query($db1,"DELETE FROM foods WHERE id = '$id' ");
    $_SESSION['msg'] = "Successfully Deleted";
    header('location: AddProduct.php');

}

// retrieve records
$results  = mysqli_query($db1,"SELECT * FROM foods");

?>






