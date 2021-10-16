<?php

require_once "conexion.php";

class ModeloFormatoContrato 
{
    static public function mdlConsultarSerial($tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt -> execute();
        return $stmt->fetch();
    }
    static public function mdlConsultarTotalProductosPrestados($tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt -> execute();
        return $stmt->fetchAll();
    }
    static public function mdlRegistrarPersona($tabla,$tabla2,$tabla3,$nombre,$idTipoUsuario,$apellido,$cedula,$estadoCliente,$municipioCliente,$ciudadCliente,$zonaCliente,$sectorCliente,$direccionCliente,$comercio,$telefono,$estadoComercio,$municipioComercio,$ciudadComercio,$zonaComercio,$sectorComercio,$direccionComercio,$cantidadEstantes,$idTipoContrato,$cantidadBotellones,$fecha)
    {
             $stmt22 = Conexion::conectar()->prepare("SELECT * FROM $tabla2 WHERE TipoUsuario_idTipoUsuario  = :idTipoUsuario  AND cedulaPersona = :cedula");

             $stmt22->bindParam(":idTipoUsuario", $idTipoUsuario, PDO::PARAM_INT);
             $stmt22->bindParam(":cedula", $cedula, PDO::PARAM_INT);

             $stmt22 -> execute();
             $prueba = $stmt22->fetch();
            
             if ($prueba != false) 
            {

                   $idPersona = $prueba['idPersona'];
                   $stmt = Conexion::conectar()->prepare("INSERT INTO contrato (TipoContrato_idTipoContrato,
                         Persona_idPersona, cantidadProd, fechaContrato, cantidadProd_2) VALUES ('$idTipoContrato', '$idPersona', '$cantidadEstantes', '$fecha' , '$cantidadBotellones')");  

                    $stmt->execute();
                    return "true";
            }else
            {
               
               $pdo = Conexion::conectar();
               $stmt = $pdo->prepare("INSERT INTO $tabla(Zonas_idZonas, Ciudad_idCiudad, nombreSector)
                VALUES  ('$zonaComercio', '$ciudadCliente', '$sectorComercio')");

               if($stmt->execute())
               {
                        //este metodo permite obtener el ultimo id ingresado en la tabla qeu se acaba de hacer un incer.
                $lastInsertId = $pdo->lastInsertId();

                $stmt = $pdo->prepare("INSERT INTO $tabla2(TipoUsuario_idTipoUsuario, Sector_idSector, nombrePersona, apellidoPersona, direccionPersona, cedulaPersona , telefonoPersona)
                    VALUES  ('$idTipoUsuario','$lastInsertId','$nombre', '$apellido', '$direccionCliente', '$cedula', '$telefono')");

                if ($stmt->execute()) 
                {
                    $lastInsertId = $pdo->lastInsertId();

                    $stmt = $pdo->prepare("INSERT INTO $tabla3(Persona_idPersona, Sector_idSector, nombreTienda, direccionTienda, telefonoTienda)
                        VALUES  ('$lastInsertId', '$sectorComercio', '$comercio', '$direccionComercio', '$telefono')");
                    if($stmt->execute())
                    {

                       $stmt = $pdo->prepare("INSERT INTO contrato (TipoContrato_idTipoContrato,
                         Persona_idPersona, cantidadProd, fechaContrato, cantidadProd_2) VALUES ('$idTipoContrato', '$lastInsertId', '$cantidadEstantes', '$fecha' , '$cantidadBotellones')");      

                       if($stmt->execute())
                       {
                        return "ok";
                        }else
                        {
                        return"Error";
                        }
                    }
                  }
               }
            }
    }

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

static public function mdlConsultarIdTipoUsuario($tabla)
{
    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE descripcion = 'Cliente'");

    $stmt -> execute();
    return  $stmt->fetch();
}
static public function mdlConsultarClientesEnBd($tabla,$datos)
{
    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla t INNER JOIN sector s ON t.Sector_idSector = s.idSector WHERE TipoUsuario_idTipoUsuario = :tipoUsuario AND cedulaPersona = :nombreCliente");

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

