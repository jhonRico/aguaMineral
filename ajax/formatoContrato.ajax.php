<?php
require_once "../controladores/c_formatoContrato.php";
require_once "../modelos/m_formatoContrato.php";


class   AjaxFormatoContrato
{
    
     public function ajaxConsultarProductosDisponibles($tabla,$parametro)
    {
        $respuesta = ControladorFormatoContrato::ctrlConsultarProductosDisponibles($tabla,$parametro);
        echo  json_encode ($respuesta);
    }

    public function ajaxConsultarFormatoContrato($tabla,$parametro)
    {
        $respuesta = ControladorFormatoContrato::ctrlConsultarFormatoContrato($tabla,$parametro);
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



if(isset($_POST["dato"]))
{  
    $tabla = "producto";
    $parametro = $_POST['parametros'];
    $allStates = new AjaxFormatoContrato();
    $allStates->ajaxConsultarProductosDisponibles($tabla,$parametro);
}

if(isset($_POST["parametro"]))
{  
    $tabla = "tipocontrato";
    $parametro = $_POST['parametro'];
    $allStates = new AjaxFormatoContrato();
    $allStates->ajaxConsultarFormatoContrato($tabla,$parametro);
}

if(isset($_POST["nombreCliente"]))
{  
    $tabla = "persona";
    $tipoUsuario = "3";
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