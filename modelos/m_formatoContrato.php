<?php

require_once "conexion.php";

class ModeloFormatoContrato 
{
    static public function mdlConsultarCapacidad($tabla,$tipoProducto)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla t INNER JOIN tipoproducto tp ON t.TipoProducto_idTipoProducto = tp.idTipoProducto WHERE tp.descripcion = :tipoProducto");

        $stmt->bindParam(":tipoProducto", $tipoProducto, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetchAll();
    }
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
    static public function mdlRegistrarPersona($tabla,$tabla2,$tabla3,$nombre,$idTipoUsuario,$apellido,$cedula,$estadoCliente,$municipioCliente,$ciudadCliente,$zonaCliente,$sectorCliente,$direccionCliente,$comercio,$telefono,$estadoComercio,$municipioComercio,$ciudadComercio,$zonaComercio,$sectorComercio,$direccionComercio,$cantidadEstantes,$idTipoContrato,$cantidadBotellones,$sucursal,$capacidadEstantes,$capacidadBotellon,$idProducto,$fecha)
    {

     $stmt11 =  Conexion::conectar()->prepare("SELECT * FROM tipocontrato WHERE nombre  ='$idTipoContrato'");
     $stmt11 -> execute();
     $prueba1 = $stmt11->fetch();
     $idTipoDeContrato = $prueba1['idTipoContrato'];

     if ($prueba1 != false) 
     {
        $stmt22 = Conexion::conectar()->prepare("SELECT * FROM $tabla2 WHERE TipoUsuario_idTipoUsuario  = :idTipoUsuario  AND cedulaPersona = :cedula");

        $stmt22->bindParam(":idTipoUsuario", $idTipoUsuario, PDO::PARAM_INT);
        $stmt22->bindParam(":cedula", $cedula, PDO::PARAM_INT);

        $stmt22 -> execute();
        $prueba = $stmt22->fetch();
        
        if ($prueba != false) 
        {
            $idPersona = $prueba['idPersona'];
            $pdo = Conexion::conectar();
            $stmt = $pdo->prepare("INSERT INTO contrato (Sucursal_idSucursal,TipoContrato_idTipoContrato,
               Persona_idPersona, cantidadProd, fechaContrato, cantidadProd_2, capacidadProd, capacidadProd_2, estadoContrato) VALUES ('$sucursal','$idTipoDeContrato', '$idPersona', '$cantidadEstantes', '$fecha' , '$cantidadBotellones','$capacidadEstantes','$capacidadBotellon','A')");

            if($stmt->execute())
            {
               $lastInsertId = $pdo->lastInsertId();
               $stmt = $pdo->prepare("INSERT INTO producto_has_contrato(Producto_idProducto ,Contrato_idContrato) VALUES (:idProducto, :idContrato)");
               $stmt->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
               $stmt->bindParam(":idContrato", $lastInsertId, PDO::PARAM_INT);

                if ($stmt->execute()) 
               {
                    $lastInsertId = $pdo->lastInsertId();
                    $stmt = $pdo->prepare("SELECT * FROM contrato c INNER JOIN producto_has_contrato pc ON c.idContrato  = pc.Contrato_idContrato INNER JOIN producto p ON pc.Producto_idProducto = p.idProducto  WHERE pc.Producto_idProducto = :idProducto"); 
                   $stmt->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
                   if($stmt->execute())
                   { 
                        $catidadARestar = 0;   
                        $arrayProducto = $stmt->fetch();
                        $cantidadActual = $arrayProducto['cantidadProductos'];
                        if($cantidadBotellones == 0)
                        {
                            $catidadARestar = $cantidadEstantes;
                        }else
                        {
                            $catidadARestar = $cantidadBotellones;
                        }
                        $resultado = $cantidadActual - $catidadARestar;
                        $stmt = $pdo->prepare("UPDATE producto SET cantidadProductos = :resultado WHERE idProducto = :idProducto"); 
                        $stmt->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
                        $stmt->bindParam(":resultado", $resultado, PDO::PARAM_INT);
                        if ($stmt->execute()) 
                        {
                            return "true";
                        }else
                        {
                           return"error";    
                        } 
                    }
               }
               
            }
        }else
        {

            $pdo = Conexion::conectar();
            $stmt = $pdo->prepare("INSERT INTO $tabla(Parroquia_idParroquia, nombreSector)
            VALUES  ('$zonaComercio','$sectorComercio')");

            if($stmt->execute())
            {
                                        
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
                           $stmt = $pdo->prepare("INSERT INTO contrato (Sucursal_idSucursal,TipoContrato_idTipoContrato,
                               Persona_idPersona, cantidadProd, fechaContrato, cantidadProd_2, capacidadProd, capacidadProd_2, estadoContrato) VALUES ('$sucursal','$idTipoDeContrato', '$lastInsertId', '$cantidadEstantes', '$fecha' , '$cantidadBotellones','$capacidadEstantes','$capacidadBotellon','A')");
                       if($stmt->execute())
                       {
                            return "ok";
                        }else
                        {
                            return "error";
                        }
                    }
                }
            }
        }
    }
}








static public function mdlConsultarProductosDisponibles($tabla,$datos)
{
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla INNER JOIN tipoproducto ON $tabla.TipoProducto_idTipoProducto =  tipoproducto.idTipoProducto INNER JOIN producto_has_sucursal ps ON $tabla.idProducto = ps.Producto_idProducto  WHERE $tabla.cantidadProductos >= :cantidad AND $tabla.idProducto = :parametro AND ps.Sucursal_idSucursal = :idSucursalProductosDisponibles");
        $stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_INT);
        $stmt->bindParam(":parametro", $datos["parametro"], PDO::PARAM_INT);
        $stmt->bindParam(":idSucursalProductosDisponibles", $datos["idSucursalProductosDisponibles"], PDO::PARAM_INT);

        $stmt->execute();
        if ($stmt -> fetch() != false) 
        {
            return "ok";
        }else
        {
            return "false";
        }
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

static public function mdlConsultarSelectsDeContrato($tablaSelect,$datos,$atributo)
{
    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaSelect WHERE  $atributo = :valorAnterior");

    $stmt->bindParam(":valorAnterior", $datos["valorAnterior"], PDO::PARAM_INT);

    $stmt -> execute();
    return $stmt->fetchAll();
}

static public function mdlConsultarProductosDisponiblesAmbos($datos)
{
    $stmt = Conexion::conectar()->prepare("SELECT * FROM producto INNER JOIN tipoproducto ON producto.TipoProducto_idTipoProducto =  tipoproducto.idTipoProducto INNER JOIN producto_has_sucursal ps ON producto.idProducto = ps.Producto_idProducto  WHERE producto.cantidadProductos >= :cantidad AND producto.idProducto = :parametro AND ps.Sucursal_idSucursal = :idSucursalProductosDisponibles");
        $stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_INT);
        $stmt->bindParam(":parametro", $datos["parametro"], PDO::PARAM_INT);
        $stmt->bindParam(":idSucursalProductosDisponibles", $datos["idSucursalProductosDisponibles"], PDO::PARAM_INT);

        $stmt->execute();
        if ($stmt -> fetch() != false) 
        {
            return "ok";
        }else
        {
            return "false";
        }
}   
static public function mdlRegistrarContratoAmbos($tabla,$tabla2,$tabla3,$nombre,$idTipoUsuario,$apellido,$cedula,$estadoCliente,$municipioCliente,$ciudadCliente,$zonaCliente,$sectorCliente,$direccionCliente,$comercio,$telefono,$estadoComercio,$municipioComercio,$ciudadComercio,$zonaComercio,$sectorComercio,$direccionComercio,$cantidadEstantes,$idTipoContrato,$cantidadBotellones,$sucursal,$capacidadEstantes,$capacidadBotellon,$idEstante,$idBotellon,$fecha)
{
     $stmt11 =  Conexion::conectar()->prepare("SELECT * FROM tipocontrato WHERE nombre  ='$idTipoContrato'");
     $stmt11 -> execute();
     $prueba1 = $stmt11->fetch();
     $idTipoDeContrato = $prueba1['idTipoContrato'];

     if ($prueba1 != false) 
     {
        $stmt22 = Conexion::conectar()->prepare("SELECT * FROM $tabla2 WHERE TipoUsuario_idTipoUsuario  = :idTipoUsuario  AND cedulaPersona = :cedula");

        $stmt22->bindParam(":idTipoUsuario", $idTipoUsuario, PDO::PARAM_INT);
        $stmt22->bindParam(":cedula", $cedula, PDO::PARAM_INT);

        $stmt22 -> execute();
        $prueba = $stmt22->fetch();
        
        if ($prueba != false) 
        {
            $idPersona = $prueba['idPersona'];
            $pdo = Conexion::conectar();
            $stmt = $pdo->prepare("INSERT INTO contrato (Sucursal_idSucursal,TipoContrato_idTipoContrato,
               Persona_idPersona, cantidadProd, fechaContrato, cantidadProd_2, capacidadProd, capacidadProd_2, estadoContrato) VALUES ('$sucursal','$idTipoDeContrato', '$idPersona', '$cantidadEstantes', '$fecha' , '$cantidadBotellones','$capacidadEstantes','$capacidadBotellon','A')");

            if($stmt->execute())
            {
               $lastInsertId = $pdo->lastInsertId();
               $stmt = $pdo->prepare("INSERT INTO producto_has_contrato(Producto_idProducto ,Contrato_idContrato) VALUES (:idProducto, :idContrato)");
               $stmt->bindParam(":idProducto", $idEstante, PDO::PARAM_INT);
               $stmt->bindParam(":idContrato", $lastInsertId, PDO::PARAM_INT);

                if ($stmt->execute()) 
               {
                $stmt = $pdo->prepare("INSERT INTO producto_has_contrato(Producto_idProducto ,Contrato_idContrato) VALUES (:idProducto, :idContrato)");
                $stmt->bindParam(":idProducto", $idBotellon, PDO::PARAM_INT);
                $stmt->bindParam(":idContrato", $lastInsertId, PDO::PARAM_INT);

                if ($stmt->execute()) 
                {
                    $lastInsertId = $pdo->lastInsertId();
                    $stmt = $pdo->prepare("SELECT * FROM contrato c INNER JOIN producto_has_contrato pc ON c.idContrato  = pc.Contrato_idContrato INNER JOIN producto p ON pc.Producto_idProducto = p.idProducto  WHERE pc.Producto_idProducto = :idProducto"); 
                   $stmt->bindParam(":idProducto", $idEstante, PDO::PARAM_INT);

                   if($stmt->execute())
                   {   
                        $arrayProducto = $stmt->fetch();
                        $cantidadActual = $arrayProducto['cantidadProductos'];
                        $resultado = $cantidadActual - $cantidadEstantes;
                        $stmt = $pdo->prepare("UPDATE producto SET cantidadProductos = :resultado WHERE idProducto = :idProducto"); 
                        $stmt->bindParam(":idProducto", $idEstante, PDO::PARAM_INT);
                        $stmt->bindParam(":resultado", $resultado, PDO::PARAM_INT);
                        if ($stmt->execute()) 
                        {
                                $stmt = $pdo->prepare("SELECT * FROM contrato c INNER JOIN producto_has_contrato pc ON c.idContrato  = pc.Contrato_idContrato INNER JOIN producto p ON pc.Producto_idProducto = p.idProducto  WHERE pc.Producto_idProducto = :idProducto"); 
                                $stmt->bindParam(":idProducto", $idBotellon, PDO::PARAM_INT);
                            if ($stmt->execute()) 
                            {
                                $arrayProducto = $stmt->fetch();
                                $cantidadActual = $arrayProducto['cantidadProductos'];
                                $resultado = $cantidadActual - $cantidadBotellones;
                                $stmt = $pdo->prepare("UPDATE producto SET cantidadProductos = :resultado WHERE idProducto = :idProducto"); 
                                $stmt->bindParam(":idProducto", $idBotellon, PDO::PARAM_INT);
                                $stmt->bindParam(":resultado", $resultado, PDO::PARAM_INT);
                                if($stmt->execute())
                                {
                                    return "true";
                                }else
                                {
                                    return"error";    
                                }
                            }
                        }
                        
                    }
                }
              }
               
            }
        }else
        {
            $pdo = Conexion::conectar();
            $stmt = $pdo->prepare("INSERT INTO $tabla(Parroquia_idParroquia, nombreSector)
            VALUES  ('$zonaComercio','$sectorComercio')");

            if($stmt->execute())
            {
                                        
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
                           $stmt = $pdo->prepare("INSERT INTO contrato (Sucursal_idSucursal,TipoContrato_idTipoContrato,
                               Persona_idPersona, cantidadProd, fechaContrato, cantidadProd_2, capacidadProd, capacidadProd_2, estadoContrato) VALUES ('$sucursal','$idTipoDeContrato', '$lastInsertId', '$cantidadEstantes', '$fecha' , '$cantidadBotellones','$capacidadEstantes','$capacidadBotellon','A')");
                       if($stmt->execute())
                       {
                            if($stmt->execute())
                            {
                               $lastInsertId = $pdo->lastInsertId();
                               $stmt = $pdo->prepare("INSERT INTO producto_has_contrato(Producto_idProducto ,Contrato_idContrato) VALUES (:idProducto, :idContrato)");
                               $stmt->bindParam(":idProducto", $idEstante, PDO::PARAM_INT);
                               $stmt->bindParam(":idContrato", $lastInsertId, PDO::PARAM_INT);

                                if ($stmt->execute()) 
                               {
                                $stmt = $pdo->prepare("INSERT INTO producto_has_contrato(Producto_idProducto ,Contrato_idContrato) VALUES (:idProducto, :idContrato)");
                                $stmt->bindParam(":idProducto", $idBotellon, PDO::PARAM_INT);
                                $stmt->bindParam(":idContrato", $lastInsertId, PDO::PARAM_INT);

                                if ($stmt->execute()) 
                                {
                                    $lastInsertId = $pdo->lastInsertId();
                                    $stmt = $pdo->prepare("SELECT * FROM contrato c INNER JOIN producto_has_contrato pc ON c.idContrato  = pc.Contrato_idContrato INNER JOIN producto p ON pc.Producto_idProducto = p.idProducto  WHERE pc.Producto_idProducto = :idProducto"); 
                                   $stmt->bindParam(":idProducto", $idEstante, PDO::PARAM_INT);

                                   if($stmt->execute())
                                   {   
                                        $arrayProducto = $stmt->fetch();
                                        $cantidadActual = $arrayProducto['cantidadProductos'];
                                        $resultado = $cantidadActual - $cantidadEstantes;
                                        $stmt = $pdo->prepare("UPDATE producto SET cantidadProductos = :resultado WHERE idProducto = :idProducto"); 
                                        $stmt->bindParam(":idProducto", $idEstante, PDO::PARAM_INT);
                                        $stmt->bindParam(":resultado", $resultado, PDO::PARAM_INT);
                                        if ($stmt->execute()) 
                                        {
                                                $stmt = $pdo->prepare("SELECT * FROM contrato c INNER JOIN producto_has_contrato pc ON c.idContrato  = pc.Contrato_idContrato INNER JOIN producto p ON pc.Producto_idProducto = p.idProducto  WHERE pc.Producto_idProducto = :idProducto"); 
                                                $stmt->bindParam(":idProducto", $idBotellon, PDO::PARAM_INT);
                                            if ($stmt->execute()) 
                                            {
                                                $arrayProducto = $stmt->fetch();
                                                $cantidadActual = $arrayProducto['cantidadProductos'];
                                                $resultado = $cantidadActual - $cantidadBotellones;
                                                $stmt = $pdo->prepare("UPDATE producto SET cantidadProductos = :resultado WHERE idProducto = :idProducto"); 
                                                $stmt->bindParam(":idProducto", $idBotellon, PDO::PARAM_INT);
                                                $stmt->bindParam(":resultado", $resultado, PDO::PARAM_INT);
                                                if($stmt->execute())
                                                {
                                                    return "true";
                                                }else
                                                {
                                                    return"error";    
                                                }
                                            }
                                        }
                                        
                                    }
                                }
                              }
                               
                            }
                        }
                    }
                }
            }
        }
    }
}

}

?>

