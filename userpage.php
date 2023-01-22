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
  
  $sql = "SELECT* FROM user where accountNo='$account' ";
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
    <h3>Your account Information</h3>
 <table border="1" bgcolor="#3366ff" style=" color: white; ">
   <?php
    if ($result->num_rows > 0) {
     
      // output data of each row
      while($row = $result->fetch_assoc()) { 
        ?>
  <tr>
   <td>Account No</td>
   <td><?php echo $row['accountNo'] ?></td>
  </tr>
    <tr>
   <td>Name:</td>
   <td><?php echo $row['name'] ?></td>
  </tr>
    <tr>
   <td>Balance</td>
   <td><?php echo $row['balance'] ?></td>
  </tr>
    <tr>
   <td>Branch</td>
   <td><?php echo $row['branch'] ?></td>
  </tr>
    <tr>
   <td>Account Tpye</td>
   <td><?php echo $row['accountType'] ?></td>
  </tr>
  <tr>
   <td>Mobile</td>
   <td><?php echo $row['mobile'] ?></td>
  </tr><tr>
   <td>Email address</td>
   <td><?php echo $row['email'] ?></td>
  </tr>
     <?php }} ?>
 
  
 
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