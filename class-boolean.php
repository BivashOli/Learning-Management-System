<?php

session_start();
$_SESSION['bool'] = true;
$code= $_SESSION['class_code'];
header("Location: class-content-teacher.php?class_code=$code");
?>