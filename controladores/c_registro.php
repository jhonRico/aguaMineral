<?php


class ControladorRegistro
{ 
  
    static public function ctrlConsultarAllUsers($usuario,$contrasena)
    {
        
    $tabla = "usuario";
    $datos = array(
             "usuario"=>$usuario,
             "contrasena"=>$contrasena
         );

        $respuesta = ModeloRegistro::mdlConsultarAllUsers($tabla,$datos);

        session_start();

        $_SESSION['usuarioAuditoria'] = $respuesta[2];
        $_SESSION['username'] = $respuesta[8];
        return $respuesta;

    }
    static public function ctrlAddUser($nombre,$apellido,$direccion,$cedula,$telefono,$correo,$sector,$tipoUsuario,$contrasena)
    {

    date_default_timezone_set("America/Bogota");
    $tabla = "persona";
    $tabla2 = "usuario";
    $datos = array(
             "nombre"=>$nombre,
             "apellido"=>$apellido,
             "direccion"=>$direccion,
             "cedula"=>$cedula,
             "telefono"=>$telefono,
             "correo"=>$correo,
             "sector"=>$sector,
             "tipoUsuario"=>$tipoUsuario,
             "contrasena"=>$contrasena,
             "vacio" => date("Y-m-d H:i:s")
         );

        $respuesta = ModeloRegistro::mdlRegistroUsuario($tabla,$tabla2,$datos);
        return $respuesta;
    }
}