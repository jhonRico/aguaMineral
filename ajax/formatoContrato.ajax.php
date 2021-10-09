<?php
require_once "../controladores/c_formatoContrato.php";
require_once "../modelos/m_formatoContrato.php";


class   AjaxFormatoContrato
{
    
    public function ajaxConsultarFormatoContrato($tabla)
    {
        $respuesta = ControladorFormatoContrato::ctrlConsultarFormatoContrato($tabla);
        echo  json_encode ($respuesta);
    }
    public function ajaxConsultarClientesEnBd($tabla,$tipoUsuario,$nombreCliente)
    {
        $respuesta = ControladorFormatoContrato::ctrlConsultarClientesEnBd($tabla,$tipoUsuario,$nombreCliente);
        echo  json_encode ($respuesta);
    }
    public function ajaxConsultarTiendaEnBd($tabla,$idCliente)
    {
        $respuesta = ControladorFormatoContrato::ctrlConsultarTiendaEnBd($tabla,$idCliente);
        echo  json_encode ($respuesta);
    }
}


if(isset($_POST["valor"]))
{  
    $tabla = "formatocontrato";
    $allStates = new AjaxFormatoContrato();
    $allStates->ajaxConsultarFormatoContrato($tabla);
}

if(isset($_POST["nombreCliente"]))
{  
    $tabla = "persona";
    $tipoUsuario = "4";
    $nombreCliente = $_POST['nombreCliente'];
    $allStates = new AjaxFormatoContrato();
    $allStates->ajaxConsultarClientesEnBd($tabla,$tipoUsuario,$nombreCliente);
}
if(isset($_POST["idCliente"]))
{  
    $tabla = "tienda";
    $idCliente = $_POST['idCliente'];
    $allStates = new AjaxFormatoContrato();
    $allStates->ajaxConsultarTiendaEnBd($tabla,$idCliente);
}

?>