<?php

include "connect.php";
if (isset($_POST['search'])) {
    $search = $_POST['search'];

    $query=mysqli_query($conn,"select * from `fits` where name like '%$search%' ");

    if(mysqli_num_rows($query)==0){
        echo '<div class="panel panel-default" style="width:235px;">';
        ?>
        <span style="margin-left:13px;">No results found</span>
        <?php
        '</div>';
    }
    else{
        echo '<div class="panel panel-default" style="width:235px;">';
        while ($row = mysqli_fetch_array($query)) {
            ?>

            <span>
			<a href="user.php?id=<?php echo $row['id']; ?>" style="text-decoration:none; color:black;"><?php echo $row['cat_type']; ?> </a>
			</span><br>

            <?php
        }
        '</div>';
    }
}

?>

