<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>

    <style>
        img{
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <?php 
    $rcode = $_GET['rcode'];

    include_once('connect.php');
    $row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM responses WHERE response_code = '$rcode'"));

    $path = $row['img_path'];
    echo "<img src='$path'>";
    echo '<br>';

    echo " <div class='grade'>
    <form action = 'grade.php?rcode=$rcode' method = 'post'>

    <input type='text' name='score' placeholder='Grade'>
    /100    
    <input type ='submit'> 
    </form>
</div>";
    ?>
   
</body>
</html>