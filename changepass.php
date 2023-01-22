<?php
session_start();
if(!isset($_SESSION['account'])){
    header('location: index.php');
}
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "bananibank";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$account=$_SESSION['account'];
if(isset ($_POST['oldpass'])){
    $old=$_POST['oldpass'];
    $new=$_POST['newpass'];
    $conf=$_POST['confpass'];
    if($old!='' && $new!='' && $conf!=''){
        $count=strlen($new);
        if($count>=6 && $count<=10 && $new==$conf){
            $sql = "SELECT password FROM user where accountNo='$account'";
            $result = $conn->query($sql);
            $row=mysqli_fetch_array($result);
            $hash_format = "$2y$07$";
            $salt = "akdkdkroadlfiwnmopqwex";
            $conC = $hash_format . $salt;
            $new= crypt($new, $conC);
            $old= crypt($old, $conC);
            if($row['password']==$old){
                $sql2= "update user set password='$new' where accountNo='$account'";
                $conn->query($sql2);
                echo "<h2 style='background-color: green; text-align:center'>Your password has been changed successfully!!</h2>";
            }
        }
    }
}


?>
<!DOCTYPE html>
<html>
<head>
<title>change password</title>
</head>
<body bgcolor="#6f3992">
    <br><br><br><br><br><br><br>
    <center>
    <h1>Change password</h1>
    <form method="POST" action="changepass.php">
    <?php    
    $flag=1;
    ?>
    <table border="1" bgcolor="#6f3881">
        <tr>
            <td>Current Password</td>
            <td><input type="password" name="oldpass"></td>
        </tr>
        <tr>
            <td>New Password</td>
            <td><input type="password" name="newpass"></td>
        </tr>
        <tr>
            <td>Confirm Password</td>
            <td><input type="password" name="confpass"></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" value="submit"></td>
        </tr>
    </table>
    </form>
    <br><br><br>
    <a href="userpage.php" style="background-color :#ffffff"> ..Back.. </a>
    </center>
</body>
</html>