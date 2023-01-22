<?php
if(!isset($_REQUEST['ac'])){
    header("location:index.php");
}

$servername = "localhost";
$username = "root";
$password = '';
$dbname ="bananibank";
$conn =new mysqli($servername, $username, $password, $dbname);

$ac=$_REQUEST['ac'];
$sql="delete from user where accountNo='$ac'";
$conn->query($sql);


header("location:view.php");


?>