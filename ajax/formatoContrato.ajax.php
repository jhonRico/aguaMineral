<?php
require_once "../controladores/c_formatoContrato.php";
require_once "../modelos/m_formatoContrato.php";
require_once "../controladores/c_bitacora.php";
require_once "../modelos/m_bitacora.php";

class   AjaxFormatoContrato
{
    
     public function ajaxConsultarProductosDisponibles($tabla,$parametro,$cantidad,$idSucursalProductosDisponibles)
    {
        $respuesta = ControladorFormatoContrato::ctrlConsultarProductosDisponibles($tabla,$parametro,$cantidad,$idSucursalProductosDisponibles);
        echo  json_encode ($respuesta);
    }

    public function ajaxRegistrarPersona($tabla,$tabla2,$tabla3,$nombre,$idTipoUsuario,$apellido,$cedula,$estadoCliente,$municipioCliente,$ciudadCliente,$zonaCliente,$sectorCliente,$direccionCliente,$comercio,$telefono,$estadoComercio,$municipioComercio,$ciudadComercio,$zonaComercio,$sectorComercio,$direccionComercio,$cantidadEstantes,$idTipoContrato,$cantidadBotellones,$sucursal,$capacidadEstantes,$capacidadBotellon,$idProducto)
    {
        $respuesta = ControladorFormatoContrato::ctrlRegistrarPersona($tabla,$tabla2,$tabla3,$nombre,$idTipoUsuario,$apellido,$cedula,$estadoCliente,$municipioCliente,$ciudadCliente,$zonaCliente,$sectorCliente,$direccionCliente,$comercio,$telefono,$estadoComercio,$municipioComercio,$ciudadComercio,$zonaComercio,$sectorComercio,$direccionComercio,$cantidadEstantes,$idTipoContrato,$cantidadBotellones,$sucursal,$capacidadEstantes,$capacidadBotellon,$idProducto);
        if(strpos($respuesta,"ok")!== false || strpos($respuesta,"true")!== false){
           session_start();  
           $audit = ControladorBitacora::ctrlRegistroBitacora($_SESSION['usuarioAuditoria'],"El usuario registro un contrato para: ".$nombre.' '.$apellido);
        }
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
    public function ajaxConsultarCapacidad($tipoProducto)
    {
        $respuesta = ControladorFormatoContrato::ctrlConsultarCapacidad($tipoProducto);
        echo  json_encode ($respuesta);
    }
    public function ajaxConsultarProductosDisponiblesAmbos($datoAmbos,$parametrosAmbos, $idSucursalProductosDisponiblesAmbos)
    {
        $respuesta = ControladorFormatoContrato::ctrlConsultarProductosDisponiblesAmbos($datoAmbos,$parametrosAmbos, $idSucursalProductosDisponiblesAmbos);
        echo  json_encode ($respuesta);
    }
    public function ajaxRegistrarContratoAmbos($tabla,$tabla2,$tabla3,$nombre,$idTipoUsuario,$apellido,$cedula,$estadoCliente,$municipioCliente,$ciudadCliente,$zonaCliente,$sectorCliente,$direccionCliente,$comercio,$telefono,$estadoComercio,$municipioComercio,$ciudadComercio,$zonaComercio,$sectorComercio,$direccionComercio,$cantidadEstantes,$idTipoContrato,$cantidadBotellones,$sucursal,$capacidadEstantes,$capacidadBotellon,$idEstante,$idBotellon)
    {
        $respuesta = ControladorFormatoContrato::ctrlRegistrarContratoAmbos($tabla,$tabla2,$tabla3,$nombre,$idTipoUsuario,$apellido,$cedula,$estadoCliente,$municipioCliente,$ciudadCliente,$zonaCliente,$sectorCliente,$direccionCliente,$comercio,$telefono,$estadoComercio,$municipioComercio,$ciudadComercio,$zonaComercio,$sectorComercio,$direccionComercio,$cantidadEstantes,$idTipoContrato,$cantidadBotellones,$sucursal,$capacidadEstantes,$capacidadBotellon,$idEstante,$idBotellon);
        if(strpos($respuesta,"ok")!== false || strpos($respuesta,"true")!== false){
           session_start();  
           $audit = ControladorBitacora::ctrlRegistroBitacora($_SESSION['usuarioAuditoria'],"El usuario registro un contrato para: ".$nombre.' '.$apellido);
        }
        echo  json_encode ($respuesta);
    }
    public static function ajaxConsultarFormatoContratoCliente($id)
    {
        $respuesta = ControladorFormatoContrato::ctrlConsultarFormatoContratoCliente($id);
        echo  json_encode ($respuesta);
    }
}



if(isset($_POST["dato"]))
{  
    $tabla = "producto";
    $cantidad = $_POST['dato'];
    $parametro = $_POST['parametros'];
    $idSucursalProductosDisponibles = $_POST['idSucursalProductosDisponibles'];
    $allStates = new AjaxFormatoContrato();
    $allStates->ajaxConsultarProductosDisponibles($tabla,$parametro,$cantidad,$idSucursalProductosDisponibles);
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
    $idProducto = $_POST['idProducto'];

    $allStates = new AjaxFormatoContrato();
    $allStates->ajaxRegistrarPersona($tabla,$tabla2,$tabla3,$nombre,$idTipoUsuario,$apellido,$cedula,$estadoCliente,$municipioCliente,$ciudadCliente,$zonaCliente,$sectorCliente,$direccionCliente,$comercio,$telefono,$estadoComercio,$municipioComercio,$ciudadComercio,$zonaComercio,$sectorComercio,$direccionComercio,$cantidadEstantes,$idTipoContrato,$cantidadBotellones,$sucursal,$capacidadEstantes,$capacidadBotellon,$idProducto);
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
if(isset($_POST["tipoProductoAConsultar"]))
{  
    $tipoProducto = $_POST["tipoProductoAConsultar"];
    $allStates = new AjaxFormatoContrato();
    $allStates->ajaxConsultarCapacidad($tipoProducto);
}

if(isset($_POST["datoAmbos"]))
{  
    $datoAmbos = $_POST["datoAmbos"];
    $parametrosAmbos = $_POST["parametrosAmbos"];
    $idSucursalProductosDisponiblesAmbos = $_POST["idSucursalProductosDisponiblesAmbos"];
    $allStates = new AjaxFormatoContrato();
    $allStates->ajaxConsultarProductosDisponiblesAmbos($datoAmbos,$parametrosAmbos, $idSucursalProductosDisponiblesAmbos);
}
if(isset($_POST["nombreContratoAmbos"]))
{  
    $tabla = "sector";
    $tabla2 = "persona";
    $tabla3 = "comercios";
    $nombre = $_POST['nombreContratoAmbos'];
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
    $idEstante = $_POST['idEstante'];
    $idBotellon = $_POST['idBotellon'];
    $allStates = new AjaxFormatoContrato();
    $allStates->ajaxRegistrarContratoAmbos($tabla,$tabla2,$tabla3,$nombre,$idTipoUsuario,$apellido,$cedula,$estadoCliente,$municipioCliente,$ciudadCliente,$zonaCliente,$sectorCliente,$direccionCliente,$comercio,$telefono,$estadoComercio,$municipioComercio,$ciudadComercio,$zonaComercio,$sectorComercio,$direccionComercio,$cantidadEstantes,$idTipoContrato,$cantidadBotellones,$sucursal,$capacidadEstantes,$capacidadBotellon,$idEstante,$idBotellon);
}
if(isset($_POST["idParaConsultarFormatoContratoCliente"]))
{  
    $id = $_POST["idParaConsultarFormatoContratoCliente"];
    $allStates = new AjaxFormatoContrato();
    $allStates->ajaxConsultarFormatoContratoCliente($id);
}




?>