<?php 

class ControladorReportes
{
	public static function ctrlConsultarProductos($tipoProductoReporte,$fechaReporteProducto)
	{
		$tabla = 'producto';
		$tabla2 = 'historiaproducto';
		$datos = array(
             "tipoProductoReporte"=>$tipoProductoReporte,
              "fechaReporteProducto"=>$fechaReporteProducto,
         );
		$respuesta = ModeloReportes::mdlConsultarProductosReporte($tabla,$tabla2,$datos); 
        return $respuesta;
	}
	public static function ctrlConsultarProductoPrestado($tipoProductoReporte,$fechaReporteProducto)
	{
		$tabla = 'contrato';
		$tabla2 = 'producto_has_contrato';
		$tabla3 = 'producto';
		$datos = array(
             "tipoProductoReporte"=>$tipoProductoReporte,
              "fechaReporteProducto"=>$fechaReporteProducto,
         );
		$respuesta = ModeloReportes::mdlConsultarProductoPrestado($tabla,$tabla2,$tabla3,$datos); 
        return $respuesta;
	}
	public static function ctrlConsultarProductosDisponibles($tabla)
	{
		$respuesta = ModeloReportes::mdlConsultarProductosDisponibles($tabla); 
        return $respuesta;
	}
	public static function ctrlConsultarContratosActivos($fechaReporteContrato,$estadoContrato)
	{
		$tabla = 'contrato';
		$datos = array(
             "fechaReporteContrato"=>$fechaReporteContrato,
             "estadoContrato"=>$estadoContrato,
         );
		$respuesta = ModeloReportes::mdlConsultarContratosActivos($tabla,$datos); 
        return $respuesta;
	}
}

?>