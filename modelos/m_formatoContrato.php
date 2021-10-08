<?php

require_once "conexion.php";

 class ModeloFormatoContrato
 {

    static public function mdlConsultarFormatoContrato($tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt -> execute();
        return  $stmt ->fetchAll();
	}

}

?>

   