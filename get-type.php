<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <style>

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
body{
    font-family: 'Google Sans',Roboto,Arial,sans-serif; 
    background-color: deepskyblue;
    z-value: -1;
    text-align: center;
}

.wrapper{
    z-value: -1;     
}
        .contents label{
            font-size: 45px;
            position: relative;
            top: 10vw;
            font-weight: 400;
    line-height: 1.75rem;
    color: yellow;
        }

        .buttons{
            position: relative;
            top: 12vw;
        }  

        .buttons input{
            width: 13vw;
            height: 5vw;   
            margin: 12px;
        }
        </style>
</head>
<body>

<div class="wrapper">
 <div class="contents">

    <label>Are you a...</label>

<div class="buttons">

<form action="teacher.php">
<input type="submit" value="Teacher">
</form>

<form action="student.php">
<input type="submit" value="Student">
</form>

</div>
</div> 
    </div>  
</body>
</html>