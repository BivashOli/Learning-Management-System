<?php

include_once "connect.php";

$code = $_POST['class-code'];

session_start();
$userId = $_SESSION['userId'];

$a = mysqli_query($conn, "SELECT * FROM classes WHERE class_code = '$code'");
if($a->num_rows > 0){

$id = mysqli_fetch_array($a);
$class_id =  $id['class_id'];
//checks to see if user is already in class

//gets the list of classes the user is already in
$class_list = mysqli_query($conn, "SELECT * FROM users WHERE sub=$userId");
$class_row = mysqli_fetch_array($class_list);
$class_array = json_decode($class_row['class_id_array']);
$b = TRUE;
foreach ($class_array as $i){
    if($i == $class_id){
        $b = FALSE;
    }
}

if($b == TRUE){
$result = mysqli_query($conn, "SELECT * FROM classes");
$usersInClass = NULL;   
$user = array($userId);

if($result->num_rows > 0){
    while($row = mysqli_fetch_array($result)){
        if($row["class_code"] == $code){
          //  echo "it worked";
            $usersInClass = json_encode(array_merge(json_decode($row['user_id_array']), $user));
           // echo $usersInClass;
            $sql = "UPDATE classes SET user_id_array = '$usersInClass' where class_code=$code";
            $rresult = mysqli_query($conn, $sql);
            if(!$result){
                echo "ASd";
            }
         
        }
    }
}


echo $class_id;

$result2 = mysqli_query($conn, "SELECT * FROM users WHERE sub = $userId");
$row2 = mysqli_fetch_array($result2);

$class = array($class_id);
$classes = json_encode(array_merge(json_decode($row2['class_id_array']), $class));
mysqli_query($conn, "UPDATE users SET class_id_array = '$classes' where sub=$userId");


$type = $_SESSION['type'];

if($type == 'teacher'){
    header('Location: class-viewer-teacher.php');
}else{
    header('Location: class-viewer-student.php');
}
}
else{
    echo "failed!";
 }

}else{
    $type = $_SESSION['type'];
    echo "<script> alert('Invald Class Code!'); window.location = 'class-viewer-$type.php'</script>";
}