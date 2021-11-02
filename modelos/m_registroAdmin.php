<?php

require_once "conexion.php";

 class ModeloRegistroAdmin
 {
    //Tipo Producto 
    static public function mdlRegistrarTipoProducto($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(descripcion)
                 VALUES  (:descripcion)");

        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return"Error";
        }
        $stmt->close();
        $stmt=null;
    }
    static public function mdlConsultarTipoProducto($tabla,$datos)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY :parametro1 ASC");
        $stmt->bindParam(":parametro1", $datos["parametro1"], PDO::PARAM_STR);

        $stmt -> execute();
        return  $stmt ->fetchAll();
    }
    static public function mdlModificarTipoProducto($tabla,$datos)
    {
         $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET descripcion = :descripcion WHERE idTipoProducto = :idTipoProducto");

        $stmt->bindParam(":idTipoProducto", $datos["idTipoProducto"], PDO::PARAM_INT);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);

        if($stmt->execute())
        {
            return "ok";
        }else
        {
            return"Error";
        }
        $stmt->close();
        $stmt=null;    
    }
    static public function mdlEliminarRegistroTabla($tabla,$datos)
     {
        $parametro = $datos['parametro'];
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $parametro = :id");
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);

        if($stmt->execute())
        {
            return "ok";
        }else
        {
            return"Error";
        }
    }
    //Productos
    static public function mdlRegistrarProducto($tabla,$tabla2,$datos)
    {
        $stmt2 = Conexion::conectar()->prepare("SELECT * FROM serialproducto s INNER JOIN producto p ON s.idSerialProducto = p.SerialProducto_idSerialProducto INNER JOIN tipoproducto t ON p.TipoProducto_idTipoProducto = t.idTipoProducto INNER JOIN producto_has_sucursal ps ON p.idProducto = ps.Producto_idProducto  WHERE t.idTipoProducto = :tipoProducto AND p.capacidadProducto = :capacidad AND ps.Sucursal_idSucursal = :sucursal");

        $stmt2->bindParam(":sucursal", $datos["sucursal"], PDO::PARAM_INT);
        $stmt2->bindParam(":tipoProducto", $datos["tipoProducto"], PDO::PARAM_INT);
        $stmt2->bindParam(":capacidad", $datos["capacidad"], PDO::PARAM_INT);
  
        $stmt2 -> execute();
        $prueba = $stmt2->fetch();

        if ($prueba != false) 
        {
            $idProducto = $prueba['idProducto'];
            $cantidadActual = $prueba['cantidadProductos'];
            $cantidadASumar = $datos["cantidad"];
            $nombreTipoContrato = null;
            $resultado = $cantidadASumar + $cantidadActual;

            $stmt = Conexion::conectar()->prepare("UPDATE producto SET cantidadProductos = $resultado WHERE idProducto = $idProducto");

            if($stmt->execute())
            {
                $stmt = Conexion::conectar()->prepare("INSERT INTO historiaproducto (nombre,fechaIngreso,cantidadTotal,idTipoProducto,idProducto,serial,capacidad) VALUES ('$nombreTipoContrato',:fecha,:cantidad,:idTipoProducto,:idProducto,:seria,:capacidad)");

                $stmt->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
                $stmt->bindParam(":idTipoProducto", $datos["tipoProducto"], PDO::PARAM_INT);
                $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
                $stmt->bindParam(":seria", $datos["serial"], PDO::PARAM_STR); 
                $stmt->bindParam(":capacidad", $datos["capacidad"], PDO::PARAM_INT);
                $stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_INT);
                if ($stmt->execute()) 
                {
                    return "agregado";  
                    $stmt -> close();
                    $stmt = null;              
                }else
                {
                    return "error";
                    $stmt -> close();
                    $stmt = null;
                }
            }
        }else
        {   
            $pdo = Conexion::conectar();
            $stmt = $pdo->prepare("INSERT INTO $tabla(numeroSerial, fechaCreacion, estado)
            VALUES  (:seria, :fecha, :estado)");

            $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
            $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
            $stmt->bindParam(":seria", $datos["serial"], PDO::PARAM_STR);   

            if($stmt->execute())
            {

                $lastInsertId = $pdo->lastInsertId();

                $stmt = $pdo->prepare("INSERT INTO $tabla2(SerialProducto_idSerialProducto , TipoProducto_idTipoProducto , capacidadProducto, cantidadProductos)
                VALUES  ('$lastInsertId',:tipoProducto, :capacidad, :cantidad)");

                $stmt->bindParam(":tipoProducto", $datos["tipoProducto"], PDO::PARAM_INT);
                $stmt->bindParam(":capacidad", $datos["capacidad"], PDO::PARAM_INT);
                $stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_INT);

                    if($stmt->execute())
                    {
                        $idProducto = $pdo->lastInsertId();

                        $stmt = $pdo->prepare("INSERT INTO producto_has_sucursal(Producto_idProducto, Sucursal_idSucursal)
                        VALUES  ('$idProducto',:sucursal)");
                        $stmt->bindParam(":sucursal", $datos["sucursal"], PDO::PARAM_INT);

                        if ($stmt->execute()) 
                        {
                            $nombreTipoContrato = null;
                            $stmt = Conexion::conectar()->prepare("INSERT INTO historiaproducto (nombre,fechaIngreso,cantidadTotal,idTipoProducto,idProducto,serial,capacidad) VALUES ('$nombreTipoContrato',:fecha,:cantidad,:idTipoContrato,:idProducto,:seria,:capacidad)");

                                $stmt->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
                                $stmt->bindParam(":idTipoContrato", $datos["tipoProducto"], PDO::PARAM_INT);
                                $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
                                $stmt->bindParam(":seria", $datos["serial"], PDO::PARAM_STR); 
                                $stmt->bindParam(":capacidad", $datos["capacidad"], PDO::PARAM_INT);
                                $stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_INT);
                                 if ($stmt->execute()) 
                                {
                                    return "ok";
                                    $stmt -> close();
                                    $stmt = null;
                                }else
                                {
                                    return "error";
                                    $stmt -> close();
                                    $stmt = null;
                                }
                        }
                    }
            }
        }
        $stmt2 -> close();
        $stmt2 = null;
    }
    static public function mdlConsultarProducto($parametro)
    {
        $atributo1 = "TipoProducto_idTipoProducto";
        $atributo2 = "idTipoProducto";
        $stmt = Conexion::conectar()->prepare("SELECT * FROM producto t1 INNER JOIN tipoproducto t2 ON t1.$atributo1 = t2.$atributo2 INNER JOIN serialproducto s ON  t1.SerialProducto_idSerialProducto = s.idSerialProducto INNER JOIN producto_has_sucursal ps ON t1.idProducto = ps.Producto_idProducto WHERE ps.Sucursal_idSucursal = '$parametro' ORDER BY t2.descripcion ASC");

        $stmt -> execute();
        return  $stmt ->fetchAll(); 
    }
    //Paises
    static public function mdlRegistroAdmin($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(descripcion)
                 VALUES  (:descripPais)");
        
        $stmt->bindParam(":descripPais", $datos["nombrePais"], PDO::PARAM_STR);
  

        if($stmt->execute()){
            return "ok";
        }else{
            return"Error";
        }
        $stmt->close();
        $stmt=null;
    }
     static public function mdlEliminarPais($tabla, $datos)
     {
           $tablaEstado = "estado";
           $stmtEstado = Conexion::conectar()->prepare("SELECT * FROM $tablaEstado where Pais_idPais = :idPais");
           $stmtEstado->bindParam(":idPais", $datos["idPais"], PDO::PARAM_INT);
           $stmtEstado-> execute();
           $existeEstado = $stmtEstado ->fetchAll();

           if($existeEstado==false){
                    $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idPais = :idPais");        
                    $stmt->bindParam(":idPais", $datos["idPais"], PDO::PARAM_INT);
                    if($stmt->execute())
                    {
                        return "ok";
                    }else
                    {
                        return"Error";
                    }
                    $stmt->close();
                    $stmt=null;

           }else{
                return "relacionado";
		   }
           $stmtEstado->close();
    }
    static public function mdlModificarPais($tabla, $datos)
     {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET descripcion = :descripcion WHERE idPais = :idPais");
        
        $stmt->bindParam(":idPais", $datos["idPais"], PDO::PARAM_INT);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
  

        if($stmt->execute())
        {
            return "ok";
        }else
        {
            return"Error";
        }
        $stmt->close();
        $stmt=null;
    }

    static public function mdlConsultarPais($tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt -> execute();
        return  $stmt ->fetchAll();

       
	}

    static public function mdlConsultarRegistroPais($tabla,$datos)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE descripcion = :registroPais");

        $stmt->bindParam(":registroPais", $datos["registroPais"], PDO::PARAM_STR);

        $stmt -> execute();
        return  $stmt ->fetch();
    }
    static public function mdlModificarProducto($tabla,$tabla2,$datos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla2 SET numeroSerial = :serialDescripcion WHERE idSerialProducto = :serialEditar");

        $stmt->bindParam(":serialEditar", $datos["serialEditar"], PDO::PARAM_STR);
        $stmt->bindParam(":serialDescripcion", $datos["serialDescripcion"], PDO::PARAM_STR);

        if ($stmt->execute()) 
        {
            $stmt2 = Conexion::conectar()->prepare("UPDATE producto SET SerialProducto_idSerialProducto = :serialEditar , capacidadProducto = :capacidadEditar , cantidadProductos = :cantidadEditar WHERE idProducto  = :idEditarProducto");

            $stmt2->bindParam(":serialEditar", $datos["serialEditar"], PDO::PARAM_STR);
            $stmt2->bindParam(":idEditarProducto", $datos["idEditarProducto"], PDO::PARAM_INT);
            $stmt2->bindParam(":cantidadEditar", $datos["cantidadEditar"], PDO::PARAM_INT);
            $stmt2->bindParam(":capacidadEditar", $datos["capacidadEditar"], PDO::PARAM_INT);

            if($stmt2->execute())
            {
                return "ok";
            }else
            {
                return"Error";
            }  
        }
    }

    static public function mdlConsultarProductoExistente($tabla,$tabla2,$datos)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM producto p INNER JOIN producto_has_sucursal ps ON p.idProducto = ps.Producto_idProducto INNER JOIN serialproducto sp ON p.SerialProducto_idSerialProducto = sp.idSerialProducto WHERE ps.Sucursal_idSucursal = :sucursalProductoExistente AND p.capacidadProducto = :capacidadProductoExistente AND  TipoProducto_idTipoProducto = :tipoProductoExistente");

        $stmt->bindParam(":capacidadProductoExistente", $datos["capacidadProductoExistente"], PDO::PARAM_INT);
        $stmt->bindParam(":sucursalProductoExistente", $datos["sucursalProductoExistente"], PDO::PARAM_INT);
        $stmt->bindParam(":tipoProductoExistente", $datos["tipoProductoExistente"], PDO::PARAM_INT);

        $stmt -> execute();
        return  $stmt ->fetchAll();
    }
    static public function mdlModificarUsuario($tabla,$datos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET numeroSerial = :serialDescripcion WHERE idSerialProducto = :serialEditar");

        $stmt->bindParam(":serialEditar", $datos["serialEditar"], PDO::PARAM_STR);
        $stmt->bindParam(":serialDescripcion", $datos["serialDescripcion"], PDO::PARAM_STR); 
    }

}

?>

   