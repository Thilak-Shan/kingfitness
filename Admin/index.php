<?php include('db_connect.php');
//fetch the record to be updated
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $edit_state = true;
    $rec = mysqli_query($db1,"SELECT * FROM product WHERE id = $id");
    $record = mysqli_fetch_array($rec);

    $name = $record['name'];
    $description = $record['description'];
    $type = $record['type'];
    $image = $record['image'];
    $price=$record['price'];
    $id = $record['id'];
}

?>
<!DOCTYPE HTML>
<html>
<head>
    <title> Add Product Page</title>

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        body {
            font-family: "Lato", sans-serif;
        }

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }
    </style>

</head>
<body style="background:url(Image/background.jpg);background-size:100% ;background-repeat:repeat;">


<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="AddProduct.php">Add Product</a>
    <a href="CMS.php">CMS</a>

</div>

<header>
    <div class="pad">

    </div>
    <div class="bad">
        <ul class="na">
            <li><span style="font-size:90px;cursor:pointer" onclick="openNav()">&#9978; </span></li>
            <li><a href="#img"><img id="img" src=Image/logo.png /></a></li>

            <li><a href="index.php" style="margin-top:40px;">Home</a></li>

            <li> <a href="AddProduct.php" style="margin-top:40px;">Add Product</a></li>
            <li><a href="CMS.php" style="margin-top:40px;">CMS</a></li>
            <li><a  style="margin-top:40px;float: right">Admin</a></li>


        </ul>

    </div>
</header>


<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>

<!-- Display Notification -->
<?php if(isset($_SESSION['msg'])): ?>
    <div class="msg1">
        <?php
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
        ?>
    </div>
<?php endif ?>
<div style=" position:center">
    <div class="header">
        <p ><h2 style="text-align: center"> Product Details </h2></p>
    </div>

    <form class="form1" method="post" style="align-content: center;margin-left: 30%;margin-top: 5%"  >
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <table>
            <tr>
                <td>Item Name </td>
                <td><input type="text" name="itemname" value="<?php echo $name;?>" required></td></tr>

            <tr>
                <td> Description </td>
                <td><input type="text" name="description" value="<?php echo $description;?>" required></td>
            </tr>
            <tr>
                <td> Category </td>
                <td><input list="categories" name="type" value="<?php echo $type;?>" required>
                    <datalist id="categories">
                        <option value="Beverage">
                        <option value="Burger">
                        <option value="Juice">
                        <option value="Pizza">
                        <option value="Smoothie">
                        <option value="Submarine">

                    </datalist></td>
            </tr>

            <tr>
                <td> Image </td>

                <td><input class="form-control" type="file" name="image" accept="image/*" value="<?php echo $image;?>" required></td>
            </tr>

            <tr>
                <td> Price </td>
                <td><input type="text" name="price" value="<?php echo $price;?>"required></td>
            </tr>
        </table>
        <br/>
        <div class="input-group">
            <?php if ($edit_state == false): ?>
                <button type="submit" name="save" class="btn"> Save </button>
            <?php else: ?>
                <button type="submit" name="update" class="btn"> Update </button>
            <?php endif ?>

        </div>
    </form>
</div>
<br/> <br/> <br/>
<table align="center" id="t01">
    <thead>
    <tr>
        <th> Item Name </th>
        <th> Description </th>
        <th> Type </th>
        <th> Image </th>
        <th> Price </th>
        <th colspan="2"> Action </th>
    </tr>
    </thead>
    <tbody>
    <?php while($row = mysqli_fetch_array($results)){ ?>
        <tr>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['description'];?></td>
            <td><?php echo $row['type'];?></td>
            <td><?php echo $row['image'];?></td>
            <td><?php echo $row['price'];?></td>
            <td> <a class="edit_btn" href="AddProduct.php?edit= <?php echo $row['id']; ?>"> Edit </a></td>
            <td> <a class="del_btn" href="AddProduct.php?delete= <?php echo $row['id']; ?>"> Delete </a></td>
        </tr>
    <?php }
    ?>
    </tbody>
</table>
</div>




</body>
</html>