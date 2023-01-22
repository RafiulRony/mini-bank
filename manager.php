<?php
session_start();

if(!isset($_SESSION['email'])){ 
header('location: index.php');
}
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
<tr height="5%" width="100" bgcolor="6e55a8">
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
 <img src="bank.jpg" height="600px" width="100%"> 
 </td>
</tr>
</table>
</body>
</html>