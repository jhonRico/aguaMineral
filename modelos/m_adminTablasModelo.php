<?php

require_once "conexion.php";

 class ModeloRegistroAdmin1
 {
    static public function mdlConsultarTodosRegBD($tabla)

    {   
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt -> execute();
        return  $stmt ->fetchAll();

       
	}
     static public function mdlConsultarRegistroAdd($datos,$tabla) 
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE descripcion = :registroValue");

        $stmt->bindParam(":registroValue", $datos["registroValue"], PDO::PARAM_STR);

        $stmt -> execute();
        return  $stmt ->fetch();
    }
        static public function mdlRegistro($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(descripcion)
                 VALUES  (:registroValue)");
        
        $stmt->bindParam(":registroValue", $datos["registroValue"], PDO::PARAM_STR);
  

        if($stmt->execute()){
            return "ok";
        }else{
            return"Error";
        }
        $stmt->close();
        $stmt=null;
    }
 }
?>