<?php


include_once "connect.php";

session_start();
$userId = $_SESSION['userId'];

$_SESSION['type'] = 'student';

$sql = "UPDATE users SET type = 'student' where sub=$userId";
// $sql = "INSERT INTO users (type) VALUES('teacher') WHERE sub=$userId";
mysqli_query($conn, $sql);


echo $userId;

header("Location: get-name.html");
exit();