<?php

session_start();

if(!isset($_POST['username'])){
  header("location: managerlogin.php");
}

$servername = "localhost";
$username = "root";
$password = '';
$dbname ="bananibank";
$conn =new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$email=$_POST['username'];
$pass=$_POST['password'];
  
$sql = "SELECT* FROM manager  ";
$result = $conn->query($sql);

$hash_format = "$2y$07$";
$salt = "akdkdkroadlfiwnmopqwex";
$conC = $hash_format . $salt;
$pass= crypt($pass, $conC);

  
while($row = $result->fetch_assoc()) {
    if($email==$row['email'] && $pass==$row['password']){
      $_SESSION['email']=$row['email'];
      header('location: manager.php');
    }
    else{
      header("location:managerlogin.php");
    }
  }

?>



