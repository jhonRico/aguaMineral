<?php

require_once "conexion.php";

 class ModeloRegistroAdmin
 {
    //Tipo Producto 
    static public function mdlRegistrarTipoProducto($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(descripcion)
                 VALUES  (:descripcion)");
        
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
  

        if($stmt->execute()){
            return "ok";
        }else{
            return"Error";
        }
        $stmt->close();
        $stmt=null;
    }
    static public function mdlConsultarTipoProducto($tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt -> execute();
        return  $stmt ->fetchAll();      
    }
    static public function mdlModificarTipoProducto($tabla,$datos)
    {
         $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET descripcion = :descripcion WHERE idTipoProducto = :idTipoProducto");

        $stmt->bindParam(":idTipoProducto", $datos["idTipoProducto"], PDO::PARAM_INT);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);

        if($stmt->execute())
        {
            return "ok";
        }else
        {
            return"Error";
        }
        $stmt->close();
        $stmt=null;    
    }
    static public function mdlEliminarTipoProducto($tabla, $datos)
     {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idTipoProducto = :idTipoProducto");
        $stmt->bindParam(":idTipoProducto", $datos["idTipoProducto"], PDO::PARAM_INT);
        
        if($stmt->execute())
        {
            return "ok";
        }else
        {
            return"Error";
        }
        $stmt->close();
        $stmt=null;
    }
    //Paises
    static public function mdlRegistroAdmin($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(descripcion)
                 VALUES  (:descripPais)");
        
        $stmt->bindParam(":descripPais", $datos["nombrePais"], PDO::PARAM_STR);
  

        if($stmt->execute()){
            return "ok";
        }else{
            return"Error";
        }
        $stmt->close();
        $stmt=null;
    }
     static public function mdlEliminarPais($tabla, $datos)
     {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idPais = :idPais");
        
        $stmt->bindParam(":idPais", $datos["idPais"], PDO::PARAM_INT);
  

        if($stmt->execute())
        {
            return "ok";
        }else
        {
            return"Error";
        }
        $stmt->close();
        $stmt=null;
    }
    static public function mdlModificarPais($tabla, $datos)
     {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET descripcion = :descripcion WHERE idPais = :idPais");
        
        $stmt->bindParam(":idPais", $datos["idPais"], PDO::PARAM_INT);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
  

        if($stmt->execute())
        {
            return "ok";
        }else
        {
            return"Error";
        }
        $stmt->close();
        $stmt=null;
    }

    static public function mdlConsultarPais($tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt -> execute();
        return  $stmt ->fetchAll();

       
	}

    static public function mdlConsultarRegistroPais($tabla,$datos)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE descripcion = :registroPais");

        $stmt->bindParam(":registroPais", $datos["registroPais"], PDO::PARAM_STR);

        $stmt -> execute();
        return  $stmt ->fetch();
    }

}

?>

   