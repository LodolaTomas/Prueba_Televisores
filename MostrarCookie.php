<?php
$email = $_GET["email"]?? null;
$existCookie = false;
$valueCookie;
$email=str_replace(".","_",$email);
var_dump($_COOKIE);
foreach ($_COOKIE as $key => $value) {
    if ($email == $key){
        $existCookie = true;
        $valueCookie=$value;
    break;
    }
}


if($existCookie==true){
    echo "La cookie Existe:".$valueCookie."\r\n";
}else{
    echo "La cookie no Existe";
}