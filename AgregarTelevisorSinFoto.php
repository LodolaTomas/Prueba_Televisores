<?php
require "./clases/Televisor.php";

$tipo=$_POST["tipo"];
$precio=$_POST["precio"];
$paisOrigen=$_POST["paisOrigen"];

$televisorSinFoto= new Televisor($tipo,$precio,$paisOrigen);

if($televisorSinFoto->Verificar($televisorSinFoto)){
    $televisorSinFoto->Agregar();
}else{
    echo "El Televisor ya Existe!.";
}


