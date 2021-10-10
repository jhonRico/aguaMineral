<?php

require_once "../controladores/c_adminTablas.php";
require_once "../modelos/m_adminTablasModelo.php";

class   AjaxRegistroAdmin1{

    public function ajaxConsultaTodosBD($tabla)

    {
        $respuesta = ControladorRegistroAdmin1::consultarTodoRegBD($tabla);
        echo  json_encode ($respuesta);
    }

     public function ajaxRegistroCampo($registroValue,$tabla)
    {
        $respuesta = ControladorRegistroAdmin1::consultarRegistroExisteBD($registroValue,$tabla);
        echo  json_encode ($respuesta);
    }

    public function ajaxAddRegistro($nombreValue,$tabla)
    {
        $respuesta = ControladorRegistroAdmin1::ctrlAddregistro($nombreValue,$tabla);
        echo  json_encode ($respuesta);
    }
 }

if(isset($_POST["tiposusu"]))
{  
    $allStates = new AjaxRegistroAdmin1();
    $allStates->ajaxConsultaTodosBD("tipousuario");
}

if(isset($_POST["nombreValue"]))
{  
    $allStates = new AjaxRegistroAdmin1();
    $nombreValue = $_POST["nombreValue"];
    $allStates->ajaxAddRegistro($nombreValue,"tipousuario");
}
if(isset($_POST["registroValue"]))
{  
    
    $allStates = new AjaxRegistroAdmin1();
    $registroValue = $_POST['registroValue'];
    $allStates->ajaxRegistroCampo($registroValue,"tipousuario");
}
?>