<?php  
require_once "../controladores/c_reportes.php";
require_once "../modelos/m_reportes.php";

class AjaxReportes
{
	public function ajaxConsultarProductos($tipoProductoReporte,$fechaReporteProducto)
	{
		$respuesta = ControladorReportes::ctrlConsultarProductos($tipoProductoReporte,$fechaReporteProducto);
        echo  json_encode ($respuesta);
	}
	public static function ajaxConsultarProductoPrestado($tipoProductoReporte,$fechaReporteProducto)
	{
		$respuesta = ControladorReportes::ctrlConsultarProductoPrestado($tipoProductoReporte,$fechaReporteProducto);
        echo  json_encode ($respuesta);
	}
	public static function ajaxConsultarProductosDisponibles()
	{
		$respuesta = ControladorReportes::ctrlConsultarProductosDisponibles();
        echo  json_encode ($respuesta);
	}
}

if(isset($_POST["tipoProductoReporte"]))
{  
    $tipoProductoReporte = $_POST['tipoProductoReporte'];
    $fechaReporteProducto = $_POST['fechaReporteProducto'];
    $allStates = new AjaxReportes();
    $allStates->ajaxConsultarProductos($tipoProductoReporte,$fechaReporteProducto);
}
if(isset($_POST["tipoProductoPrestado"]))
{  
    $tipoProductoReporte = $_POST['tipoProductoPrestado'];
    $fechaReporteProducto = $_POST['fechaProductoPrestado'];
    $allStates = new AjaxReportes();
    $allStates->ajaxConsultarProductoPrestado($tipoProductoReporte,$fechaReporteProducto);
}
if(isset($_POST["consultarProductos"]))
{  
    $allStates = new AjaxReportes();
    $allStates->ajaxConsultarProductosDisponibles();
}
?>