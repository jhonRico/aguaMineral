<?php
require_once "../controladores/c_registro.php";
require_once "../modelos/m_registro.php";


class   AjaxUser
{
    
    public function ajaxConsultUser($usuario,$contrasena)
    {
        $respuesta = ControladorRegistro::ctrlConsultarAllUsers($usuario,$contrasena);
        echo  json_encode ($respuesta);
	}
    
    public function ajaxAddUser($nombre,$apellido,$direccion,$cedula,$telefono,$correo,$sector,$tipoUsuario,$contrasena)
    {
        $respuesta = ControladorRegistro::ctrlAddUser($nombre,$apellido,$direccion,$cedula,$telefono,$correo,$sector,$tipoUsuario,$contrasena);
        echo  json_encode ($respuesta);
	}

}


if(isset($_POST["nombre"]))
{  
    $allStates = new AjaxUser();
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $direccion = $_POST["direccion"];
    $cedula = $_POST["cedula"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"]; 
    $sector = $_POST["sector"];
    $tipoUsuario = $_POST["tipoUsuario"];
    $contrasena = $_POST["contrasena"];
    $allStates->ajaxAddUser($nombre,$apellido,$direccion,$cedula,$telefono,$correo,$sector,$tipoUsuario,$contrasena);
}
if(isset($_POST["user"]))
{  
    $allStates = new AjaxUser();
    $usuario = $_POST["user"];
    $contrasena = $_POST["password"];
    $allStates->ajaxConsultUser($usuario,$contrasena);
}


?>