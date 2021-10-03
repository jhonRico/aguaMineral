<?php

require_once "conexion.php";

 class ModeloRegistroAdmin
 {

    static public function mdlRegistroAdmin($tabla , $datos){

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

    static public function mdlConsultarPais($tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt -> execute();
        return  $stmt ->fetch();
	}

    //Consultar Usuario
    static public function mdlConsultarAllUsers($tabla, $datos)
    {

        //session_start();

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE TipoUsuario_idTipoUsuario  = :tipoUsuario AND usuario = :usuario AND contrasena = :contrasena");


        $stmt->bindParam(":tipoUsuario", $datos["tipoUsuario"], PDO::PARAM_INT);
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":contrasena", $datos["contrasena"], PDO::PARAM_STR);

        $stmt -> execute();
        return  $stmt ->fetch(); 


        //$_SESSION['username'] = $datos['usuario'];


    }

    /**************************************************
     * Actualizar campo verificar de la tabla usuario *
     * ************************************************/
    /*static public function mdlActualizarUsuario($tabla, $id, $item, $valor){
        
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item = :$item WHERE idUsuario = :idUsuario");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> bindParam(":idUsuario", $id, PDO::PARAM_INT);
        
        if($stmt -> execute()){
            return "ok";
        }else{
            return"Error";
        }

        $stmt -> close();
        $stmt = null;


    }*/
 }