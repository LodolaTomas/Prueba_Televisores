<?php

require "./clases/Televisor.php";

$tipo=$_POST["tipo"];
$precio=$_POST["precio"];
$paisOrigen=$_POST["paisOrigen"];
$pathFoto="./televisores/imagenes/".$_FILES["foto"]["name"];
$imagenTipo= strtolower(pathinfo($pathFoto,PATHINFO_EXTENSION));
$fechaActual= date("h:i:s");
$fechaActual=str_replace(":","",$fechaActual);
$_FILES["foto"]["name"]=$tipo.".".$paisOrigen.".".$fechaActual.".".$imagenTipo;
$pathFoto="./televisores/imagenes/".$_FILES["foto"]["name"];
move_uploaded_file($_FILES["foto"]["tmp_name"], $pathFoto);
$newTelevisor= new Televisor($tipo,$precio,$paisOrigen,$_FILES["foto"]["name"]);

$newTelevisor->Agregar();

