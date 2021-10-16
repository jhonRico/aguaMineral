<?php 
	require_once "conexion.php";
	class ModeloClientes
	{
		public static function mdlConsultarTipoUsuario($tabla,$datos)
		{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE descripcion = :parametroAComparar");
			$stmt->bindParam(":parametroAComparar", $datos['parametroAComparar'], PDO::PARAM_STR);
			$stmt -> execute();

		     return $stmt->fetch();
		}

		public static function mdlConsultarClientesEnBd($tabla,$datos)
		{
			 $stmt2 = Conexion::conectar()->prepare("SELECT * FROM persona INNER JOIN tienda ON persona.idPersona = tienda.Persona_idPersona INNER JOIN sector ON persona.Sector_idSector  = sector.idSector INNER JOIN zonas ON sector.Zonas_idZonas = zonas.idZonas INNER JOIN ciudad ON sector.Ciudad_idCiudad = ciudad.idCiudad INNER JOIN contrato ON persona.idPersona = contrato.Persona_idPersona   WHERE  persona.TipoUsuario_idTipoUsuario = :tipoUsuario AND zonas.descripcion = :zona AND ciudad.idCiudad = :ciudad ORDER BY persona.cedulaPersona");

			 $stmt2->bindParam(":tipoUsuario", $datos['tipoUsuario'], PDO::PARAM_STR);
             $stmt2->bindParam(":zona", $datos['zona'], PDO::PARAM_STR);
             $stmt2->bindParam(":ciudad", $datos['ciudad'], PDO::PARAM_INT);

		     $stmt2 -> execute();
		     return $stmt2->fetchAll();
		}
		public static function mdlConsultarReporte($tabla,$datos)
		{
			 $stmt2 = Conexion::conectar()->prepare("SELECT * FROM persona INNER JOIN tienda ON persona.idPersona = tienda.Persona_idPersona INNER JOIN sector ON persona.Sector_idSector  = sector.idSector INNER JOIN zonas ON sector.Zonas_idZonas = zonas.idZonas INNER JOIN ciudad ON sector.Ciudad_idCiudad = ciudad.idCiudad INNER JOIN contrato ON persona.idPersona = contrato.Persona_idPersona   WHERE  persona.TipoUsuario_idTipoUsuario = :tipoUsuario AND zonas.descripcion = :zona AND ciudad.idCiudad = :ciudad AND persona.idPersona = :idPersona ORDER BY persona.cedulaPersona");

			 $stmt2->bindParam(":idPersona", $datos['idPersona'], PDO::PARAM_STR);
			 $stmt2->bindParam(":tipoUsuario", $datos['tipoUsuario'], PDO::PARAM_STR);
             $stmt2->bindParam(":zona", $datos['zona'], PDO::PARAM_STR);
             $stmt2->bindParam(":ciudad", $datos['ciudad'], PDO::PARAM_INT);

		     $stmt2 -> execute();
		     return $stmt2->fetchAll();
		}
	}

?> 