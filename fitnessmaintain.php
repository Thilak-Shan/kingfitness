<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/details.css">
<style> 
input[type=text] {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 100%;
}
</style>
</head>
<body style="	background:url(Image/backgound.jpg);background-size:100% ;background-repeat:repeat;">
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
					<li style="float:right;margin-top:40px;">
						<form  >
						<input type="text" name="search" placeholder="Search..">
					
						</form>
					</li>
				</ul>
			
			</div>
		</header>
		
	</div>
	<h1><center><b>FITNESS MAINTAIN</b></center></h1>
	<div id ="data">
    <table style="width: 100%;
    height: 50%;
	border: 2px solid red  ;">
       <tr>
			<td style="border: 3px solid blue; width: 25% ;"><p><b><center>TYPES</center></b></p></a> </td>
			<td style="border: 3px solid red  ; width: 25% ;"><p><b><center>Description</center></b></p></a> </td>
			<td style="border: 3px solid blue  ; width: 25% ;"><p><b><center>price<center></b></p></a> </td>
			<td style="border: 3px solid red  ; width: 25% ;"></td>
		</tr>
		<tr>
			<td style="border: 3px solid blue; width: 25% ;"><img width="325" height="200" src="Image\Types\WEIGHTLOSS\weighted.jpg" ><p><b><center>UPPER BODY</center></b></p> </td>
			<td style="border: 3px solid red  ; width: 25% ;"><p><b>it’s important you follow this training plan as closely as possible. It’s been designed to tax your major muscle groups, especially your chest and back, to radically transform how you look shirtless.</b></p></a> </td>
			<td style="border: 3px solid blue  ; width: 25% ;"><p><b><center>Rs.2150.00<center></b></p></a> </td>
			
			<td style="border: 3px solid red  ; width: 25% ;" align="center"><br/><br/><a href="index.php"><input style="font-size:24px;"class="button"  type="submit" value="ADD"  /></a></td>
		</tr>
		
		<tr>
			<td style="border: 3px solid blue; width: 25% ;"><img width="325" height="200" src="Image\Types\WEIGHTLOSS\lower.jpg" ><p><b><center>LOWER BODY</center></b></p> </td>
			<td style="border: 3px solid red  ; width: 25% ;"><p><b><center>The lower body exercises here are meant to build and define your backside, strengthen and flatten your core, and blast fat to slim your legs</center></b></p></a> </td>
			<td style="border: 3px solid blue  ; width: 25% ;"><p><b><center>Rs.3250.00<center></b></p></a> </td>

			<td style="border: 3px solid red  ; width: 25% ;" align="center"><br/><br/><a href="index.php"><input style="font-size:24px;"class="button"  type="submit" value="ADD"  /></a></td>
		</tr>
		<tr>
			<td style="border: 3px solid blue; width: 25% ;"><img width="325" height="200" src="Image\Types\WEIGHTLOSS\weight.jpg" ><p><b><center>FULL BODY</center></b></p> </td>
			<td style="border: 3px solid red  ; width: 25% ;"><p><b>A total-body workout is the most efficient way to burn calories and gain strength due to the variety of movements and exercises that are integrated into each session</b></p></a> </td>
			<td style="border: 3px solid blue  ; width: 25% ;"><p><b><center>Rs.5250.00<center></b></p></a> </td>

			<td style="border: 3px solid red  ; width: 25% ;" align="center"><br/><br/><a href="index.php"><input style="font-size:24px;"class="button"  type="submit" value="ADD"  /></a></td>
		</tr>
		
		
		
    </table>

</div>

	

</body>
</html>