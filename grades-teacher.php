<?php

session_start();
include_once('connect.php');
$code = $_SESSION['class_code'];
$row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM classes where class_code = '$code'")); 

$users = json_decode($row['user_id_array']); 
echo $code . "<br>";
foreach ($users as $u){
    echo $u . "<br>";
}