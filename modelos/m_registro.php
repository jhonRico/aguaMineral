<?php

require_once "conexion.php";

 class ModeloRegistro
 {

    static public function mdlRegistroUsuario($tabla,$tabla2,$datos){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla2 WHERE correoUsuario = :correo");
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt->execute();
        $resultado = $stmt ->fetch(); 

        if ($resultado != false) 
        {
            return "ya existe";
        }else
        {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(TipoUsuario_idTipoUsuario, Sector_idSector, nombrePersona, apellidoPersona,direccionPersona, cedulaPersona, telefonoPersona)
                 VALUES  (:tipoUsuario, :sector, :nombre, :apellido, :direccion, :cedula, :telefono)");

                $stmt->bindParam(":tipoUsuario", $datos["tipoUsuario"], PDO::PARAM_INT);
                $stmt->bindParam(":sector", $datos["sector"], PDO::PARAM_INT);
                $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
                $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
                $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
                $stmt->bindParam(":cedula", $datos["cedula"], PDO::PARAM_INT);
                $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_INT);

                if ($stmt->execute()) 
                {

                       $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla2(TipoUsuario_idTipoUsuario,correoUsuario,clave,fechaRegistro)
                             VALUES  (:tipoUsuario , :correo ,:contrasena, :vacio)");


                        $stmt->bindParam(":tipoUsuario", $datos["tipoUsuario"], PDO::PARAM_INT);
                        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
                        $stmt->bindParam(":contrasena", md5($datos["contrasena"]), PDO::PARAM_STR);
                        $stmt->bindParam(":vacio", $datos["vacio"], PDO::PARAM_STR);
                   
                        if($stmt->execute())
                        {
                            return "ok";
                        }else
                        {
                            return "error";
                        }
                } 
        }

        
                   
        
      /*  $stmt2->close();
        $stmt2=null;*/

        $stmt->close();
        $stmt=null;
    }

    //Consultar Usuario
    static public function mdlConsultarAllUsers($tabla, $datos)
    {

        //Consultar Para Iniciar Sesions

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE correoUsuario = :usuario");
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR); 
        $stmt -> execute(); 
        $respuesta = $stmt ->fetch();
        if ($respuesta != false) 
        {
            $stmt2 = Conexion::conectar()->prepare("SELECT * FROM usuario t INNER JOIN tipousuario t2 ON t.TipoUsuario_idTipoUsuario = t2.idTipoUsuario WHERE t.clave = :contrasena");
            $contrasena = md5($datos["contrasena"]);
            $stmt2->bindParam(":contrasena", $contrasena, PDO::PARAM_STR);
            $stmt2->execute();
            $respuesta = $stmt2 ->fetch();
            if ($respuesta != false) 
            {
                return $respuesta;
            }else
            {
                return "falsePassword";
            }
            $stmt2 -> close();
            $stmt2 = null;
        }else
        {
            return "falseUser";
            $stmt -> close();
            $stmt = null;
        }  
         



    }
   /* consultarUsuarioActual()
    {
         $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE correoUsuario = :usuario");

        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":contrasena", md5($datos["contrasena"]), PDO::PARAM_STR);
    }
*/
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