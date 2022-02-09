<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link href="//db.onlinewebfonts.com/c/5237a1e3a872fc2e31712575aa39235b?family=Visby+Round+CF+Heavy" rel="stylesheet" type="text/css"/>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<style>

body{
    z-value: -1;     
    background-color: deepskyblue;
}

a:link, a:visited{
    /* color: white;
    text-decoration: none; */
    background-color: #99738E;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border-radius: 10px;

}
a:hover, a:active {
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
.container{
    display: grid;
    /* font-family: helvetica; */
    /* font-family: 'Roboto', sans-serif; */
     font-family: 'Google Sans',Roboto,Arial,sans-serif; 
    /* font-family: "Visby Round", sans-serif; */
    font-size: 1.375rem;
    font-weight: 400;
    line-height: 1.75rem;
    color: #fff;
    /* font-family: 'Google Sans', Roboto ,Arial,sans-serif'; */

}
.box{
  box-shadow: 8px 8px rgba(100, 100, 100, 0.6);
    margin: 15px auto;
    padding: 40px 10px;
    width: 30vw;
    text-align: center;
    border-radius: 10px;
     background-color: #2F2FA2; 

    height: 8vw;
}

.buttons{
    margin: 15px auto;
    padding: 40px 10px;
    width: 30vw;
    text-align: center;
}


/* .box:hover {
    opacity: 0.8;
} */

.name{
    padding:  0px   10px;
    font-size: 40px;
    /* background-color: blue; */
}

.mod{
    padding: 40px 10px;
    /* background-color: white; */
}


</style>

</head>
<body>




<div class="wrapper">

<div class="header">
            Nepali School 
          </div>

<div class="container">

<?php

 include_once "connect.php";


 session_start();
 $userId = $_SESSION['userId'];

//  echo $userId;
 $result = mysqli_query($conn, "SELECT * FROM users WHERE sub = '$userId'");
$row = mysqli_fetch_array($result);
$classes = json_decode($row["class_id_array"]);

  //  header("Location: code.txt");
 foreach($classes as $class){

//$script = file_get_contents('code.txt');
    
//echo $script;

     $classresult = mysqli_query($conn, "SELECT * FROM classes WHERE class_id = '$class'");
     if($classresult->num_rows > 0){

     $classrow = mysqli_fetch_array($classresult);
     $class_name = $classrow['class_name'];
     $class_code = $classrow['class_code'];
     $class_moderators = json_decode($classrow['moderators_array']);
    $class_moderator_code = $class_moderators[0];
    
    $moderatorcode = mysqli_query($conn, "SELECT * FROM users WHERE sub = '$class_moderator_code'");
    $moderatorrow =mysqli_fetch_array($moderatorcode);
    $first = $moderatorrow['firstname'];
    $last = $moderatorrow['lastname'];
    $moderator = $first . " " . $last;
   
    
   echo "
   <div class = 'box'>


 <div class = 'name'>
<a href = 'class-content-student.php?class_code=$class_code'>
    $class_name 
    </a>
    </div>
    
    <div class = 'mod'>
    $moderator     $class_code    

    </div>
    
    <div> 
    </div>
    </div>
    
    ";
     }
 }


?>






<div class="buttons">

<form action="join-class.html">


<input type="submit" value="Join Class">
</form>
</div>


</div>






</div>



</body>
</html>