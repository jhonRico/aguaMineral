<?php  
require_once "../controladores/c_reportes.php";
require_once "../modelos/m_reportes.php";

class AjaxReportes
{
	public function consultarProductos($tipoProductoReporte,$fechaReporteProducto)
	{
		$respuesta = ControladorReportes::ctrlConsultarProductos($tipoProductoReporte,$fechaReporteProducto);
        echo  json_encode ($respuesta);
	}
}

if(isset($_POST["tipoProductoReporte"]))
{  
    $tipoProductoReporte = $_POST['tipoProductoReporte'];
    $fechaReporteProducto = $_POST['fechaReporteProducto'];
    $allStates = new AjaxReportes();
    $allStates->consultarProductos($tipoProductoReporte,$fechaReporteProducto);
}

?>