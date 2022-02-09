<!DOCTYPE html>
<html lang="en">
<head>

<style>
.create{
    text-align: center;
}
.create a{
    background-color: #99738E;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border-radius: 10px;
}
.box{
    text-align: center;
    margin: 10px; 
}

.title{
    text-align: left;
    position: relative;
    left: -120px;
    top: -30px;
}

.due{
    position: relative;
    text-align: right;
    left: 120px;
    top: -45px;
}
.description{
    position: relative;
    left: -150px;
}
.box a:link, a:visited{
    /* color: white;
    text-decoration: none; */
    background-color: #F64C72;
  color: white;
  padding: 50px 150px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border-radius: 10px;

}
.box a:hover, a:active {
    background-color: #F64C72;
    opacity: 0.9;
}

    .header {
    /* box-shadow: 6px 6px rgba(100, 100, 100, 0.4); */
    border-color: black;
    border: groove;
   overflow: hidden; 
   background-color: #2F2FA2; 
  padding: 40px 10px;
  color: white;
  font-family: 'Google Sans',Roboto,Arial,sans-serif; 
  font-size: 1.375rem;
    font-weight: 400;
    line-height: 1.75rem;
}   
  
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="header">
        Nepali School

        <a href="grades-student.php">Grades</a>
      </div>

    <?php


include_once "connect.php";


session_start();
$userId = $_SESSION['userId'];
$class = $_GET['class_code'];
$_SESSION['class_code'] = $class;

$result = mysqli_query($conn, "SELECT * FROM classes WHERE class_code = '$class'");
$row = mysqli_fetch_array($result);
$id = json_decode($row["class_id"]);
$_SESSION["class_id"] = $id;
$assignments = json_decode($row["assignment_id_array"]);

// echo "<pre>";
// print_r($assignments);
// echo "</pre>";



foreach ($assignments as $a){
    $aresult = mysqli_query($conn, "SELECT * FROM assignments WHERE assignment_id = $a");
    $arow = mysqli_fetch_array($aresult);
    $title = $arow['title'];
    $description = $arow['description'];
    $due = $arow['due_date'];
    $aid = $arow['assignment_id'];
    // if(isset($title) || isset($description) || isset($due)){
    echo "<div class='box'>
    <a href='assignment-student.php?class_code=$class&aid=$aid&submitted=0'>
    <div class='title'>

    $title
    </div>
    <div class='due'>
    $due
    </div>
    <div class='description'>
    $description
    </div>
    </a>

    </div>
    ";
    // }
}

    
    ?>



</body>
</html>