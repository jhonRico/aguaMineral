<?php

require_once "conexion.php";

 class ModeloRegistroAdminGeneral
 {
    static public function mdlConsultarTodosRegBD($tabla)

    {   
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt -> execute();
        return  $stmt ->fetchAll();

       
	}
     static public function mdlConsultarRegistroAdd($datos,$tabla,$atributoComparar) 
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $atributoComparar = :registroValue");
        $stmt->bindParam(":registroValue", $datos["registroValue"], PDO::PARAM_STR);        

        $stmt -> execute();
        return  $stmt ->fetch();
    }
    static public function mdlAddregistroTipUser($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (descripcion)
                 VALUES  (:registroValue)");
        
        $stmt->bindParam(":registroValue", $datos["registroValueTipUser"], PDO::PARAM_STR);
  

        if($stmt->execute()){
            return "ok";
        }else{
            return"Error";
        }
        $stmt->close();
        $stmt=null;
    }

      static public function mdlEliminarOfTable($tabla, $datos,$atributo)
     {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $atributo = :idTable");        
        $stmt->bindParam(":idTable", $datos["idTable"], PDO::PARAM_INT);  

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

    static public function mdlModificarOfTable($tabla, $datos,$atributoSet,$atributoWhere)
     {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $atributoSet = :descripcion WHERE $atributoWhere = :idTable");
        
        $stmt->bindParam(":idTable", $datos["idTable"], PDO::PARAM_INT);
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


   static public function mdladdOfTableDosParametrosAsociada($tabla, $datos,$atributo1,$atributo2)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla ($atributo1,$atributo2)
                 VALUES  (:parametro1,:parametro2)");
        
        $stmt->bindParam(":parametro1", $datos["parametro1"], PDO::PARAM_STR);
        $stmt->bindParam(":parametro2", $datos["parametro2"], PDO::PARAM_INT);
  

        if($stmt->execute()){
            return "ok";
        }else{
            return"Error";
        }
        $stmt->close();
        $stmt=null;
    }

    //-----------------Metodo que consulta un registro por dos parametros en el where pero uno de ellos es un int-------------------------
   static public function mdlconsultarRegistroExisteBDEnTablaDosParamtrosAsociada($datos,$tabla,$atributo1,$atributo2) 
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $atributo1 = :parametro1 and $atributo2 = :parametro2" );
        $stmt->bindParam(":parametro1", $datos["parametro1"], PDO::PARAM_STR);
        $stmt->bindParam(":parametro2", $datos["parametro2"], PDO::PARAM_INT);

        $stmt -> execute();
        return  $stmt ->fetch();
    }


 }
?>