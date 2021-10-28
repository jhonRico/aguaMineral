<?php 
	require_once "conexion.php";
	class ModeloReportes
	{
		public static function mdlConsultarProductos($tabla,$tabla2,$datos)
		{
			$stmt = Conexion::conectar()->prepare("SELECT COUNT (cantidadTotal) FROM $tabla2 WHERE idTipoProducto = :tipoProductoReporte AND fechaIngreso LIKE :fechaReporteProducto");
			$stmt->bindParam(":tipoProductoReporte", $datos['tipoProductoReporte'], PDO::PARAM_STR);
			$stmt->bindParam(":fechaReporteProducto", $datos['fechaReporteProducto'], PDO::PARAM_STR);
			$stmt -> execute();
		    return $stmt->fetch();
		}
	}

?> 