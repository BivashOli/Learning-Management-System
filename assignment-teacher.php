<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 

session_start();
$user_id =$_SESSION['userId'];

include_once("connect.php");
$aid = $_GET['aid'];

$row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM assignments WHERE assignment_id = $aid"));
$title = $row['title'];
$description = $row['description'];
$due = $row['due_date'];

echo "<p> $title </p>";
echo "<p> $description </p>";
echo "<p> $due </p>";

$rresult = mysqli_query($conn, "SELECT * FROM responses WHERE assignment_id = $aid");

while($rrow = mysqli_fetch_assoc($rresult)){
    // $pic = $rrow['img_path'];
    $sub = $rrow['sub'];
    $rcode = $rrow['response_code'];
    $grade = $rrow['grade'];
    //  echo "<img src='$pic'/>";
    echo "<a href='response.php?rcode=$rcode' target='_blank' >aa</a>";
    echo "$grade";
    echo "<br>";

}


?>    
</body>
</html>




