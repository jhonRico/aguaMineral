<?php

require_once "conexion.php";

 class ModeloZonas
 {

    //Consultar Municipios
    static public function mdlconsultarZonas($tabla)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
          
        $stmt -> execute();  
        $respuesta = $stmt ->fetchAll(); 

        return $respuesta;

    }
    static public function mdlconsultarCiudades($tabla)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
          
        $stmt -> execute();  
        $respuesta = $stmt ->fetchAll(); 

        return $respuesta;

    }
    static public function mdlconsultarClientes($tabla,$tipoUsuario)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla INNER JOIN tienda ON $tabla.idPersona = tienda.Persona_idPersona INNER JOIN sector ON $tabla.Sector_idSector  = sector.idSector WHERE 
             $tabla.TipoUsuario_idTipoUsuario = $tipoUsuario");
          
        $stmt -> execute();  
        $respuesta = $stmt ->fetchAll(); 

        return $respuesta;

    }
  
 }