<?php

require_once "conexion.php";

 class ModeloRegistroAdminGeneral
 {
    static public function mdlConsultarTodosRegBD($tabla)

    {   
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt -> execute();
        return  $stmt ->fetchAll();

       
	}
     static public function mdlConsultarRegistroAdd($datos,$tabla,$atributoComparar) 
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $atributoComparar = :registroValue");
        $stmt->bindParam(":registroValue", $datos["registroValue"], PDO::PARAM_STR);        

        $stmt -> execute();
        return  $stmt ->fetch();
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
                        $returnValue = "sector-Ciudad_idCiudad"; 
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
        echo $datos["parametro2"];
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
    static public function mdlConsultarSiRegistroExisteBD($datos,$tabla,$atributo1,$atributo2,$atributo3) 
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $atributo1 = :parametro1 and $atributo2 = :parametro2 and $atributo3 = :parametro3");
        $stmt->bindParam(":parametro1", $datos["parametros1"], PDO::PARAM_STR);
        $stmt->bindParam(":parametro2", $datos["parametros2"], PDO::PARAM_INT);
        $stmt->bindParam(":parametro3", $datos["parametros3"], PDO::PARAM_STR);

        $stmt -> execute();
        return  $stmt ->fetch();

    }

    static public function mdlConsultarParametros(){
      $datos = array(
            array('NombreCliente', 'Aqui va la descripcion de lo que el parametro hace bebe'),
            array('MunicipioCliente', 'Aqui va la descripcion de lo que el parametro hace bebe'),
            array('cedulaCliente', 'Aqui va la descripcion de lo que el parametro hace bebe'),
            array('nombreComercio', 'Aqui va la descripcion de lo que el parametro hace bebe'),
            array('direccionComercio', 'Aqui va la descripcion de lo que el parametro hace bebe'),
            array('telefonoComercio', 'Aqui va la descripcion de lo que el parametro hace bebe'),
            array('municipioCliente', 'Aqui va la descripcion de lo que el parametro hace bebe'),
            array('cantidadEstante', 'Aqui va la descripcion de lo que el parametro hace bebe'),
            array('codigoProducto', 'Aqui va la descripcion de lo que el parametro hace bebe'),
            array('fechaConstruccion', 'Aqui va la descripcion de lo que el parametro hace bebe'),
            array('fechaConstruccion', 'Aqui va la descripcion de lo que el parametro hace bebe'),

        );
         return  $datos;
	}

 }
?>