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

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY nombreCiudad ASC");
          
        $stmt -> execute();  
        $respuesta = $stmt ->fetchAll(); 

        return $respuesta;

    }
    static public function mdlconsultarClientes($tabla,$datos)
    {
        $stmt2 = Conexion::conectar()->prepare("SELECT * FROM zonas WHERE descripcion = :zona");
        $stmt2->bindParam(":zona", $datos['zona'], PDO::PARAM_INT);

        $stmt2 -> execute();  
        $respuesta = $stmt2 ->fetchAll(); 


        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla INNER JOIN tienda ON $tabla.idPersona = tienda.Persona_idPersona INNER JOIN sector ON $tabla.Sector_idSector  = sector.idSector WHERE 
             $tabla.TipoUsuario_idTipoUsuario = :tipoUsuario AND sector.Zonas_idZonas = :idZona");

        $stmt->bindParam(":tipoUsuario", $datos['tipoUsuario'], PDO::PARAM_INT);
        $stmt->bindParam(":idZona", $respuesta['idZonas'], PDO::PARAM_INT);

        $stmt -> execute();  
        $respuesta = $stmt ->fetchAll(); 

        return $respuesta;

    }
  
 }