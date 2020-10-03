<?php
/* ."modificado"."." */
require "./clases/Televisor.php";
$id=$_POST["id"];
$tipo=$_POST["tipo"];
$precio=$_POST["precio"];
$paisOrigen=$_POST["paisOrigen"];
$pathFoto="./televisoresModificados/".$_FILES["foto"]["name"];
$fechaActual= date("h:i:s");
$fechaActual=str_replace(":","",$fechaActual);
$imagenTipo= strtolower(pathinfo($pathFoto,PATHINFO_EXTENSION));
$_FILES["foto"]["name"]=$tipo.".".$paisOrigen."."."modificado".".".$fechaActual.".".$imagenTipo;
$pathFoto="./televisoresModificados/".$_FILES["foto"]["name"];
move_uploaded_file($_FILES["foto"]["tmp_name"], $pathFoto);
$newTelevisor= new Televisor($tipo,$precio,$paisOrigen,$_FILES["foto"]["name"]);

$newTelevisor->Modificar($id,$newTelevisor);