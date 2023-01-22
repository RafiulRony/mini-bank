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
    <center>   
    <form method="POST" action="insert.php"> 
    <table border="3" bgcolor="#6e55a8">
        <tr>
            <td>1</td>
            <td>Name:</td>
            <td><input type ="text" name="name"></td>
        </tr>
        <tr>
            <td>2</td>
            <td>Email:</td>
            <td><input type ="email" name="email"></td>
        </tr>
        <tr>
            <td>3</td>
            <td>Password:</td>
            <td><input type ="password" name="pass"></td>
        </tr>
        <tr>
            <td>4</td>
            <td>Balance:</td>
            <td><input type ="number" name="balance" value="1000"></td>
        </tr>
        <tr>
            <td>5</td>
            <td>Branch:</td>
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
            <td>6</td>
            <td>AccountType:</td>
            <td>
            <select name="actype" style="width:100%">
                <option></option>
                <option>saving</option>
                <option>current</option>
            </select>
            </td>
        </tr>
        <tr>
            <td>7</td>
            <td>Mobile No:</td>
            <td><input type ="number" name="mobile"></td>
        </tr>
        <tr>
            <td>8</td>
            <td>User Type:</td>
            <td>
            <select name="utype" style="width:100%">
                <option></option>
                <option>user</option>
=            </select>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center"><input type ="submit"></td>
        </tr>

    </table>
    </form>
    <?php

    if(isset($_SESSION['flag'])){
        if($_SESSION['flag']==1){
            echo "New Account added successfully.";
            $_SESSION['flag']='';
        }
        else if($_SESSION['flag']==2){
            echo "Error.....";
            $_SESSION['flag']='';
        }
    }
    ?>
    </center>
    </td>
    </tr>
    </table>
</body>
</html>