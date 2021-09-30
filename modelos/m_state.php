<?php

require_once "conexion.php";

 class ModeloState{

     static public function mdlConsultarAllStates(){
        $stmt = Conexion::conectar()->prepare("SELECT * from estado");        
        $stmt -> execute();
        return  $stmt ->fetchAll(); 
     }
     /*Registra un nuevo estado*/
     static public function ctrlRegistroComentarios($tabla , $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombreEstado,apeliidoEstado)
                 VALUES  (:nombreDelEstado,:apellidodelestado)");
               
        $stmt->bindParam(":nombreDelEstado", $datos["nameValue"], PDO::PARAM_STR); 
        

        if($stmt->execute()){
            return "ok";
        }else{
            return"Error";
        }
        $stmt->close();
        $stmt=null;
    }

 }