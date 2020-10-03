<?php

class Usuario
{
    private $_email;
    private $_clave;


    public function __construct($email,$clave)
    {
        $this->_email=$email;
        $this->_clave=$clave;
    }

    public function GetEmail(){
        return $this->_email;
    }
    public function GetClave(){
        return $this->_clave;
    }

    public function ToString(){
        return sprintf("%s - %s",$this->GetEmail(),$this->GetClave());
    }

    function GuardarEnArchivo(): string
    {
        $nombreArchivo=".\archivos\usuarios.txt";
        $retorno="No se ah podido agregar al Usuario";
        $archivo = fopen($nombreArchivo, "a+");
        if ($archivo) {
            fwrite($archivo, $this->ToString() . "\r\n");
            $retorno="Usuario Agregado";
            fclose($archivo);
        }
        return $retorno;
    }

    static function TraerTodos() {
        $nombreArchivo=".\archivos\usuarios.txt";
        $archivo=fopen($nombreArchivo,"r");
        $datos=array();
        $listaUsuarios=array();
        if($archivo){
            while(!feof($archivo)){
                $cadena=fgets($archivo);
                $datos=explode(' - ',$cadena);
                if(count($datos)==2){
                    $newUsuario= new Usuario($datos[0],chop($datos[1]));
                    array_push($listaUsuarios,$newUsuario);
                }
            }
            fclose($archivo);
        }
        return $listaUsuarios;
    }
    static function VerificarExistencia($usuario): bool{
        $flag=false;
        $listaUsuarios=Usuario::TraerTodos();
        foreach($listaUsuarios as $unUsuario){
            if($unUsuario==$usuario)
            $flag= true;
        }
        return $flag;
    }


}
