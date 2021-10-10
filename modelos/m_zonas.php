<?php

require_once "conexion.php";

 class ModeloZonas
 {

    //Consultar Municipios
    static public function mdlconsultarCiudades($tabla)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
          
        $stmt -> execute();  
        $respuesta = $stmt ->fetchAll(); 

        return $respuesta;

    }
    static public function mdlconsultarClientes($tabla,$tipoUsuario)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE TipoUsuario_idTipoUsuario = $tipoUsuario");
          
        $stmt -> execute();  
        $respuesta = $stmt ->fetchAll(); 

        return $respuesta;

    }
  
 }