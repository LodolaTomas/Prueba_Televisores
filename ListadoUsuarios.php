<?php


require "./clases/Usuario.php";

$listaUsuarios=array();
$listaUsuarios=Usuario::TraerTodos();
foreach($listaUsuarios as $usuario){
    echo'<tr><td><br>'. $usuario->ToString(),'<br></td></tr>';
}