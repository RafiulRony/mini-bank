<?php
session_start();
if(!isset($_SESSION['account'])){
    header('location: index.php');
}
if(isset($_REQUEST['a'])){
    if($_REQUEST['a']==1){
        echo "<h2 style='background-color: green; text-align:center'>You have successfully transferred money</h2>";
    }
}
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "bananibank";
$conn = new mysqli($servername, $username, $password, $dbname);
if(isset($_POST['yourAc']) && isset($_POST['receiverAc'])){
    if($_POST['yourAc']!='' && $_POST['receiverAc']!=''){
        $yourAc=$_POST['yourAc'];
        $pass=$_POST['pass'];
        $rAc=$_POST['receiverAc'];
        $rName=$_POST['rName'];
        $rBranch=$_POST['rBranch'];
        $money=$_POST['money'];
        $sql="select* from user where accountNo=$yourAc";
        $result=$conn->query($sql);
        $user=mysqli_fetch_array($result);
        $sql2="select* from user where accountNo=$rAc";
        $result2=$conn->query($sql2);
        $receiver=mysqli_fetch_array($result2);
        if($yourAc==$_SESSION['account']){
            $hash_format = "$2y$07$";
            $salt = "akdkdkroadlfiwnmopqwex";
            $conC = $hash_format . $salt;
            $pass= crypt($pass, $conC);
            if($user['password']==$pass){
                if($user['balance']>=$money){
                    if($receiver['accountNo']==$rAc && $receiver['name']==$rName && $receiver['branch']==$rBranch){
                        $uMoney=$user['balance']-$money;
                        $rMoney=$receiver['balance']+$money;
                        $minus="update user set balance=$uMoney where accountNo=$yourAc";
                        $conn->query($minus);
                        $add="update user set balance=$rMoney where accountNo=$rAc";
                        $conn->query($add);
                        $transection="INSERT INTO transection (sender, receiver, amount)
                        VALUES ('$yourAc', '$rAc', '$money')";
                        $conn->query($transection);
                        header("location:transfer.php?a=1");
                    }
                    else echo "<h1 style='background-color: red; text-align:center'>Wrong Information.</h1>"; 
                }
                else{
                    echo "<h1 style='background-color: red; text-align:center'>Insufficient Maney.</h1>";
                }
            }
            else{
                echo "<h1 style='background-color: red; text-align:center'>Wrong Password</h1>";
            }
        }
        else{
            echo "<h1 style='background-color: red; text-align:center'>Wrong Account No.</h1>";
        }
    }
    
}


?>
<!DOCTYPE html>
<html>
<head>
<title>Money Transfer</title>
</head>
<body bgcolor="#4d2892">
    <br><br><br><br><br><br><br>
    <center>
    <h1>Money Transfer</h1>
    <form method="POST" action="transfer.php">
    <?php    
    $flag=1;
    ?>
    <table border="1" bgcolor="#6f3881">
        <tr>
            <td>Your Account No:</td>
            <td><input type="number" name="yourAc"></td>
        </tr>
        <tr>
            <td>Receiver Account No:</td>
            <td><input type="number" name="receiverAc"></td>
        </tr>
        <tr>
            <td>Receiver Name:</td>
            <td><input type="text" name="rName"></td>
        </tr>
        <tr>
            <td>Receiver Branch:</td>
            <td>
            <select name="rBranch" style="width:100%">
                <option></option>
                <option>banani</option>
                <option>khilkhet</option>
                <option>uttara</option>
                <option>mirpur</option>
            </select>
            </td>
        </tr>
        <tr>
            <td>Amount of money:</td>
            <td><input type="number" name="money"></td>
        </tr>
        <tr>
            <td>Your Password:</td>
            <td><input type="password" name="pass"></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" value="send"></td>
        </tr>
    </table>
    </form>
    <br><br><br>
    <a href="userpage.php" style="background-color :#ffffff"> ..Cancel.. </a>
    </center>
</body>
</html>