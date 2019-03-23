


<!DOCTYPE html>
<html>
<head>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body  style="	background:url(Image/backgroud.jpg);background-size:100% ;background-repeat:repeat;">


<div class="row" style="margin-left: 50px;">
    <?php
    include('connect.php');
    $id=$_GET['id'];
    $query=mysqli_query($conn,"select * from `fits` where id='$id'");
    $row=mysqli_fetch_array($query);


    echo 'Fits: <strong>'.$row['cat_type'].' </strong>';
    ?>
    <a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>

    <form style="align-content: center;margin-left: 30%;margin-top: 5%" method="post" action="fitness.php?action=add&type=<?php echo $row["type"]; ?>">
        <div class="product-image"><img style="width: 100px; height: 150px" src="<?php echo $row["image"]; ?>"></div>
        <div><strong><?php echo $row["cat_type"]; ?></strong></div><br><br>

        <div style="width: 300px; "><strong><?php echo $row["description"]; ?></strong></div><br><br>

        <div class="product-price"><strong><?php echo "Price $".$row["price"]; ?></strong></div>
        <div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" /></div>
    </form>

</div>


</body>
</html>