<?php

$userPass=1234;
$hash_format = "$2y$07$";
$salt = "akdkdkroadlfiwnmopqwex";
$conC = $hash_format . $salt;
$abc = crypt($userPass, $conC);
echo $abc;
?>