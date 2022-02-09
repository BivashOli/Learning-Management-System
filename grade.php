<?php

$rcode = $_GET['rcode'];
$score = $_POST['score'];

include_once('connect.php');
mysqli_query($conn, "UPDATE responses SET grade = $score WHERE response_code = '$rcode'");
mysqli_query($conn, "UPDATE responses SET graded = 1 WHERE response_code = '$rcode'");


header('Location: response.php?rcode='.$rcode);