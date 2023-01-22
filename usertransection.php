<?php

session_start();

if(!isset($_SESSION['account'])){ 
header('location: index.php');
}

$account=$_SESSION['account'];

$servername = "localhost";
$username = "root";
$password = '';
$dbname ="bananibank";
$conn =new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "SELECT* FROM transection where sender='$account' or receiver='$account'";
  $result = $conn->query($sql);



?>



<html>
<head>
	<title>User Account</title>
</head>
<body bgcolor="#99ccff">
<br>
 
<br><br><br><br><br><br><br><br>
<center> 
    <h1>WELCOME TO BANANI BANK</h1>
    <h3>Your transection history</h3>
<table border="1" bgcolor="#6e55a8" ><th><td>transection</td><td>Date & Time</td></th>
<?php
$i=1;
while($row = $result->fetch_assoc()) {
    if($row['sender']==0){
        echo "<tr><td>" . "$i" . "</td><td>"."BDT ". $row['amount']." taka "."has been credited to your account"."</td><td>" . $row['date'] . "</td></tr>";
    }
    else{
        echo "<tr><td>" . "$i" . "</td><td>"."You withdrawn BDT ". $row['amount']." taka "."</td><td>" . $row['date'] . "</td></tr>";
    }
    $i++;
}
?>
</table>
<br><br> 

<a href="userpage.php"  style=" background-color: #4CAF50; padding: 7px 15px;
  text-align: center;  
  font-size: 20px;">Home</a>  

<a href="transfer.php"  style=" background-color: #4CAF50; padding: 7px 15px;
  text-align: center;  
  font-size: 20px;">Transfer</a>  

<a href="changepass.php"  style=" background-color: #4CAF50; padding: 7px 15px;
  text-align: center;  
  font-size: 20px;">Change password</a>
  
<a href="usertransection.php"  style=" background-color: #4CAF50; padding: 7px 15px;
text-align: center;  
font-size: 20px;">All transection</a>

<a href="logout.php"  style=" background-color: #4CAF50; padding: 7px 15px;
  text-align: center;  
  font-size: 20px;">logout</a>  
</center>
</body>
</html>