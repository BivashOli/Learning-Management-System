<?php 

$sname = "localhost";
$uname = "root";
$pwrd = "bivuti06";  

$db_name = "practice2";
$conn = mysqli_connect($sname, $uname, $pwrd, $db_name);
if(!$conn){
    echo "Connection failed";
}

