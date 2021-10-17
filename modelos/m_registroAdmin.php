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
    static public function mdlEliminarTipoProducto($tabla, $datos)
     {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idTipoProducto = :idTipoProducto");
        $stmt->bindParam(":idTipoProducto", $datos["idTipoProducto"], PDO::PARAM_INT);
        
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
    //Productos
    static public function mdlRegistrarProducto($tabla,$tabla2,$datos)
    {
        $stmt2 = Conexion::conectar()->prepare("SELECT * FROM serialproducto s INNER JOIN producto p ON s.idSerialProducto = p.SerialProducto_idSerialProducto INNER JOIN tipoproducto t ON p.TipoProducto_idTipoProducto = t.idTipoProducto INNER JOIN producto_has_sucursal ps ON p.idProducto = ps.Producto_idProducto  WHERE t.idTipoProducto = :tipoProducto AND p.capacidadProducto = :capacidad AND s.numeroSerial = :seria AND ps.Sucursal_idSucursal = :sucursal");

        $stmt2->bindParam(":sucursal", $datos["sucursal"], PDO::PARAM_INT);
        $stmt2->bindParam(":tipoProducto", $datos["tipoProducto"], PDO::PARAM_INT);
        $stmt2->bindParam(":seria", $datos["serial"], PDO::PARAM_STR); 
        $stmt2->bindParam(":capacidad", $datos["capacidad"], PDO::PARAM_INT);
  
        $stmt2 -> execute();
        $prueba = $stmt2->fetch();

        if ($prueba != false) 
        {
            $idProducto = $prueba['idProducto'];
            $cantidadActual = $prueba['cantidadProductos'];
            $cantidadASumar = $datos["cantidad"];
            $resultado = $cantidadASumar + $cantidadActual;

            $stmt = Conexion::conectar()->prepare("UPDATE producto SET cantidadProductos = $resultado WHERE idProducto = $idProducto");

            if($stmt->execute())
            {
                return "agregado";
            }else
            {
                return "error";
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

                $stmt = $pdo->prepare("INSERT INTO $tabla2(Contrato_idContrato , SerialProducto_idSerialProducto , TipoProducto_idTipoProducto , capacidadProducto, cantidadProductos)
                VALUES  (:idContrato,'$lastInsertId',:tipoProducto, :capacidad, :cantidad)");

                $stmt->bindParam(":idContrato", $datos["idContrato"], PDO::PARAM_INT);
                $stmt->bindParam(":tipoProducto", $datos["tipoProducto"], PDO::PARAM_INT);
                $stmt->bindParam(":capacidad", $datos["capacidad"], PDO::PARAM_INT);
                $stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_INT);

                    if($stmt->execute())
                    {
                        $lastInsertId = $pdo->lastInsertId();

                        $stmt = $pdo->prepare("INSERT INTO producto_has_sucursal(Producto_idProducto, Sucursal_idSucursal)
                        VALUES  ('$lastInsertId',:sucursal)");
                        $stmt->bindParam(":sucursal", $datos["sucursal"], PDO::PARAM_INT);

                        if ($stmt->execute()) 
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
    static public function mdlConsultarProducto()
    {
        $atributo1 = "TipoProducto_idTipoProducto";
        $atributo2 = "idTipoProducto";
        $stmt = Conexion::conectar()->prepare("SELECT * FROM producto t1 INNER JOIN tipoproducto t2 ON t1.$atributo1 = t2.$atributo2 INNER JOIN serialproducto s ON  t1.SerialProducto_idSerialProducto = s.idSerialProducto ORDER BY t2.descripcion ASC");

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

}

?>

   