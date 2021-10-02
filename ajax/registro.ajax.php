<?php
require_once "../controladores/c_registro.php";
require_once "../modelos/m_registro.php";


class   AjaxUser{
    
    public function ajaxConsultUser($tipoUsuario,$usuario,$contrasena)
    {
        $respuesta = ControladorRegistro::ctrlConsultarAllUsers($tipoUsuario,$usuario,$contrasena);
        echo  json_encode ($respuesta);
	}
    
    public function ajaxAddUser($nombre,$apellido,$direccion,$cedula,$telefono,$correo,$sector,$tipoUsuario,$usuario,$contrasena)
    {
        $respuesta = ControladorRegistro::ctrlAddUser($nombre,$apellido,$direccion,$cedula,$telefono,$correo,$sector,$tipoUsuario,$usuario,$contrasena);
        echo  json_encode ($respuesta);
	}

}


if(isset($_POST["nombre"]))
{  
    //echo "<script>alert('ingresa al post')</script>";
    $allStates = new AjaxUser();
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $direccion = $_POST["direccion"];
    $cedula = $_POST["cedula"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"]; 
    $sector = $_POST["sector"];
    $tipoUsuario = $_POST["tipoUsuario"];
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];
    $allStates->ajaxAddUser($nombre,$apellido,$direccion,$cedula,$telefono,$correo,$sector,$tipoUsuario,$usuario,$contrasena);
}
if(isset($_POST["tipoDeUsuario"]))
{  
    $allStates = new AjaxUser();
    $tipoUsuario = $_POST["tipoDeUsuario"];
    $usuario = $_POST["user"];
    $contrasena = $_POST["password"];
    $allStates->ajaxConsultUser($tipoUsuario,$usuario,$contrasena);
}


?>