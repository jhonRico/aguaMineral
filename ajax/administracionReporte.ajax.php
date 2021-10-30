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
	public static function ajaxConsultarProductosDisponibles($tabla)
	{
		$respuesta = ControladorReportes::ctrlConsultarProductosDisponibles($tabla);
        echo  json_encode ($respuesta);
	}
	public static function ajaxConsultarContratosActivos($fechaReporteContrato,$estadoContrato)
	{
		$respuesta = ControladorReportes::ctrlConsultarContratosActivos($fechaReporteContrato,$estadoContrato);
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
    $allStates->ajaxConsultarProductosDisponibles('producto');
}
if(isset($_POST["fechaReporteContrato"]))
{  
	$estadoContrato = 'A';
	$fechaReporteContrato = $_POST['fechaReporteContrato'];
    $allStates = new AjaxReportes();
    $allStates->ajaxConsultarContratosActivos($fechaReporteContrato,$estadoContrato);
}
if(isset($_POST["fechaReporteContratoDevuelto"]))
{  
	$estadoContrato = 'D';
	$fechaReporteContrato = $_POST['fechaReporteContratoDevuelto'];
    $allStates = new AjaxReportes();
    $allStates->ajaxConsultarContratosActivos($fechaReporteContrato,$estadoContrato);
}
if(isset($_POST["consultarContratos"]))
{  
    $allStates = new AjaxReportes();
    $allStates->ajaxConsultarProductosDisponibles('contrato');
}
?>