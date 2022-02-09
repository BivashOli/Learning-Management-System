<?php
session_start();
$code = $_SESSION['class_code'];
$aid = $_SESSION['aid'];
$user_id =$_SESSION['userId'];

if(isset($_POST['submit'])){
    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
    $fileDestination = 'uploads/'.$fileNameNew;
    move_uploaded_file($fileTmpName, $fileDestination);

    include_once("connect.php");

$result = mysqli_query($conn, "SELECT * FROM classes WHERE class_code = '$code'");
$row = mysqli_fetch_array($result);
$id = json_decode($row["class_id"]);
$rcode = bin2hex(random_bytes(2));

mysqli_query($conn, "INSERT INTO responses VALUES(NULL, $aid, $id, '', '$rcode', '$fileDestination', '$user_id', 0, 1, 0)");
$row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM responses WHERE response_code = '$rcode'"));
mysqli_query($conn, "UPDATE responses SET submitted = 1 WHERE response_code = '$rcode'");

header("Location: assignment-student.php?class_code=$class&aid=$aid&submitted=1&rid=$id");

}

if(isset($_POST['unsubmit'])){
    $rid = $_GET['rid'];
    include_once("connect.php");
    mysqli_query($conn, $sql = "UPDATE responses SET img_path = '' where response_id=$rid");
    header("Location: assignment-student.php?class_code=$code&aid=$aid&rid=-1");

}

