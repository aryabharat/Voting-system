
<?php
session_start(); 
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>SignUp Form </title>
	<!-- Meta-Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Tool Sign In Form a Responsive Web Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible Web Template, Smartphone Compatible Web Template, Free Webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">

	<!-- //Meta-Tags -->
	<!-- Stylesheets -->
	<link href="css/style1.css" rel='stylesheet' type='text/css' />
	<!--// Stylesheets -->
	<!--fonts-->
	<link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
	<!--//fonts-->
</head>

<body>
	<h1>Signin for Voting </h1>
	<div class="w3ls-login box box--big">
		<!-- form starts here -->
		<form action="index.php" method="POST">
			<div class="agile-field-txt">
				<label>Name</label>
				<input type="text" name="uname" placeholder="Enter your Name" required="" />
			</div>
			<div class="agile-field-txt">
				<label>Password</label>
				<input type="password" name="pass" placeholder="Enter Password" required="" id="myInput" />
			</div>
			<input type="submit" value="SIGN IN" name="login">
		</form>
	</div>

</body>
</html>

<?php

$server = "localhost";
$username = "root";
$password= "";
$database = "vote";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn) {
	die("connection failed:".mysqli_connect_error());
}
if(isset($_POST['login']))
{
	$username = $_POST['uname'];
	$password = $_POST['pass'];

	$query = "SELECT * FROM `user` WHERE `username`='$username' AND `password` = '$password'";
	$run = mysqli_query($conn,$query);
	$row = mysqli_num_rows($run);
	if($row < 1)
	{
		?>
		<script> alert('Username and password not matched!!');
		window.open('index.php','_self');
	  </script>
	   <?php
	}
	else
	{
		$data  = mysqli_fetch_assoc($run);
		$_SESSION['uid']= $username;
		header('location:show.php');
	}
}

?>
