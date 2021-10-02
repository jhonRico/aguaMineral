<?php


class ControladorRegistro
{ 
  
    static public function ctrlConsultarAllUsers($tipoUsuario,$usuario,$contrasena)
    {
        
    $tabla = "persona";
    $datos = array(
             "tipoUsuario"=>$tipoUsuario,
             "usuario"=>$usuario,
             "contrasena"=>$contrasena
         );

        $respuesta = ModeloRegistro::mdlConsultarAllUsers($tabla,$datos);
        return $respuesta;

	}
    static public function ctrlAddUser($nombre,$apellido,$direccion,$cedula,$telefono,$correo,$sector,$tipoUsuario,$usuario,$contrasena){

    $tabla = "persona";
    $datos = array(
             "nombre"=>$nombre,
             "apellido"=>$apellido,
             "direccion"=>$direccion,
             "cedula"=>$cedula,
             "telefono"=>$telefono,
             "correo"=>$correo,
             "sector"=>$sector,
             "tipoUsuario"=>$tipoUsuario,
             "usuario"=>$usuario,
             "contrasena"=>$contrasena
         );

        $respuesta = ModeloRegistro::mdlRegistroUsuario($tabla,$datos);
        return $respuesta;
	}
}