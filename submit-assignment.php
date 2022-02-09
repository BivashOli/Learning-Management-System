<?php

$acode = bin2hex(random_bytes(2));

include_once("connect.php");
session_start();
$class_id = $_SESSION['class_id'];
$title = $_POST['title'];
$description = $_POST['description'];

$sql = "INSERT INTO assignments VALUES(NULL, $class_id, '$title', '$description', '$acode', '0-0-0 0:0:0', '')";

mysqli_query($conn, $sql);

$code = $_SESSION['class_code'];

$result = mysqli_query($conn, "SELECT * FROM classes WHERE class_id = $class_id");
$row = mysqli_fetch_array($result);
$cassignments = json_decode($row["assignment_id_array"]);

$getAssignmentrow = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM assignments WHERE assignment_code = '$acode'"));
$getAssignment = $getAssignmentrow["assignment_id"];
$assignment = array($getAssignment);

$assignments = json_encode(array_merge($cassignments, $assignment));
mysqli_query($conn, "UPDATE classes SET assignment_id_array = '$assignments' where class_id=$class_id");

echo $assignments;
 header("Location: class-content-teacher.php?class_code=$code");
