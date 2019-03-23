<?php
    session_start();

    //validation
    $username = "";
    $email    = "";
    $id = 0;
    $errors = array();
    //$_SESSION['success'] = "";

    //connect to the database
    $db = mysqli_connect('127.0.0.1','root','','kingoffitness');

    //if the register button is clicked
    if (isset($_POST['reg_user'])){
            // receive all input values from the form
            $username = mysqli_real_escape_string($db, $_POST['username']);
            $email = mysqli_real_escape_string($db, $_POST['email']);
            $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
            $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

            // form validation: ensure that the form is correctly filled
            if (empty($username)) { array_push($errors, "Username is required"); }
            if (empty($email)) { array_push($errors, "Email is required"); }
            if (empty($password_1)) { array_push($errors, "Password is required"); }
            if (empty($password_2)) { array_push($errors, "Password is required"); }

            if ($password_1 != $password_2) {
                array_push($errors, "The two passwords do not match");
            }

            // register user if there are no errors in the form
            if (count($errors) == 0) {
                $password = md5($password_1);//encrypt the password before saving in the database
                $sql = "INSERT INTO userdetails (Email,Username,Password) 
				  VALUES('$email', '$username', '$password')";
                mysqli_query($db, $sql);

                //$_SESSION['username'] = $username;
                //$_SESSION['success'] = "You are now logged in";
                header('location: Login.php');
            }

        }

    //login from
    if (isset($_POST['log_user'])){
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

        //make sure the form fields are filled
        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }

        if (count($errors) == 0) {
            $password = md5($password);//encrypt the password
            $sql = "SELECT * FROM userdetails WHERE Username='$username' AND Password='$password'";
            $results = mysqli_query($db, $sql);

            if (mysqli_num_rows($results) == 1) {
                $_SESSION['username'] = $username;
                //$_SESSION['success'] = "You are now logged in";
                header('location: UserProf.php');
            }else {
                array_push($errors, "Wrong username/password combination");
            }
        }
    }

    //forgot password form email & username
    if (isset($_POST['reset'])){
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password_new = mysqli_real_escape_string($db, $_POST['password_new']);
        $password_con = mysqli_real_escape_string($db, $_POST['password_con']);

        //make sure the form fields are filled
        if (empty($email)) {
            array_push($errors, "Email address is required");
        }
        if (empty($password_new)) {
            array_push($errors, "New Password is required");
        }
        if (empty($password_con)) {
            array_push($errors, "Confirm Password is required");
        }

        if (count($errors) == 0) {
            //$sql1 = "SELECT * FROM userdetails WHERE Username='$username' AND Email='$email'";
            $sql = "SELECT * FROM userdetails WHERE Email = '$email'";
            $results = mysqli_query($db, $sql);

            if (mysqli_num_rows($results) == 1) {
                if (empty($email)) {
                    array_push($errors, "Email is required");
                }

                if (empty($password_new)) {
                    array_push($errors, "New Password is required");
                }
                if (empty($password_con)) {
                    array_push($errors, "Confirm Password is required");
                }


                if (count($errors) == 0) {

                   /* $password = md5($password_new);//encrypt the password
                    $sql1 = "UPDATE userdetails SET Password = '$password' WHERE Email = '$email'";
                    mysqli_query($db, $sql);

                    //$_SESSION['email'] = $email;
                    //$_SESSION['success'] = "You are now logged in";*/
                    if ($password_new == $password_con) {
                        if ($db->connect_error) {
                            die("Connection failed: " . $db->connect_error);
                        }
                        $password = md5($password_new);
                        $sql = "UPDATE userdetails SET Password = '$password' WHERE Email = '$email'";

                        if ($db->query($sql) === TRUE) {
                            //echo "<script type='text/javascript'>alert('Reset successfully!')</script>";
                            array_push($errors, "Updated successfully");
                        } else {
                            array_push($errors, "Error updating record: " . $db->error);
                        }
                    }
                    else{
                        array_push($errors, "Passwords are not match: " . $db->error);
                    }
                    //header('location: Login.php');

                }

            }else {
                array_push($errors, "Invalid Email Address");
            }
        }

    }

    //logout
    //update user profile
    if (isset($_POST['update_user'])){

        $fname = mysqli_real_escape_string($db, $_POST['fullname']);
        $gender= mysqli_real_escape_string($db, $_POST['gender']);
        $dob = mysqli_real_escape_string($db, $_POST['dob']);
        $phone = mysqli_real_escape_string($db, $_POST['phone']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $address = mysqli_real_escape_string($db, $_POST['address']);

        $nameID = $_SESSION['username'];


// Check connection
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $sql = "UPDATE userdetails SET FullName='$fname', Address='$address', DOB='$dob', Gender='$gender', Phone='$phone', Email='$email' WHERE Username='$nameID'";

        if ($db->query($sql) === TRUE) {
            array_push($errors, "Updated successfully");
        } else {
            array_push($errors, "Error updating record: " . $db->error);
        }
    }
	
	// logout
    if (isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header('location: index.php');
    }

    
?>