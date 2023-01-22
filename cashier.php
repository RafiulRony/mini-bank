<?php
session_start();

if(!isset($_SESSION['cemail'])){ 
header('location: index.php');
}
?>

<html>
    <head>
        <title>cashier</title>
    </head>
<body>
<table border="2" height="100%" width="100%" bgcolor="#4f694a">
<tr height="10%" width="100%">
 <td><h1 align="center">BANANI BANK</h1></td>
</tr>
<tr height="5%" width="100" bgcolor="6e55a8">
 <td> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
 <a href="cashier.php">home</a>  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
 <a href="cashin.php">cash-in</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
 <a href="cashout.php">cash-out</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
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