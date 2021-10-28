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
		$respuesta = ModeloReportes::mdlConsultarProductos($tabla,$tabla2,$datos); 
        return $respuesta;
	}
}

?>