<?php

require_once "conexion.php";

 class ModeloFormatoContrato
 {


    static public function mdlConsultarProductosDisponibles($tabla,$datos)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla INNER JOIN tipoproducto ON $tabla.TipoProducto_idTipoProducto =  tipoproducto.idTipoProducto WHERE tipoproducto.descripcion = :parametro");
        $stmt->bindParam(":parametro", $datos["parametro"], PDO::PARAM_STR);
        $stmt -> execute();
        return  $stmt->fetch();
    }

    static public function mdlConsultarFormatoContrato($tabla,$datos)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE nombre = :parametro");
        $stmt->bindParam(":parametro", $datos["parametro"], PDO::PARAM_STR);
        $stmt -> execute();
        return  $stmt->fetch();
	}
     static public function mdlConsultarClientesEnBd($tabla,$datos)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE TipoUsuario_idTipoUsuario = :tipoUsuario AND cedulaPersona = :nombreCliente");

        $stmt->bindParam(":tipoUsuario", $datos["tipoUsuario"], PDO::PARAM_STR);
        $stmt->bindParam(":nombreCliente", $datos["nombreCliente"], PDO::PARAM_INT);


        $stmt -> execute();
        return $stmt->fetch();
    }
    static public function mdlConsultarTiendaEnBd($tabla,$datos)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE   Persona_idPersona = :idCliente");

        $stmt->bindParam(":idCliente", $datos["idCliente"], PDO::PARAM_INT);

        $stmt -> execute();
        return $stmt->fetch();
    }

}

?>

   