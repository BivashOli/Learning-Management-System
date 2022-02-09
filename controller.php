<?php 
require_once('config.php');


if(isset($_GET['code'])){
    $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
}else{
    header("Location: index.php");
    exit();
}

if(!isset($token['error'])){


$oAuth = new Google_Service_Oauth2($gClient);
$userData = $oAuth->userinfo_v2_me->get();

//echo $token["id_token"];


$payload = $gClient->verifyIdToken($token["id_token"]);
if($payload){
    $userId = $payload['sub'];

    storeUser($userId);

}
//  //$data = array("id_token" => $token["id_token"]);
//  $data = array("id_token" => "sad");

//  $string = http_build_query($data);

// $ch = curl_init("http://localhost/practice2/data.php");
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_POST, true);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_exec($ch);
// curl_close($ch);
 

// header("Location: data.php");
//   exit();
}else{
    header("Location: index.php");
    exit();
}

function storeUser($userId){
    include_once "connect.php";
    $result = mysqli_query($conn, "SELECT * FROM users WHERE sub = $userId");
    if(mysqli_num_rows($result) == 0){
    $sql = "INSERT INTO users VALUES($userId, NULL, '', '', '', '[]')";
    mysqli_query($conn, $sql);
    sessionUser($userId);

    header("Location: get-type.php");
    exit();
    }else{
        sessionUser($userId);
        $row = mysqli_fetch_array($result);
        if($row['type'] == 'teacher'){
            header("Location: class-viewer-teacher.php");
        }else{
            header("Location: class-viewer-student.php");
        }
    }
}

function sessionUser($userId){
    session_start();
    $_SESSION['userId'] = $userId;
}

?>