<!DOCTYPE HTML>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        #result{
            position:absolute;
            top:45px;
            right:175px;
        }
    </style>
</head>

<body style="background:url(Image/backgound.jpg);background-size:100% ;background-repeat:repeat;">
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

                <li style="float:right;margin-top:40px;"><a href="USER/Login.php">Login</p></a></li>
                <li style="float:right;margin-top:40px;" ><a href="USER/Registration.php">Register</p></a></li>
                <li style="margin-top:40px; float: right;">

                    <nav class="navbar navbar-default">
                        <div class="container-fluid">


                            <div class="collapse navbar-collapse navbar-ex1-collapse">
                                <div class="col-sm-12 col-md-12">
                                    <form class="navbar-form" role="search" method="POST" action="result.php">
                                        <div class="input-group">
                                            <input   type="text" class="form-control" placeholder="Search" name="search" id="search">
                                            <div class="input-group-btn">
                                                <button  class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </nav></li>
            </ul>

        </div>
    </header>
    <div class="slideshow-container">

        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="Image/a.jpg" style="width:100%">

        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="Image/b.jpg"  style="width:100%">

        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="Image/c.jpg"  style="width:100%">

        </div>

    </div>
    <br>

    <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>

</div>

<form >
    <center>
        <div class="abc" style="margin-top:10%;
		background-color:gray;
		width:30%;
		margin-left:10%;">
            <p><center><B>Contact Form</B></center></p>
            <table>
                <tr>
                    <td>Name: &nbsp </td>
                    <td><textarea id="text1" type="text" name="fname" ></textarea></td>
                </tr>




                <tr>
                    <td><br/><br/>E-mail Address: &nbsp </td>
                    <td><br/><br/><input id="text1"  type="text"   name="mail" /></td>
                </tr>




                <tr>
                    <td><br/><br/>Contact Number:  &nbsp<br/><br/></td>
                    <td><br/><input  id="text1" type="text"   name="number" /></td>

                </tr>
                <tr>
                    <td>Comment: &nbsp </td>
                    <td><textarea id="text1" type="text" name="comm" ></textarea></td>
                </tr>
                <tr>

                    <td><input   type="reset" value="Reset"  &nbsp/></td>
                    <td><input   type="submit" value="Submit"  /></td>
                </tr>


            </table>
        </div>
    </center>

</form>
<div id="result"></div>

<script type="text/javascript">
    $(document).ready(function() {

        $("#search").keyup(function() {
            var name = $('#search').val();
            if (name == "") {
                $("#result").html("");
            }
            else {
                $.ajax({
                    type: "POST",
                    url: "search.php",
                    data: {
                        search: name
                    },
                    success: function(html) {
                        $("#result").html(html).show();
                    }
                });
            }
        });
    });

    function fill(Value) {

        $('#search').val(Value);
        $('#result').hide();

    }
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
</script>
</body>
</html>