<?php

session_start();

if(!isset($_SESSION['email'])){ 
header('location: index.php');
}

$servername = "localhost";
$username = "root";
$password = '';
$dbname ="bananibank";
$conn =new mysqli($servername, $username, $password, $dbname);



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "SELECT* FROM user   ";
  $result = $conn->query($sql);

?>


<html>
    <head>
        <title>manager </title>
    </head>
<body>
<table border="2" height="100%" width="100%" bgcolor="#4f694a">
<tr height="10%" width="100%">
 <td><h1 align="center">BANANI BANK</h1></td>
</tr>
<tr height="5%" width="100" bgcolor="#6e55a8">
 <td> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
 <a href="manager.php">home</a>  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
 <a href="addaccount.php">Add account</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
 <a href="view.php">View All</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
 <a href="viewtransection.php">All Transection</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
 <a href="logout.php">LOGOUT</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
 </td>
</tr>
<tr height="40%" width="100%">
 <td>

<center> 

<table border="1" bgcolor="#6e55a8" width="100%"><th><td>Holder Name</td><td>Account No</td><td>Branch</td><td>Balance</td><td>AC type</td><td>Mobile</td><td>Drop</td></th>
<?php
$i=1;
while($row = $result->fetch_assoc()) {
    $ac=$row['accountNo']; ///for delete operation
    echo "<tr><td>" . "$i" . "</td><td>" . $row['name'] . "</td><td>" . 
    $row['accountNo'] . "</td><td>" . $row['branch'] . "</td><td>" . 
    $row['balance'] . " tk" . "</td><td>" . $row['accountType'] . "</td><td>" . 
    $row['mobile'] . "</td><td>" . "<a href=delete.php?ac=$ac>Delete</a>" . "</td></tr>";
    $i++;
    }
?>
</table>
</center>
 </td>
</tr>
</table>
</body>
</html>

