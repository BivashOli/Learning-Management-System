<?php 

session_start();
$userId = $_SESSION['userId'];

echo "ur id is ". $userId;