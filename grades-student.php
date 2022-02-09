<?php

session_start();
$sub = $_SESSION['userId'];
$id = $_SESSION['class_id'];
include_once('connect.php');
$result = mysqli_query($conn, "SELECT * FROM responses WHERE sub='$sub' AND class_id=$id");

$sum = 0;
$count = 0;
while($row = mysqli_fetch_array($result)){
    $sum += $row['grade'];
    $count++;
} 

echo $sum / $count;
