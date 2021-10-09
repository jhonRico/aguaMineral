<?php

require_once "conexion.php";

 class ModeloRegistroAdmin
 {
    static public function mdlConsultarTodosRegBD($tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt -> execute();
        return  $stmt ->fetchAll();

       
	}
 }
?>