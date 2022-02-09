<?php

include_once "connect.php";

session_start();
$userId = $_SESSION['userId'];
$type = $_SESSION['type'];

$first_name = $_POST['first'];
$last_name = $_POST['last'];
$email = $_POST['email'];

$sql = "UPDATE users SET firstname = '$first_name', lastname = '$last_name', email = '$email' where sub=$userId";

mysqli_query($conn, $sql);

if($type == 'teacher'){
    header('Location: class-viewer-teacher.php');
}else{
    header('Location: class-viewer-student.php');
}