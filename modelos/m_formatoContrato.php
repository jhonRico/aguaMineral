<?php

require_once "conexion.php";

 class ModeloFormatoContrato
 {

    static public function mdlConsultarFormatoContrato($tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt -> execute();
        return  $stmt ->fetchAll();
	}
     static public function mdlConsultarClientesEnBd($tabla,$datos)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE TipoUsuario_idTipoUsuario = :tipoUsuario AND cedulaPersona = :nombreCliente");

        $stmt->bindParam(":tipoUsuario", $datos["tipoUsuario"], PDO::PARAM_STR);
        $stmt->bindParam(":nombreCliente", $datos["nombreCliente"], PDO::PARAM_INT);


        $stmt -> execute();
        return $stmt->fetch();
    }

}

?>

   