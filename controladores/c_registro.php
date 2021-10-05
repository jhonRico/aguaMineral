<?php


class ControladorRegistro
{ 
  
    static public function ctrlConsultarAllUsers($tipoUsuario,$usuario,$contrasena)
    {
        
    $tabla = "usuario";
    $datos = array(
             "tipoUsuario"=>$tipoUsuario,
             "usuario"=>$usuario,
             "contrasena"=>$contrasena
         );

        $respuesta = ModeloRegistro::mdlConsultarAllUsers($tabla,$datos);
        return $respuesta;

	}
    static public function ctrlAddUser($nombre,$apellido,$direccion,$cedula,$telefono,$correo,$sector,$tipoUsuario,$contrasena){

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
             "vacio" => " "
         );

        $respuesta = ModeloRegistro::mdlRegistroUsuario($tabla,$datos,$tabla2);
        return $respuesta;
	}
}