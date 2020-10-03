<?php

include('IParte2.php');

include('IParte3.php');

class Televisor implements IParte2, IParte3
{

    public $_tipo;
    public $_precio;
    public $_paisOrigen;
    public $_path;


    public function __construct($tipo, $precio, $paisOrigen, $path = "")
    {
        $this->_tipo = $tipo;
        $this->_precio = $precio;
        $this->_paisOrigen = $paisOrigen;
        $this->_path = $path;
    }
    public function ToString()
    {
        return sprintf("%s - %s - %s - %s", $this->_tipo, $this->_precio, $this->_paisOrigen, $this->_path);
    }

    public function Agregar()
    {
        try {
            $user = "root";
            $pass = "";
            $obj = new PDO("mysql:host=localhost;dbname=productos_bd;charset=utf8", $user, $pass);
            $consulta = $obj->prepare("INSERT INTO televisores ( tipo, precio, pais, foto)VALUES(?,?,?,?)");
            return $consulta->execute(array($this->_tipo, $this->_precio, $this->_paisOrigen, $this->_path));
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function Traer()
    {
        try {
            $listaTelevisores = array();
            $user = "root";
            $pass = "";
            $db = new PDO("mysql:host=localhost;dbname=productos_bd;charset=utf8", $user, $pass);
            $sql = $db->query("SELECT * FROM televisores");

            while ($fila = $sql->fetch()) {
                $tele = new Televisor($fila[1], $fila[2], $fila[3], $fila[4]);
                array_push($listaTelevisores, $tele);
            }
            return $listaTelevisores;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function CalcularIVA()
    {
        $IVA = ($this->_precio * .21);
        return $this->_precio + $IVA;
    }
    public function Verificar($televisor)
    {
        $noExiste = true;
        $arrayTelevisor = array();
        $arrayTelevisor = $this->Traer();

        foreach ($arrayTelevisor as $key) {
            if ($key->_tipo == $televisor->_tipo && $key->_paisOrigen == $televisor->_paisOrigen) {
                $noExiste = false;
                break;
            }
        }
        return $noExiste;
    }

    public function Modificar($id, $televisor)
    {
        try {
            $user = "root";
            $pass = "";

            $obj = new PDO("mysql:host=localhost;dbname=productos_bd;charset=utf8", $user, $pass);

            $consulta = $obj->prepare("UPDATE televisores
            SET tipo= ?, precio= ?,pais= ?,foto= ?  
            WHERE id=?");
            return $consulta->execute(array($televisor->_tipo, $televisor->_precio, $televisor->_paisOrigen, $televisor->_path, $id));
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
