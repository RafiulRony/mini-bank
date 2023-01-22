<?php

session_start();

$servername = "localhost";
$username = "root";
$password = '';
$dbname ="bananibank";
$conn =new mysqli($servername, $username, $password, $dbname);


$email = $_POST['username'];
$userpassword = $_POST['password'];


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
  
$sql = "SELECT* FROM user  ";
$result = $conn->query($sql);
  

$hash_format = "$2y$07$";
$salt = "akdkdkroadlfiwnmopqwex";
$conC = $hash_format . $salt;
$abc= crypt($userpassword, $conC);

     
while($row = $result->fetch_assoc()) {
      if($email==$row['email'] && $abc==$row['password']){
        $_SESSION['account']=$row['accountNo'];
        header('location: userpage.php');
      }
    }
    if(!isset($_SESSION['account']))
    header('location: logout.php');
  $conn->close();


?>