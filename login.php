<?php 
session_start();
include 'PHP/Database/Connection.php';
if(isset($_POST['signIn'])){ 
$Email=$_POST['Email'];
$Password=$_POST['Password'];
$Password=md5($Password);

$sql="SELECT * FROM users WHERE email='$Email' and Password='$Password'";
$result=$conn->query($sql);
if($result->num_rows>0){
	session_start();
	$row=$result->fetch_assoc();
	$_SESSION['Email']=$row['Email'];
	header("location: Homepage.php");
	exit();
}
else{
	echo"<script>alert('Incorrect Email or Password Please check');</script>";
}
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>LOGIN PAGE</title>
	<link rel="stylesheet" type="text/css" href="CSS/login.css">
	<link rel="shortcut icon" href="images/icon.png" type="image/x-icon" />
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<div id="preloader"></div>
	<a href="index.php">
		<div class="icon"><i class="far fas fa-arrow-left"></i></div>
	</a>
	<img class="wave" src="images/wave.png">
	<div class="container">
		<div class="img">
			<img src="images/delivery.png">
		</div>

		<div class="login-content">
			<form  method="POST" action="">
				<img src="images/avatar.svg">
				<h2 class="title">Welcome Login to Order Your Food</h2>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="div">
						<h5>Email Address</h5>
						<input type="text" class="input" name="Email" >
					</div>
				</div>
				<div class="input-div pass">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div class="om">
						<h5>Password</h5>
						<input type="password" id="password" class="input" name="Password">
						<i id="visibilityBtn" class="fas fa-eye"></i>
					</div>
				</div>
				<a href="signup.php">
					<p class="ram">Not Yet Signed up? <span style="color:#fe523b" ;>Signup Now</span>
						<i class="fas fas fa-long-arrow-alt-right"
							style="color:#fe523b; font-size:1.2rem; position: relative; top:3.6px;" ;></i>
					</p>
				</a>
				<div class="filed button">
					<input type="submit" class="btn" value="LOGIN" name="signIn">
				</div>
			</form>
		</div>
	</div>
	<script src="JS/main.js"></script>
	<script type="text/javascript" src="JS/login.js"></script>
	<script src="JS/pass-show-hide.js"></script>
<script type="text/javascript">
    window.history.forward();
</script>
</body>

</html>