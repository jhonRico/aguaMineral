<?php

require_once "conexion.php";

 class ModeloRegistro
 {

    static public function mdlRegistroUsuario($tabla , $datos, $tabla2){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(TipoUsuario_idTipoUsuario, Sector_idSector, nombrePersona, apellidoPersona,direccionPersona, cedulaPersona, telefonoPersona, correoPersona)
                 VALUES  (:tipoUsuario, :sector, :nombre, :apellido, :direccion, :cedula, :telefono, :correo)");

            $stmt2 = Conexion::conectar()->prepare("INSERT INTO $tabla2(TipoUsuario_idTipoUsuario,correoUsuario,clave,fechaRegistro)
                 VALUES  (:tipoUsuario , :correo ,:contrasena, :vacio)");


        $stmt2->bindParam(":tipoUsuario", $datos["tipoUsuario"], PDO::PARAM_INT);
        $stmt->bindParam(":tipoUsuario", $datos["tipoUsuario"], PDO::PARAM_INT);
        $stmt->bindParam(":sector", $datos["sector"], PDO::PARAM_INT);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":cedula", $datos["cedula"], PDO::PARAM_INT);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_INT);
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt2->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt2->bindParam(":contrasena", $datos["contrasena"], PDO::PARAM_STR);
        $stmt2->bindParam(":vacio", $datos["vacio"], PDO::PARAM_STR);


        if ($stmt2->execute()) 
        {
            if($stmt->execute())
            {
                return "ok";
            }
        }   
        else
        {
            return "error";
        }

      /*  $stmt2->close();
        $stmt2=null;*/

        $stmt->close();
        $stmt=null;
    }

    //Consultar Usuario
    static public function mdlConsultarAllUsers($tabla, $datos)
    {

        //session_start();

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE TipoUsuario_idTipoUsuario  = :tipoUsuario AND correoUsuario = :usuario AND clave = :contrasena");


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