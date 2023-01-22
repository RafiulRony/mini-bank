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
  
  $sql = "SELECT* FROM transection";
  $result = $conn->query($sql);

?>


<html>
    <head>
        <title>All transection</title>
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

<table border="1" bgcolor="#6e55a8" ><th><td>transection</td><td>Date & Time</td></th>
<?php
$i=1;
while($row = $result->fetch_assoc()) {
    if($row['sender']==0){
        echo "<tr><td>" . "$i" . "</td><td>"."a/c:". $row['receiver']." credited ". $row['amount']." taka "."</td><td>" . $row['date'] . "</td></tr>";
    }
    else if($row['receiver']==0){
        echo "<tr><td>" . "$i" . "</td><td>"."a/c:". $row['sender']." withdrawn ". $row['amount']." taka "."</td><td>" . $row['date'] . "</td></tr>";
    }
    else{
        echo "<tr><td>" . "$i" . "</td><td>"."a/c:". $row['receiver']." received ". $row['amount']." taka from a/c:".$row['sender']."</td><td>" . $row['date'] . "</td></tr>";
    }
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

