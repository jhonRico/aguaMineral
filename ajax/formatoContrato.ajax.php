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

    public function ajaxRegistrarPersona($tabla,$tabla2,$tabla3,$nombre,$idTipoUsuario,$apellido,$cedula,$estadoCliente,$municipioCliente,$ciudadCliente,$zonaCliente,$sectorCliente,$direccionCliente,$comercio,$telefono,$estadoComercio,$municipioComercio,$ciudadComercio,$zonaComercio,$sectorComercio,$direccionComercio,$cantidadEstantes,$idTipoContrato,$cantidadBotellones,$sucursal,$capacidadEstantes,$capacidadBotellon)
    {
        $respuesta = ControladorFormatoContrato::ctrlRegistrarPersona($tabla,$tabla2,$tabla3,$nombre,$idTipoUsuario,$apellido,$cedula,$estadoCliente,$municipioCliente,$ciudadCliente,$zonaCliente,$sectorCliente,$direccionCliente,$comercio,$telefono,$estadoComercio,$municipioComercio,$ciudadComercio,$zonaComercio,$sectorComercio,$direccionComercio,$cantidadEstantes,$idTipoContrato,$cantidadBotellones,$sucursal,$capacidadEstantes,$capacidadBotellon);
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

    //Consultar Selects

    public function ajaxConsultarSelectsContrato($valorAnterior,$tablaSelect,$atributo)
    {
        $respuesta = ControladorFormatoContrato::ctrlConsultarSelectsContrato($valorAnterior,$tablaSelect,$atributo);
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
if(isset($_POST["nombre"]))
{  

    $tabla = "sector";
    $tabla2 = "persona";
    $tabla3 = "comercios";
    $nombre = $_POST['nombre'];
    $idTipoUsuario = $_POST['idTipoUsuario'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST['cedula'];
    $estadoCliente = $_POST['estadoCliente'];
    $municipioCliente = $_POST['municipioCliente'];
    $ciudadCliente = $_POST['ciudadCliente'];
    $zonaCliente = $_POST['zonaCliente'];
    $sectorCliente = $_POST['sectorCliente'];
    $direccionCliente = $_POST['direccionCliente'];
    $comercio = $_POST['comercio'];
    $telefono = $_POST['telefono'];
    $estadoComercio = $_POST['estadoComercio'];
    $municipioComercio = $_POST['municipioComercio'];
    $ciudadComercio = $_POST['ciudadComercio'];
    $zonaComercio = $_POST['zonaComercio'];
    $sectorComercio = $_POST['sectorComercio'];
    $direccionComercio = $_POST['direccionComercio'];
    $cantidadEstantes = $_POST['cantidadEstantes'];
    $idTipoContrato = $_POST['idTipoContrato'];
    $cantidadBotellones = $_POST['cantidadBotellones'];
    $sucursal = $_POST['sucursal'];
    $capacidadEstantes = $_POST['capacidadEstantes'];
    $capacidadBotellon = $_POST['capacidadBotellon'];

    $allStates = new AjaxFormatoContrato();
    $allStates->ajaxRegistrarPersona($tabla,$tabla2,$tabla3,$nombre,$idTipoUsuario,$apellido,$cedula,$estadoCliente,$municipioCliente,$ciudadCliente,$zonaCliente,$sectorCliente,$direccionCliente,$comercio,$telefono,$estadoComercio,$municipioComercio,$ciudadComercio,$zonaComercio,$sectorComercio,$direccionComercio,$cantidadEstantes,$idTipoContrato,$cantidadBotellones,$sucursal,$capacidadEstantes,$capacidadBotellon);
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
    $tabla = "comercios";
    $idCliente = $_POST['idCliente'];
    $allStates = new AjaxFormatoContrato();
    $allStates->ajaxConsultarTiendaEnBd($tabla,$idCliente);
}

if(isset($_POST["valorAnterior"]))
{  
    $valorAnterior = $_POST["valorAnterior"];
    $tablaSelect = $_POST["tablaSelect"];
    $atributo = $_POST["atributo"];
    $allStates = new AjaxFormatoContrato();
    $allStates->ajaxConsultarSelectsContrato($valorAnterior,$tablaSelect,$atributo);
}


?>