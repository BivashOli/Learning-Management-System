<?php

$class_name = $_POST['class_name'];

$code = bin2hex(random_bytes(2));

include_once "connect.php";

$result = mysqli_query($conn, "SELECT * FROM classes WHERE class_code = '$code'");

while(mysqli_num_rows($result) != 0){

    $code = bin2hex(random_bytes(2));
    $result = mysqli_query($conn, "SELECT * FROM classes WHERE class_id = '$code'");
}
    


session_start();
$userId = $_SESSION['userId'];

$moderator = json_encode(array($userId));

$sql = "INSERT INTO classes VALUES(NULL, '[]', '[]', '$moderator', '$moderator', '$class_name', '$code', '[]')";
mysqli_query($conn, $sql);


$id = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM classes WHERE class_code = '$code'"));

$class_id =  $id['class_id'];



$result2 = mysqli_query($conn, "SELECT * FROM users WHERE sub = $userId");
$row2 = mysqli_fetch_array($result2);

$class = array($class_id);
$classes = json_encode(array_merge(json_decode($row2['class_id_array']), $class));
mysqli_query($conn, "UPDATE users SET class_id_array = '$classes' where sub=$userId");

    
 header("Location: class-viewer-teacher.php");


