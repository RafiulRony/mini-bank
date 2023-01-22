<?php
session_start();

if(!isset($_SESSION['cemail'])){ 
header('location: index.php');
}

$servername = "localhost";
$username = "root";
$password = '';
$dbname = "bananibank";
$conn = new mysqli($servername, $username, $password, $dbname);

if(isset($_POST['ac'])){
    if($_POST['ac']!=''){
        $name=$_POST['name'];
        $ac=$_POST['ac'];
        $branch=$_POST['branch'];
        $amount=$_POST['amount'];
        $sql="select* from user where accountNo=$ac";
        $user=mysqli_fetch_array($conn->query($sql));
        $newamount = $user['balance']-$amount;
        if($name==$user['name'] && $ac==$user['accountNo'] && $branch==$user['branch']){
            $conn->query("update user set balance=$newamount where accountNo=$ac");
            $transection="INSERT INTO transection (sender, receiver, amount)
            VALUES ('$ac', '0', '$amount')";
            $conn->query($transection);
            echo "complete..";
        }
    }
}




?>


<html>
<head>
    <title>cash-out</title>
</head>
<body>
    <table border="2" height="100%" width="100%" bgcolor="#4f694a">
    <tr height="10%" width="100%">
    <td><h1 align="center">BANANI BANK</h1></td>
    </tr>
    <tr height="5%" width="100" bgcolor="6e55a8">
    <td> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
    <a href="cashier.php">home</a>  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
    <a href="cashin.php">Cash-in</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
    <a href="logout.php">LOGOUT</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
    </td>
    </tr>
    <tr height="40%" width="100%">
    <td>
    <center>
    <h2>Cash-out by cashier</h2>
    <form method="POST" action="cashout.php"> 
    <table border="3" bgcolor="#6e55a8">
        <tr>
            <td>1</td>
            <td>Name:</td>
            <td><input type ="text" name="name"></td>
        </tr>
        <tr>
            <td>2</td>
            <td>account No:</td>
            <td><input type ="number" name="ac"></td>
        </tr>
        <tr>
            <td>3</td>
            <td>Branch</td>
            <td>
            <select name="branch" style="width:100%">
                <option></option>
                <option>banani</option>
                <option>khilkhet</option>
                <option>uttara</option>
                <option>mirpur</option>
            </select>
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td>Amount:</td>
            <td><input type ="number" name="amount"></td>
        </tr>
        <tr>
            <td colspan="3" align="center"><input type ="submit"></td>
        </tr>

    </table>
    </form>
    </center>
    </td>
    </tr>
    </table>
</body>
</html>