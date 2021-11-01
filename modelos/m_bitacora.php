<?php

require_once "conexion.php";

 class ModeloBitacora
 {
    static public function mdlConsultarTodosRegBD($tabla)

    {   
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt -> execute();
        return  $stmt ->fetchAll();
	}

    static public function mdlRegistroBitacora($tabla,$usuario,$descripcion,$fecha)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (usuario,fechaControl,descripcion)
                 VALUES  (:usuario,:fecha,:descripcion)");
        
        $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
  

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