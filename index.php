<?php
require_once("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
body{
    background-color: deepskyblue;
}

.buttons{
    padding: 40px 10px;

}

.buttons button{

    position: relative;
    top: 200px;
    margin: 10px;
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
</head>
<body>
    <div class="header">
        Nepali School
      </div>

      <center>
      <div class="buttons">
          <div>
        <button onclick="window.location = '<?php echo $login_url ?>'" type="button" class="login_button">Google</button>
</div>
<div>
        <button onclick="window.location = '<?php echo $login_url ?>'" type="button" class="login_button">Facebook</button>
</div> 
<div>        
<button onclick="window.location = '<?php echo $login_url ?>'" type="button" class="login_button">Apple</button>
</div>
        </div>
      </center>

</body>
</html>