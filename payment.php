<?php
session_start();  
require_once("dbconnect.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
    switch($_GET["action"]) {
        case "add":
            if(!empty($_POST["quantity"])) {
                $productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
                $itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));

                if(!empty($_SESSION["cart_item"])) {
                    if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
                        foreach($_SESSION["cart_item"] as $k => $v) {
                            if($productByCode[0]["code"] == $k) {
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
                foreach($_SESSION["cart_item"]      as $k => $v) {
                    if($_GET["code"] == $k)
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

require('connect.php');
if (isset($_POST['submit'])) {


    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $city = $_POST['city'];

    $paymentmethod = $_POST['paymentmethod'];
    $cardnum = $_POST['cardnum'];
    $securecode = $_POST['securecode'];
    $expdate = $_POST['expdate'];
    $amount =$_POST['amount'];
    $bank = $_POST['bank'];

   // $dname = $_POST['dname'];
   // $dphone = $_POST['dphone'];
//$pickup = $_POST['pickup'];
   // $pickup = $_POST['pickup'];
   // $deladdress = $_POST['deladdress'];
   // $deldate = $_POST['deldate'];
//$pickup = $_POST['pickup'];


    $query = "INSERT INTO `bill_infor` ( name , address , phone, email, city) VALUES ('$name', '$address', '$phone', '$email', '$city')";
    $result = mysqli_query($conn, $query);

    $payquery = "INSERT INTO `payment` (paymentmethod, cardnum, securecode, expdate,amount,  bank) VALUES ('$paymentmethod' , '$cardnum', '$securecode', '$expdate','$amount','$bank')";
    $payresult = mysqli_query($conn, $payquery);

    //$delquery = "INSERT INTO `delivery_details` (dname, dphone, deladdress, deldate, pickup ) VALUES ('$dname', '$dphone', '$deladdress', '$deldate', '$pickup')";

  //  $delresult = mysqli_query($conn, $delquery);

}
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/details.css">
    <script src="script/payment.js"></script>
    <style>


        .flex, .flex > div[class*='col-'] {
            display: -webkit-box;
            display: -moz-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            flex:1 0 auto;
        }
        .button {
            padding: 15px 25px;
            font-size: 24px;
            text-align: center;
            cursor: pointer;
            outline: none;
            color: #fff;
            background-color: #4CAF50;
            border: none;
            border-radius: 15px;
            box-shadow: 0 9px #999;
        }

        .button:hover {background-color: #3e8e41}

        .button:active {
            background-color: #3e8e41;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }
    </style>

</head>
<body style="	background:url(Image/background.jpg);background-size:100% ;background-repeat:repeat;">
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

    <?php
    if(isset($_SESSION["cart_item"])){
        $item_total = 0;
        ?>
        <table style="">
            <tbody>

            <?php
            foreach ($_SESSION["cart_item"] as $item){
                ?>

                <?php
                $item_total += ($item["price"]*$item["quantity"]);
            }
            ?>

            <tr>
                <td ><strong>Total:</strong> <?php echo "$".$item_total; ?></td>

            </tr>


            </tbody>
        </table>
        <?php
    }
    ?>
</div>
</div>
<div class="container">

    <form name="form" action="" method="POST" >

        <div class="row flex">
            <table style="width: 100%;">
                <tr>
                    <td style=""><div  style="background-color:red;">
                            <div class="panel panel-default" >
                                <div class="panel-heading" style=""><center><B>Billing Information</B></center></div>
                                <br/>
                                <br/>
                                <div class="panel-body">


                                    <table>
                                        <tr>
                                            <td>Full Name: &nbsp </td>
                                            <td><input id="text1" type="text" name="name" title="please enter proper fullname" required pattern="^[A-Za-z]+" ></td>


                                        </tr>
                                        <tr>
                                            <td><br/><br/> Address: &nbsp </td>
                                            <td><br/><br/><input id="text1" type="text" name="address" title="please enter Address"  required pattern="^[A-Za-z0-9]+"></td>


                                        </tr>
                                        <tr>
                                            <td><br/><br/>Contact Number:  &nbsp<br/><br/></td>
                                            <td><br/><input id="text1" type="tel" name="phone" placeholder="0777777777" title="please enter phone number"  required pattern="[0-9]{10}"</td>


                                        </tr>
                                        <tr>
                                            <td><br/><br/>E-mail Address: &nbsp </td>
                                            <td><br/><br/><input type="email" name="email" placeholder="Enter Your Email"  required ></input></td>


                                        </tr>
                                        <tr>
                                            <td><br/><br/> City: &nbsp </td>
                                            <td><br/><br/><input id="text1" type="text" name="city" title="please enter city"  required pattern="^[A-Za-z]+"></td>


                                        </tr>
                                    </table>

                                </div>

                            </div>
                            <!--/col--></td>
                    <td style=""><div  style="background-color:green;">
                            <div class="panel panel-default">
                                <div class="panel-heading"><center><B>Payment Details</B></center></div>
                                <div class="panel-body">

                                    <table>
                                        <tr>
                                            <td><br/><br/>Payment Method: &nbsp </td>
                                            <td><br/><br/><input type="radio" name="paymentmethod" value="visa" checked><img id="img" src=Image/visa.png style="height:50px" /><input type="radio" name="paymentmethod" value="mastercard" ><img id="img" src=Image/ma.jpg style="height:50px" /></td>
                                        </tr>
                                        <tr>
                                            <td><br/><br/>Card Number: &nbsp </td>
                                            <td><br/><br/><input id="text1"  type="text" name="cardnum" title="please enter card number"  required pattern="[0-9]{13,16}"></td>
                                        </tr>
                                        <tr>
                                            <td><br/><br/>Secure Code &nbsp </td>
                                            <td><br/><br/><input id="text1"  type="text"  name="securecode"   title="please enter code"  required pattern="[0-9]{4}" /></td>
                                        </tr>

                                        <tr>
                                            <td><br/><br/>Expire Date : &nbsp </td>
                                            <td><br/><br/><input type="date" name="expdate" id="date" required/></td>
                                        </tr>
                                        <tr>
                                            <td><br/><br/>Amount &nbsp </td>

                                            <td><br/><br/><input id="text1"  type="text"  name="amount" title="please enter amount"  required pattern="[0-9]{1,10}"  /></td>


                                        </tr>

                                        <tr>
                                            <td><br/><br/>Bank Name &nbsp </td>
                                            <td><br/><br/><input id="text1"  type="text"  name="bank" title="please enter bank name" required pattern="^[A-Za-z]+"   /></td>
                                        </tr>




                                    </table>


                                </div>
                            </div>
                        </div><!--/col-->
                    </td>
                </tr>
                <tr>
                    <td colspan="12" align="center"><br/><br/><a href="bills.php"><input class="button" name="submit" type="submit"  value="Submit"  /></a></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>

    </form>
</div>

</body>
</html>



