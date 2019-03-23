<!DOCTYPE html>
<html>
<head>
    <title>PHP Simple Search using AJAX/Bootstrap</title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="	background:url(Image/backgrund.jpg);background-size:100% ;background-repeat:repeat;">

<nav class="navbar navbar-default">
    <div class="container-fluid">

    </div>
</nav>
<div class="row" style="margin-left: 50px;">
    Search Results: <ul style="list-style-type:none;">
        <?php
        include('connect.php');
        $search=$_POST['search'];

        $query=mysqli_query($conn,"select * from `fits` where cat_type like '%$search%' ");
        if (mysqli_num_rows($query)==0){
            echo '<li>No results found!</li>';
        }
        else{
            while($row=mysqli_fetch_array($query)){
                ?>
                <li>
                    <a href="user.php?id=<?php echo $row['id']; ?>" style="margin-left:13px;"><?php echo $row['cat_type']; ?> </a>
                </li>
                <?php
            }
        }
        ?>
    </ul>
    <br>

    <a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
</div>

</body>
</html>