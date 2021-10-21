<?php

class ControladorFormatoContrato
{ 
    static public function ctrlConsultarCapacidad($tipoProducto)
    {
        $tabla = "producto";
        $respuesta = ModeloFormatoContrato::mdlConsultarCapacidad($tabla,$tipoProducto);
        return $respuesta;
    }
    static public function ctrlConsultarTotalProductosPrestados($tabla)
    {
        $respuesta = ModeloFormatoContrato::mdlConsultarTotalProductosPrestados($tabla);
        return $respuesta;
    }
    static public function ctrlConsultarIdTipoUsuario($tabla)
    {
        $respuesta = ModeloFormatoContrato::mdlConsultarIdTipoUsuario($tabla);
        return $respuesta;
    }
    static public function ctrlConsultarSerial($tabla)
    {
        $respuesta = ModeloFormatoContrato::mdlConsultarSerial($tabla);
        return $respuesta;
    }


    static public function ctrlConsultarProductosDisponibles($tabla,$parametro,$cantidad,$idSucursalProductosDisponibles)
    {
        $datos = array(
             "parametro"=>$parametro,
             "cantidad"=>$cantidad,
             "idSucursalProductosDisponibles"=>$idSucursalProductosDisponibles,
         );
        $respuesta = ModeloFormatoContrato::mdlConsultarProductosDisponibles($tabla,$datos);
        return $respuesta;
    }


     static public function ctrlRegistrarPersona($tabla,$tabla2,$tabla3,$nombre,$idTipoUsuario,$apellido,$cedula,$estadoCliente,$municipioCliente,$ciudadCliente,$zonaCliente,$sectorCliente,$direccionCliente,$comercio,$telefono,$estadoComercio,$municipioComercio,$ciudadComercio,$zonaComercio,$sectorComercio,$direccionComercio,$cantidadEstantes,$idTipoContrato,$cantidadBotellones,$sucursal,$capacidadEstantes,$capacidadBotellon,$idProducto)
    {
        date_default_timezone_set("America/Bogota");
        $fecha = date("Y-m-d H:i:s");

        $respuesta = ModeloFormatoContrato::mdlRegistrarPersona($tabla,$tabla2,$tabla3,$nombre,$idTipoUsuario,$apellido,$cedula,$estadoCliente,$municipioCliente,$ciudadCliente,$zonaCliente,$sectorCliente,$direccionCliente,$comercio,$telefono,$estadoComercio,$municipioComercio,$ciudadComercio,$zonaComercio,$sectorComercio,$direccionComercio,$cantidadEstantes,$idTipoContrato,$cantidadBotellones,$sucursal,$capacidadEstantes,$capacidadBotellon,$idProducto,$fecha);
        return $respuesta;
    }

    static public function ctrlRegistrarContrato($tabla,$idCliente,$cantidad,$fechaContrato, $idTipoContrato)
    {
        $datos = array(
             "idTipoContrato"=>$idTipoContrato,
             "idCliente"=>$idCliente,
             "cantidad"=>$cantidad,
             "fechaContrato"=>$fechaContrato,
         );
        $respuesta = ModeloFormatoContrato::mdlRegistrarContrato($tabla,$datos);
        return $respuesta;
    }

    static public function ctrlConsultarFormatoContrato($tabla,$parametro)
    {
        $datos = array(
             "parametro"=>$parametro,
         );
        $respuesta = ModeloFormatoContrato::mdlConsultarFormatoContrato($tabla,$datos);
        return $respuesta;
	}
     static public function ctrlConsultarClientesEnBd($tabla,$tipoUsuario,$nombreCliente)
    {
        $datos = array(
             "tipoUsuario"=>$tipoUsuario,
             "nombreCliente"=>$nombreCliente
         );
        $respuesta = ModeloFormatoContrato::mdlConsultarClientesEnBd($tabla,$datos);
        return $respuesta;
    }
     static public function ctrlConsultarTiendaEnBd($tabla,$idCliente)
    {
        $datos = array(
             "idCliente"=>$idCliente,
         );
        $respuesta = ModeloFormatoContrato::mdlConsultarTiendaEnBd($tabla,$datos);
        return $respuesta;
    }

    static public function ctrlConsultarSelectsContrato($valorAnterior,$tablaSelect,$atributo)
    {
        $datos = array(
             "valorAnterior"=>$valorAnterior,
         );
        $respuesta = ModeloFormatoContrato::mdlConsultarSelectsDeContrato($tablaSelect,$datos,$atributo);
        return $respuesta;
    }
    static public function ctrlConsultarProductosDisponiblesAmbos($datoAmbos,$parametrosAmbos, $idSucursalProductosDisponiblesAmbos)
    {
        $datos = array(
             "parametro"=>$parametrosAmbos,
             "cantidad"=>$datoAmbos,
             "idSucursalProductosDisponibles"=>$idSucursalProductosDisponiblesAmbos,
         );
        $respuesta = ModeloFormatoContrato::mdlConsultarProductosDisponiblesAmbos($datos);
        return $respuesta;
    }
    static public function ctrlRegistrarContratoAmbos($tabla,$tabla2,$tabla3,$nombre,$idTipoUsuario,$apellido,$cedula,$estadoCliente,$municipioCliente,$ciudadCliente,$zonaCliente,$sectorCliente,$direccionCliente,$comercio,$telefono,$estadoComercio,$municipioComercio,$ciudadComercio,$zonaComercio,$sectorComercio,$direccionComercio,$cantidadEstantes,$idTipoContrato,$cantidadBotellones,$sucursal,$capacidadEstantes,$capacidadBotellon,$idEstante,$idBotellon)
    {
        date_default_timezone_set("America/Bogota");
        $fecha = date("Y-m-d H:i:s");

        $respuesta = ModeloFormatoContrato::mdlRegistrarContratoAmbos($tabla,$tabla2,$tabla3,$nombre,$idTipoUsuario,$apellido,$cedula,$estadoCliente,$municipioCliente,$ciudadCliente,$zonaCliente,$sectorCliente,$direccionCliente,$comercio,$telefono,$estadoComercio,$municipioComercio,$ciudadComercio,$zonaComercio,$sectorComercio,$direccionComercio,$cantidadEstantes,$idTipoContrato,$cantidadBotellones,$sucursal,$capacidadEstantes,$capacidadBotellon,$idEstante,$idBotellon,$fecha);
        return $respuesta;
    }

}