<?php
require "./clases/Usuario.php";

$email=$_POST["email"]??NULL;
$clave=$_POST["clave"]??NULL;
$newUsuario= new Usuario($email,$clave);
if(Usuario::VerificarExistencia($newUsuario)){
setcookie($email,date('h:i:s A'));
}

var_dump($_COOKIE);