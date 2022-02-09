<?php

require_once('google-api/vendor/autoload.php');
$gClient = new Google_Client();
//$gClient->setClientId("");
//$gClient->setClientSecret("");
$gClient->setApplicationName("Login Test");
//$gClient->setRedirectUri("http://localhost/signuporlogin/controller.php");
//$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

$login_url = $gClient->createAuthUrl();

?>