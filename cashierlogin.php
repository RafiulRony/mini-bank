<?php

session_start();

$servername = "localhost";
$username = "root";
$password = '';
$dbname ="bananibank";
$conn =new mysqli($servername, $username, $password, $dbname);

if(isset($_POST['email'])){
	$email=$_POST['email'];
	$pass=$_POST['password'];
	
	$hash_format = "$2y$07$";
	$salt = "akdkdkroadlfiwnmopqwex";
	$conC = $hash_format . $salt;
	$pass= crypt($pass, $conC);

	$sql="select* from cashier where email='$email'";
	$result=$conn->query($sql);
	$cashier=mysqli_fetch_array($result);
	if($cashier['email']==$email && $cashier['password']==$pass){
		$_SESSION['cemail']=$cashier['email'];
		header("location: cashier.php");
	}

}

?>




<!DOCTYPE html>
<html>
<head>
	<title>My Bank</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="div3">
		<a href="managerlogin.php"><h3 align="center">Manager Login</h3></a>
	</div>
	<div class="div3">
		<a href="index.php"><h3 align="center">User Login</h3></a>
	</div>
	<div class="div1"> 
		<p style="font-size: 50px;">BANANI Bank</p>
	</div>
	<div class="div2">
		<br><br><br><br><br><br><br>
		<center>
		<h1>Cashier Login</h1>
		<div class="div4">
		<form method="POST" action="cashierlogin.php">
			<br><br>
			<label>Username</label>
			<input type="text" name="email">
				<br><br>
			<label>Password</label>
			<input type="password" name="password">
				<br><br><br>
			<input type="submit" value="LOGIN">
		</form>
		</div>
		</center>
	</div>
</body>



</html>