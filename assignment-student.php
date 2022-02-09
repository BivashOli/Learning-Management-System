<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 

include_once("connect.php");

$aid = $_GET['aid'];

session_start();
$_SESSION['aid'] = $aid;
$userId = $_SESSION['userId'];

$row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM assignments WHERE assignment_id = $aid"));
$title = $row['title'];
$description = $row['description'];
$due = $row['due_date'];

if($_GET["submitted"] == 1){
    echo "<p>Submitted</p>";    
}
echo "<p> $title </p>";
echo "<p> $description </p>";
echo "<p> $due </p>";

// $rrow = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM responses WHERE response_id = $rid"));
// $rrow = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM responses WHERE assignment_id = $aid"));
// if(mysqli_num_rows($rrow) != 0){
    $rresult = mysqli_query($conn, "SELECT * FROM responses WHERE assignment_id = $aid");

    if($rresult){
        $rrow = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM responses WHERE assignment_id = $aid and sub ='$userId'"));
if(isset($rrow['submitted'])){
    if($rrow["submitted"] == 1){
    $rid = $rrow['response_id'];
    echo "<form action='upload.php?rid=$rid' method='POST' enctype='multipart/form-data'>";
    echo "<form action='upload.php?rid=-1' method='POST' enctype='multipart/form-data'>";
echo "<input type='file' name='file'>";
    echo"<button type='submit' name='unsubmit' >Unsubmit</button>";
    }
}else{
    echo "<form action='upload.php?rid=-1' method='POST' enctype='multipart/form-data'>";
    echo "<input type='file' name='file'>";
    echo"<button type='submit' name='submit' >Submit Response</button>";
    echo "</form>";
}
}
?>

</body>
</html>


