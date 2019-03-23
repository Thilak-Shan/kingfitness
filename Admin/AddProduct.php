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

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title> Add Product Page</title>

</head>

<body style="	background:url(Image/background.jpg);background-size:100% ;background-repeat:repeat;">



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

    <form class="form1" method="post" style="align-content: center;margin-left: 30%;margin-top: 5%">
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