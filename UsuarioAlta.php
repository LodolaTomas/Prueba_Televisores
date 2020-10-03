<?php
require "./clases/Usuario.php";

$email=$_POST["email"]??NULL;
$clave=$_POST["clave"]??NULL;

$newUsuario= new Usuario($email,$clave);

echo $newUsuario->GuardarEnArchivo();
