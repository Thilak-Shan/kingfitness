<?php
session_start();
require_once("dbconnect.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
    switch($_GET["action"]) {
        case "add":
            if(!empty($_POST["quantity"])) {
                $productByCode = $db_handle->runQuery("SELECT * FROM fits WHERE type='" . $_GET["type"] . "'");
                $itemArray = array($productByCode[0]["type"]=>array('cat_type'=>$productByCode[0]["cat_type"], 'description'=>$description[0]["description"],'type'=>$productByCode[0]["type"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));

                if(!empty($_SESSION["cart_item"])) {
                    if(in_array($productByCode[0]["type"],array_keys($_SESSION["cart_item"]))) {
                        foreach($_SESSION["cart_item"] as $k => $v) {
                            if($productByCode[0]["type"] == $k) {
                                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                        }
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
            break;
        case "remove":
            if(!empty($_SESSION["cart_item"])) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                    if($_GET["type"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if(empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}
?>
<HTML>
<HEAD>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/details.css">
    <TITLE>PHP Shopping Cart</TITLE>
    <style>
        body{;font-family:calibri;}
        #shopping-cart table{width:100%;background-color:#F0F0F0;}
        #shopping-cart table td{background-color:#FFFFFF;}

        .txt-heading{
            padding: 10px 10px;
            border-radius: 2px;
            color: #FFF;
            background: #6aadf1;
            margin-bottom:10px;
        }
        a.btnRemoveAction{color:#D60202;border:0;padding:2px 10px;font-size:0.9em;}
        a.btnRemoveAction:visited{color:#D60202;border:0;padding:2px 10px;font-size:0.9em;}

        #btnEmpty {
            background-color: #ffffff;
            border: #FFF 1px solid;
            padding: 1px 10px;
            color: #ff0000;
            font-size: 0.8em;
            float: right;
            text-decoration: none;
            border-radius: 4px;
        }
        .btnAddAction{    background-color: #eb9e4f;
            border: 0;
            padding: 3px 10px;
            color: #ffffff;
            margin-left: 2px;
            border-radius: 2px;
        }
        #shopping-cart {margin-bottom:30px;}
        .cart-item {border-bottom: #79b946 1px dotted;padding: 10px;}
        #product-grid {margin-bottom:30px;}
        .product-item {	float:left;	background: #ffffff;margin:15px 10px;	padding:5px;border:#CCC 1px solid;border-radius:4px;}
        .product-item div{text-align:center;	margin:10px;}
        .product-price {
            color: #005dbb;
            font-weight: 600;
        }
        .product-image {height:100px;background-color:#FFF;}
        .clear-float{clear:both;}
        .demo-input-box{border-radius:2px;border:#CCC 1px solid;padding:2px 1px;}


    </style>
</HEAD>
<BODY style="	background:url(Image/backgrond.jpg);background-size:100% ;background-repeat:repeat;  ">
<div class="av">
    <header>

        <div class="bad">
            <ul class="na">
                <li><a href="#img"><img id="img" src=Image/logo.png /></a></li>

                <li><a href="index.php" style="margin-top:40px;">Home</a></li>

                <li><a href="contact.php" style="margin-top:40px;">Contact</a></li>
                <li><a href="about.php" style="margin-top:40px;">About</a></li>
                <li style="margin-top:41px;"><div class="dropdown">
                        <button class="dropbtn">Categories
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                            <a href="weightloss.php">WEIGHT LOSS</a>
                            <a href="bodybuilding.php">BODY BUILDING</a>
                            <a href="fitnessmaintain.php">FITNESS MAINTAIN</a>
                            <a href="cardio.php">CARDIO</a>
                        </div>
                    </div> </li>

                <li style="float:right;margin-top:40px;"><a href="login.php">Login</p></a></li>
                <li style="float:right;margin-top:40px;" ><a href="register.php">Register</p></a></li>

            </ul>

        </div>
    </header>

</div>
<div id="shopping-cart">
    <div class="txt-heading" >Shopping Cart <a id="btnEmpty" href="fitness.php?action=empty">Empty Cart</a></div>
    <?php
    if(isset($_SESSION["cart_item"])){
        $item_total = 0;
        ?>
        <table cellpadding="10" cellspacing="1">
            <tbody>
            <tr>
                <th style="text-align:left;"><strong>CategoryType</strong></th>

                <th style="text-align:left;"><strong>Type</strong></th>
                <th style="text-align:right;"><strong>Package</strong></th>
                <th style="text-align:right;"><strong>Price</strong></th>
                <th style="text-align:center;"><strong>Action</strong></th>
            </tr>
            <?php
            foreach ($_SESSION["cart_item"] as $item){
                ?>
                <tr>
                    <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item["cat_type"]; ?></strong></td>

                    <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $item["type"]; ?></td>
                    <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["quantity"]; ?></td>
                    <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo "$".$item["price"]; ?></td>
                    <td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="fitness.php?action=remove&type=<?php echo $item["type"]; ?>" class="btnRemoveAction">Remove Item</a></td>
                </tr>
                <?php
                $item_total += ($item["price"]*$item["quantity"]);
            }
            ?>

            <tr>
                <td colspan="5" align=right><strong>Total:</strong> <?php echo "$".$item_total; ?></td>
            </tr>
            <tr>

                <td colspan="5" align=right><a href="payment.php?action=add&type=<?php echo $item["type"]; ?>" class="btnAddAction">Buy</a></td>

            </tr>

            </tbody>
        </table>
        <?php
    }
    ?>
</div>

<div id="product-grid">
    <div class="txt-heading" style="text-align: center">Types</div>
    <?php
    $product_array = $db_handle->runQuery("SELECT * FROM fits ORDER BY id ASC");
    if (!empty($product_array)) {
        foreach($product_array as $key=>$value){
            ?>
            <div class="product-item">
                <form method="post" action="fitness.php?action=add&type=<?php echo $product_array[$key]["type"]; ?>">
                    <div class="product-image"><img style="width: 100px; height: 150px" src="<?php echo $product_array[$key]["image"]; ?>"></div>
                    <div ><strong><?php echo $product_array[$key]["cat_type"]; ?></strong></div>
                    <div style="width: 300px; "><strong><?php echo $product_array[$key]["description"]; ?></strong></div>

                    <div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
                    <div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" /></div>
                </form>
            </div>
            <?php
        }
    }
    ?>
</div>
<br/>

</BODY>
</HTML>