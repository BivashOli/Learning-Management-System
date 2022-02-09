<?php


include_once "connect.php";

session_start();
$userId = $_SESSION['userId'];

$_SESSION['type'] = 'teacher';

$sql = "UPDATE users SET type = 'teacher' where sub=$userId";
// $sql = "INSERT INTO users (type) VALUES('teacher') WHERE sub=$userId";
mysqli_query($conn, $sql);

header("Location: get-name.html");
exit();

//echo $userId;  

