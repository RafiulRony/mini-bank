<?php
session_start();
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "bananibank";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$name=$_POST['name'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$balance=$_POST['balance'];
$branch=$_POST['branch'];
$actype=$_POST['actype'];
$mobile=$_POST['mobile'];
$utype=$_POST['utype'];

$hash_format = "$2y$07$";
$salt = "akdkdkroadlfiwnmopqwex";
$conC = $hash_format . $salt;
$pass= crypt($pass, $conC);

$sql = "INSERT INTO user (name, email, password, balance, branch, accountType, mobile, usertype)
VALUES ('$name', '$email', '$pass', '$balance', '$branch', '$actype', '$mobile', '$utype')";

if ($conn->query($sql) === TRUE) {

  $_SESSION['flag']=1;
} else {
  $_SESSION['flag']=2;
}
$conn->close();
header('location: addaccount.php');
?>

?>
