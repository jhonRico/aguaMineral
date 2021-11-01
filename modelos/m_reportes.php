<?php 
	require_once "conexion.php";
	class ModeloReportes
	{
		public static function mdlConsultarProductosReporte($tabla,$tabla2,$datos)
		{
			$arrayMeses = ['01','02','03','04','05','06','07','08','09','10','11','12'];
			$resultado = array();
			for ($i=0; $i < 12; $i++) 
			{ 
				 $resultado[$i] = ModeloReportes::mdlConsultarProducto($tabla2,$datos,$arrayMeses[$i]);
			}
			return $resultado;
		}

		public static function mdlConsultarProducto($tabla2,$datos,$mes)
		{
			$fechaReporteProducto = $datos['fechaReporteProducto'];
			$resultadoFecha = $fechaReporteProducto.'-'.$mes.'%';

			$stmt = Conexion::conectar()->prepare("SELECT SUM(cantidadTotal) FROM historiaproducto WHERE idTipoProducto = :tipoProductoReporte AND fechaIngreso LIKE :resultadoFecha");

			$stmt->bindParam(":tipoProductoReporte", $datos['tipoProductoReporte'], PDO::PARAM_INT);
			$stmt->bindParam(":resultadoFecha", $resultadoFecha, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetchAll();
		    $stmt -> close();
        	$stmt = null;
		}

		public static function mdlConsultarProductoPrestado($tabla,$tabla2,$tabla3,$datos)
		{
			$arrayMeses = ['01','02','03','04','05','06','07','08','09','10','11','12'];
			$resultado = array();
			for ($i=0; $i < 12; $i++) 
			{ 
				 $resultado[$i] = ModeloReportes::mdlConsultarProductoPrestadoEnBd($tabla,$tabla2,$tabla3,$datos,$arrayMeses[$i]);
			}
			return $resultado;
		}

		public static function mdlConsultarProductoPrestadoEnBd($tabla,$tabla2,$tabla3,$datos,$mes)
		{
			$fechaReporteProducto = $datos['fechaReporteProducto'];
			$resultadoFecha = $fechaReporteProducto.'-'.$mes.'%';

			if ($datos['tipoProductoReporte'] == 'Estantes') 
			{
				$stmt = Conexion::conectar()->prepare("SELECT SUM(cantidadProd) FROM $tabla WHERE estadoContrato = 'A' AND fechaContrato LIKE :resultadoFecha");

				$stmt->bindParam(":resultadoFecha", $resultadoFecha, PDO::PARAM_STR);
				$stmt -> execute();
				return $stmt -> fetchAll();
			    $stmt -> close();
	        	$stmt = null;
			}else
			{
				$stmt = Conexion::conectar()->prepare("SELECT SUM(cantidadProd_2) FROM $tabla WHERE estadoContrato = 'A' AND fechaContrato LIKE :resultadoFecha");

				$stmt->bindParam(":resultadoFecha", $resultadoFecha, PDO::PARAM_STR);
				$stmt -> execute();
				return $stmt -> fetchAll();
			    $stmt -> close();
	        	$stmt = null;
			}

			
		}
		public static function mdlConsultarProductosDisponibles($tabla)
		{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt -> execute();
			return $stmt -> fetchAll();
			$stmt -> close();
	       	$stmt = null;
		}
		public static function mdlConsultarContratosActivos($tabla,$datos)
		{
			$arrayMeses = ['01','02','03','04','05','06','07','08','09','10','11','12'];
			$resultado = array();
			for ($i=0; $i < 12; $i++) 
			{ 
				 $resultado[$i] = ModeloReportes::mdlConsultarContratosActivosEnBd($tabla,$datos,$arrayMeses[$i]);
			}
			return $resultado;
		}
		public static function mdlConsultarContratosActivosEnBd($tabla,$datos,$mes)
		{
			$fechaReporteContrato = $datos['fechaReporteContrato'];
			$resultadoFecha = $fechaReporteContrato.'-'.$mes.'%';

			$stmt = Conexion::conectar()->prepare("SELECT COUNT(idContrato) FROM $tabla WHERE estadoContrato = :estadoContrato AND fechaContrato LIKE :resultadoFecha");

			$stmt->bindParam(":resultadoFecha", $resultadoFecha, PDO::PARAM_STR);
			$stmt->bindParam(":estadoContrato", $datos['estadoContrato'], PDO::PARAM_STR);

			$stmt -> execute();
			return $stmt -> fetchAll();
		    $stmt -> close();
        	$stmt = null;
		}
	}

?> 