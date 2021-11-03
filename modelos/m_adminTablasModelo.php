<?php

require_once "conexion.php";

 class ModeloRegistroAdminGeneral
 {
    static public function mdlConsultarTodosRegBD($tabla)

    {   
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt -> execute();
        return  $stmt ->fetchAll();
        $stmt->close();
        $stmt=null;

	}
     static public function mdlConsultarRegistroAdd($datos,$tabla,$atributoComparar) 
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $atributoComparar = :registroValue");
        $stmt->bindParam(":registroValue", $datos["registroValue"], PDO::PARAM_STR);        

        $stmt -> execute();
        return  $stmt ->fetch();
        $stmt->close();
        $stmt=null;

    }
    static public function mdlConsultarTodoEnDosTablas($tabla,$tabla2,$atributoTabla1,$atributoTabla2)
    {
        $stmt = Conexion::conectar()->prepare("SELECT* FROM $tabla t INNER JOIN $tabla2 t2 ON t.$atributoTabla1 = t2.$atributoTabla2");
        $stmt -> execute();
        return  $stmt ->fetchAll();
        $stmt->close();
        $stmt=null;
    }
    static public function mdlConsultarTodoEnTresTablas($tabla,$tabla2,$tabla3,$atributoTabla1,$atributoTabla2,$atributoTabla,$atributoTabla3)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla t INNER JOIN $tabla2 t2 ON t.$atributoTabla1 = t2.$atributoTabla2 INNER JOIN $tabla3 t3 ON t.$atributoTabla = t3.$atributoTabla3");
        $stmt -> execute();
        return  $stmt ->fetchAll();
        $stmt->close();
        $stmt=null;
    }
    static public function mdlAddregistroTipUser($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (descripcion)
                 VALUES  (:registroValue)");
        
        $stmt->bindParam(":registroValue", $datos["registroValueTipUser"], PDO::PARAM_STR);
  

        if($stmt->execute()){
            return "ok";
        }else{
            return"Error";
        }
        $stmt->close();
        $stmt=null;
    }
   static public function validaTabla($tabla){
        $returnValue = "";
        if($tabla!=null){
               switch ($tabla) {
                    case "estado":
                        $returnValue = "municipio-Estado_idEstado";
                        break;
                    case "municipio":
                        $returnValue = "ciudad-Municipio_idMunicipio";  
                        break;
                    case "ciudad":
                        $returnValue = "parroquia-Ciudad_idCiudad"; 
                        break; 
                    case "sucursal":
                        $returnValue = "contrato-Sucursal_idSucursal"; 
                        break; 
                    case "parroquia":
                        $returnValue = "sector-Parroquia_idParroquia"; 
                        break; 
                }
        }
        return $returnValue;
	}
      static public function mdlEliminarOfTable($tabla, $datos,$atributo)
     { 
         $resultValidar = self::validaTabla($tabla);
         if($resultValidar!=""){
                $datosFinales= explode("-", $resultValidar);
                $atributoGenerico = $datosFinales[1];
                $tablaGenerica = $datosFinales[0];
                $stmtGenerico = Conexion::conectar()->prepare("SELECT * FROM $tablaGenerica where $atributoGenerico = :idTable");
                $stmtGenerico->bindParam(":idTable", $datos["idTable"], PDO::PARAM_INT);  
                $stmtGenerico-> execute();
                $existe = $stmtGenerico ->fetchAll();

                if($existe==false){
                    return self::EliminarOfTableFinal($tabla, $datos,$atributo);
                }else{
                    return "relacionado";        
				}
                $stmtEstado->close();

		 }else{
               return self::EliminarOfTableFinal($tabla, $datos,$atributo);
         }
    }
    static public function EliminarOfTableFinal($tabla, $datos,$atributo){
         $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $atributo = :idTable");        
         $stmt->bindParam(":idTable", $datos["idTable"], PDO::PARAM_INT);  
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

    static public function mdlModificarOfTable($tabla, $datos,$atributoSet,$atributoWhere)
     {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $atributoSet = :descripcion WHERE $atributoWhere = :idTable");
        
        $stmt->bindParam(":idTable", $datos["idTable"], PDO::PARAM_INT);
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


   static public function mdladdOfTableDosParametrosAsociada($tabla, $datos,$atributo1,$atributo2)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla ($atributo1,$atributo2)
                 VALUES  (:parametro1,:parametro2)");
        
        $stmt->bindParam(":parametro1", $datos["parametro1"], PDO::PARAM_STR);
        $stmt->bindParam(":parametro2", $datos["parametro2"], PDO::PARAM_INT);
  

        if($stmt->execute()){
            return "ok";
        }else{
            return"Error";
        }
        $stmt->close();
        $stmt=null;
    }


   static public function mdlAddRegistroTresParametros($tabla, $datos,$atributo1,$atributo2,$atributo3)
    {
                $pdo = Conexion::conectar();
                $stmt = $pdo->prepare("INSERT INTO $tabla ($atributo1,$atributo2,$atributo3)
                         VALUES  (:parametro1,:parametro2,:parametro3)");        
        
                $stmt->bindParam(":parametro1", $datos["parametro1"], PDO::PARAM_INT);
                $stmt->bindParam(":parametro2", $datos["parametro2"], PDO::PARAM_STR);
                $stmt->bindParam(":parametro3", $datos["parametro3"], PDO::PARAM_STR);
                $ejecucion = $stmt->execute();

                if($ejecucion && $tabla !="municipio"){
                    return "ok";
                }else if($ejecucion && $tabla =="municipio"){
                     $datos2 = array(
                         "registroValue"=>$datos["parametro3"],
                     );
                     $datosInsert = array(
                         "parametro1"=>$datos["parametro3"],
                         "parametro2"=>$pdo->lastInsertId(),

                     );
                      $respuestaSelect = self::mdlConsultarRegistroAdd($datos2,"ciudad","nombreCiudad");
                      if($respuestaSelect==false){
                         self::mdladdOfTableDosParametrosAsociada("ciudad", $datosInsert,"nombreCiudad","Municipio_idMunicipio");
					  }
                     return "ok";
                }else{
                    return"Error";
                }
                $stmt->close();
                $stmt=null;
    }


    //-----------------Metodo que consulta un registro por dos parametros en el where pero uno de ellos es un int-------------------------
   static public function mdlconsultarRegistroBDTablaDosParamtros($datos,$tabla,$atributo1,$atributo2) 
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $atributo1 = :parametro1 and $atributo2 = :parametro2" );
        $stmt->bindParam(":parametro1", $datos["parametro1"], PDO::PARAM_STR);
        $stmt->bindParam(":parametro2", $datos["parametro2"], PDO::PARAM_STR);

        $stmt -> execute();
        return  $stmt ->fetch();
    }

    static public function mdlModificarOfTable2Campos($tabla, $datos,$atributo1,$atributo2,$atributo3)
     {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $atributo2 = :parametro2, $atributo3 = :parametro3  WHERE $atributo1 = :parametro1");
        $stmt->bindParam(":parametro1", $datos["parametro1"], PDO::PARAM_INT);
        $stmt->bindParam(":parametro2", $datos["parametros2"], PDO::PARAM_STR);
        $stmt->bindParam(":parametro3", $datos["parametros3"], PDO::PARAM_INT);
      
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

     static public function mdlModificarOfTable3Campos($tabla, $datos,$atributo1,$atributo2,$atributo3,$atributo4)
     {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $atributo1 = :parametro1, $atributo2 = :parametro2 , $atributo3 = :parametro3  WHERE $atributo4 = :parametro4");
        echo $datos["parametro2"];
        $stmt->bindParam(":parametro1", $datos["parametros1"], PDO::PARAM_STR);
        $stmt->bindParam(":parametro2", $datos["parametros2"], PDO::PARAM_STR);
        $stmt->bindParam(":parametro3", $datos["parametros3"], PDO::PARAM_INT);
        $stmt->bindParam(":parametro4", $datos["parametros4"], PDO::PARAM_INT);
      
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

     static public function mdlModificarOfTable2CamposStrings($datos,$tabla,$atributo1,$atributo2,$atributo3)
     {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $atributo1 = :parametro1, $atributo2 = :parametro2  WHERE $atributo3 = :parametro3");
        $stmt->bindParam(":parametro1", $datos["parametro1"], PDO::PARAM_STR);
        $stmt->bindParam(":parametro2", $datos["parametro2"], PDO::PARAM_STR);
        $stmt->bindParam(":parametro3", $datos["parametro3"], PDO::PARAM_INT);
      
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
    static public function mdlConsultarSiRegistroExisteBD($datos,$tabla,$atributo1,$atributo2,$atributo3) 
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $atributo1 = :parametro1 and $atributo2 = :parametro2 and $atributo3 = :parametro3");
        $stmt->bindParam(":parametro1", $datos["parametros1"], PDO::PARAM_STR);
        $stmt->bindParam(":parametro2", $datos["parametros2"], PDO::PARAM_INT);
        $stmt->bindParam(":parametro3", $datos["parametros3"], PDO::PARAM_STR);

        $stmt -> execute();
        return  $stmt ->fetch();
        $stmt->close();
        $stmt = null;

    }

    static public function mdlConsultarParametros(){
      $datos = array(
            array('NombreCliente', 'Se debe agregar este par&aacutemetro en la posici&oacuten donde se transcribe el nombre del cliente.'),
            array('MunicipioCliente', 'Se debe agregar este par&aacutemetro en la posici&oacuten donde se transcribe el municipio de la direcci&oacuten fiscal o residencia del cliente.'),
            array('cedulaCliente', 'Se debe agregar este par&aacutemetro en la posici&oacuten donde se transcribe la cedula del cliente.'),
            array('nombreComercio', 'Se debe agregar este par&aacutemetro en la posici&oacuten donde se transcribe el nombre del comercio o tienda del cliente.'),
            array('direccionComercio', 'Se debe agregar este par&aacutemetro en la posici&oacuten donde se transcribe la direcci&oacuten del comercio o tienda del cliente.'),
            array('telefonoComercio', 'Se debe agregar este par&aacutemetro en la posici&oacuten donde se transcribe el tel&eacutefono del comercio o tienda del cliente.'),
            array('municipioCliente', 'Se debe agregar este par&aacutemetro en la posici&oacuten donde se transcribe el municipio del comercio o tienda del cliente.'),
            array('cantidadEstante', 'Se debe agregar este par&aacutemetro en la posici&oacuten donde se transcribe la cantidad del producto que presta el cliente'),
            array('codigoProducto', 'Se debe agregar este par&aacutemetro en la posici&oacuten donde se transcribe el c&oacutedigo de serial del producto que presta el cliente'),
            array('fechaConstruccion', 'Se debe agregar este par&aacutemetro en la posici&oacuten donde se transcribe la fecha de construcci&oacuten del producto que presta el cliente'),
            array('cantidadBotellones', 'Se debe agregar este par&aacutemetro en la posici&oacuten donde se transcribe la cantidad de botellones que se presta el cliente'),
            array('fechaSistema', 'Se debe agregar este par&aacutemetro en la posici&oacuten donde se transcribe la la fecha del sistema'),

        );
         return  $datos;
	}

    static public function mdladdOfTableDosParametrosString($tabla, $datos,$atributo1,$atributo2)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla ($atributo1,$atributo2)
                 VALUES  (:parametro1,:parametro2)");
        
        $stmt->bindParam(":parametro1", $datos["parametro1"], PDO::PARAM_STR);
        $stmt->bindParam(":parametro2", $datos["parametro2"], PDO::PARAM_STR);
  

        if($stmt->execute()){
            return "ok";
        }else{
            return"Error";
        }
        $stmt->close();
        $stmt=null;
    }
    //Metodo que consulta en dos tablas con un atributo entero
    public static function mdlConsultar2TablasAtributoEntero($tabla,$tabla2,$valor,$atributo,$atributoTabla,$atributoTabla2)
    {
        if($atributo == "idContrato")
        {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla t INNER JOIN $tabla2 t2 ON t.$atributoTabla = t2.$atributoTabla2 INNER JOIN comercios c ON c.Persona_idPersona = t2.idPersona WHERE t.$atributo = :valor ORDER BY t.fechaContrato ASC");
            $stmt->bindParam(":valor", $valor, PDO::PARAM_INT);
            $stmt -> execute();
            return  $stmt ->fetchAll();
            $stmt->close();
            $stmt = null;
        }else
        {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla t INNER JOIN $tabla2 t2 ON t.$atributoTabla = t2.$atributoTabla2 WHERE t2.$atributo = :valor ORDER BY t.fechaContrato ASC");
            $stmt->bindParam(":valor", $valor, PDO::PARAM_INT);
            $stmt -> execute();
            return  $stmt ->fetchAll();
            $stmt->close();
            $stmt = null;
        }
        
    }
    public static function mdlConsultarTablaAtributoEntero($tabla,$atributo,$valor)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $atributo = :valor");
        $stmt->bindParam(":valor", $valor, PDO::PARAM_INT);
        $stmt -> execute();
        return  $stmt ->fetchAll();
        $stmt->close();
        $stmt = null;
    }
    public static function consultarCantidadProducto($tabla,$idProducto)
    {
        $stmt = Conexion::conectar()->prepare("SELECT cantidadProductos FROM $tabla t INNER JOIN producto_has_contrato pc ON t.idContrato = pc.Contrato_idContrato INNER JOIN producto p ON p.idProducto = pc.Producto_idProducto WHERE p.idProducto = :id");
        $stmt->bindParam(":id", $idProducto, PDO::PARAM_INT);
        $stmt->execute();
        $array = $stmt->fetch();
        return $array['cantidadProductos'];
        $stmt->close();
        $stmt = null;

    }
    public static function agregarProductoContratoDevuelto($tabla,$datos,$idProducto,$resultado)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla t INNER JOIN producto_has_contrato pc ON t.idContrato = pc.Contrato_idContrato INNER JOIN producto p ON p.idProducto = pc.Producto_idProducto SET estadoContrato = :estadoAModificar, cantidadProductos = :cantidad WHERE p.idProducto = :id AND t.idContrato = :idContratoDevolucion");
        $stmt->bindParam(":id", $idProducto, PDO::PARAM_INT);
        $stmt->bindParam(":idContratoDevolucion", $datos['idContratoDevolucion'], PDO::PARAM_INT);
        $stmt->bindParam(":cantidad", $resultado, PDO::PARAM_INT);
        $stmt->bindParam(":estadoAModificar",  $datos['estadoAModificar'], PDO::PARAM_STR);
        if ($stmt -> execute()) 
        {
            return  "ok";
        }else
        {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }
    public static function mdlDevolverContrato($tabla,$datos)
    {
        $idProducto1 = $datos['capacidad'];
        $idProducto2 = $datos['capacidad2'];
        $cantidadProducto1 = ModeloRegistroAdminGeneral::consultarCantidadProducto($tabla,$idProducto1);
        if ($cantidadProducto1 == null)
        {
            $cantidadProducto1 = 0;
        }
        $resultado = $cantidadProducto1 + $datos['cantidad'];
        $resultadoDevolucion = ModeloRegistroAdminGeneral::agregarProductoContratoDevuelto($tabla,$datos,$idProducto1,$resultado);

        $cantidadProducto2 = ModeloRegistroAdminGeneral::consultarCantidadProducto($tabla,$idProducto2);
        if ($cantidadProducto2 == null) 
        {
            $cantidadProducto2 = 0;
        }
        $resultado2 = $cantidadProducto2 + $datos['cantidad2'];
        $resultadoDevolucion2 = ModeloRegistroAdminGeneral::agregarProductoContratoDevuelto($tabla,$datos,$idProducto2,$resultado2);
        if ($resultadoDevolucion2 == "ok" || $resultadoDevolucion == "ok") 
        {
            return  "ok";
        }else
        {
            return "error";
        }
    }
    public static function mdlConsultarTodosContratosSucursal($tabla,$tabla2,$valor,$atributoTabla1,$atributoTabla2)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla c INNER JOIN $tabla2 p ON c.Persona_idPersona = p.idPersona INNER JOIN sucursal s ON c.Sucursal_idSucursal = s.idSucursal WHERE s.idSucursal = :valor ORDER BY p.cedulaPersona ASC");
        $stmt->bindParam(":valor",  $valor, PDO::PARAM_INT);
        $stmt -> execute();
        return  $stmt ->fetchAll();
        $stmt->close();
        $stmt = null;
    }
    public static function mdlConsultaTodosBDJoin($tabla1,$tabla2)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla1 t INNER JOIN (select * from $tabla2) t2 ON t.Estado_idEstado = t2.idEstado order by t.nombreMunicipio");
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt->close();
        $stmt = null;
    }

    public static function mdlConsultarRegistroExistenteCon1ParametroEntero1String($tabla,$atributo1,$atributo2,$datos)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $atributo1 = :parametro1 and $atributo2 = :parametro2");
        $stmt->bindParam(":parametro1", $datos["valor1"], PDO::PARAM_INT);
        $stmt->bindParam(":parametro2", $datos["valor2"], PDO::PARAM_STR);
        $stmt -> execute();
        return  $stmt ->fetch();
        $stmt->close();
        $stmt = null;
    }

    public static function mdlModificarUsuario($tabla,$datos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombUsuario = :nombre, apeUsuario = :apellido, correoUsuario = :nombreUsuario, TipoUsuario_idTipoUsuario = :tipoUsuario WHERE idUsuario = :idUsuarioModificar");

        $stmt->bindParam(":idUsuarioModificar", $datos["idUsuarioModificar"], PDO::PARAM_INT);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
        $stmt->bindParam(":nombreUsuario", $datos["nombreUsuario"], PDO::PARAM_STR);
        $stmt->bindParam(":tipoUsuario", $datos["tipoUsuario"], PDO::PARAM_INT);
        if ($stmt -> execute()) 
        {
            return "ok";
        }else
        {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }
    public static function mdlModificarCliente($tabla,$datos)
    {
         $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombrePersona = :nombre, apellidoPersona = :apellido, cedulaPersona = :cedula WHERE idPersona  = :idClienteModificar");
        $stmt->bindParam(":idClienteModificar", $datos["idClienteModificar"], PDO::PARAM_INT);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
        $stmt->bindParam(":cedula", $datos["cedula"], PDO::PARAM_STR);
        if ($stmt -> execute()) 
        {
            return "ok";
        }else
        {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }
    public static function mdlConsultarClienteContratoActivo($id)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM contrato c INNER JOIN persona p ON c.Persona_idPersona = p.idPersona WHERE p.idPersona = :id AND c.estadoContrato = 'A'");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
        $stmt = null;
    }
    public static function mdlEliminarCliente($datos)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM persona p INNER JOIN comercios co ON p.idPersona = co.Persona_idPersona INNER JOIN sector s ON p.Sector_idSector = s.idSector WHERE p.idPersona = :id");
        $stmt->bindParam(":id", $datos['id'], PDO::PARAM_INT);
        if ($stmt->execute()) 
        {
            $resultado = $stmt->fetch();
            $idComercio = $resultado['idComercios'];
            $idSector = $resultado['idSector'];
            $stmt = Conexion::conectar()->prepare("DELETE FROM sector WHERE idSector = :id");
            $stmt->bindParam(":id", $idSector, PDO::PARAM_INT);
            if ($stmt->execute()) 
            {
                $stmt = Conexion::conectar()->prepare("DELETE FROM comercios WHERE idComercios = :id");
                $stmt->bindParam(":id", $idComercio, PDO::PARAM_INT);
                if ($stmt->execute()) 
                {
                     $stmt = Conexion::conectar()->prepare("DELETE FROM persona WHERE idPersona = :id");
                    $stmt->bindParam(":id", $datos['id'], PDO::PARAM_INT);
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
        $stmt->close();
        $stmt = null;
    }


}
?>