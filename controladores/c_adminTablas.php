<?php

class ControladorRegistroAdminGeneral
{
    static public function consultarTodoRegBD($tabla)
    {
        
        $respuesta = ModeloRegistroAdminGeneral::mdlConsultarTodosRegBD($tabla); 
        return $respuesta;
	}
    static public function ctrlModificarUsuario($idUsuarioModificar,$nombre,$apellido,$nombreUsuario,$tipoUsuario)
    {
        $tabla = 'usuario';
        $datos = array(
             "idUsuarioModificar"=>$idUsuarioModificar,
             "nombre"=>$nombre,
             "apellido"=>$apellido,
             "nombreUsuario"=>$nombreUsuario,
             "tipoUsuario" => $tipoUsuario
         );
        $respuesta = ModeloRegistroAdminGeneral::mdlModificarUsuario($tabla,$datos);
        return $respuesta;
    }
    static public function ctrlModificarCliente($nombreClienteModificar,$apellido,$cedulaCliente,$idClienteModificar)
    {
        $tabla = 'persona';
        $datos = array(
             "idClienteModificar"=>$idClienteModificar,
             "nombre"=>$nombreClienteModificar,
             "apellido"=>$apellido,
             "cedula"=>$cedulaCliente,
         );
        $respuesta = ModeloRegistroAdminGeneral::mdlModificarCliente($tabla,$datos);
        return $respuesta;
    }
    static public function ctrlConsultarClienteContratoActivo($id)
    {
        $respuesta = ModeloRegistroAdminGeneral::mdlConsultarClienteContratoActivo($id);
        return $respuesta;
    }
    static public function consultarRegistroExisteBD($registroValue,$tabla,$atributoComparar)
    {     
         $datos = array(
             "registroValue"=>$registroValue,
         );
        $respuesta = ModeloRegistroAdminGeneral::mdlConsultarRegistroAdd($datos,$tabla,$atributoComparar);
        return $respuesta;
    }

    static public function ctrlConsultarTodoEnDosTablas($tabla,$tabla2,$atributoTabla1,$atributoTabla2)
    {
        $respuesta = ModeloRegistroAdminGeneral::mdlConsultarTodoEnDosTablas($tabla,$tabla2,$atributoTabla1,$atributoTabla2);
        return $respuesta;
    }

    static public function ctrlConsultarTodoEnTresTablas($tabla,$tabla2,$tabla3,$atributoTabla1,$atributoTabla2,$atributoTabla,$atributoTabla3)
    {
        $respuesta = ModeloRegistroAdminGeneral::mdlConsultarTodoEnTresTablas($tabla,$tabla2,$tabla3,$atributoTabla1,$atributoTabla2,$atributoTabla,$atributoTabla3);
        return $respuesta;
    }

   static public function ctrlAddregistro($nombreValue,$tabla)
    {
 
    $datos = array(
             "registroValueTipUser"=>$nombreValue,
         );

        $respuesta = ModeloRegistroAdminGeneral::mdlAddregistroTipUser($tabla,$datos);
        return $respuesta;
    }

    static public function ctrleliminar($id,$tabla,$atributoEliminar)
    {        
        $datos = array(
             "idTable"=>$id,
         );

        $respuesta = ModeloRegistroAdminGeneral::mdlEliminarOfTable($tabla,$datos,$atributoEliminar);
        return $respuesta;
    }


    static public function ctrlModificarOfTable($id,$valueTable,$tabla,$atributoSet,$atributoWhere)
    {        
        $datos = array(
             "idTable"=>$id,
             "descripcion"=>$valueTable
         );

        $respuesta = ModeloRegistroAdminGeneral::mdlModificarOfTable($tabla, $datos,$atributoSet,$atributoWhere);
        return $respuesta;
    }

    static public function ctrlAddRegistroDosParametrosAsociada($parametroValue1,$parametroValue2,$tabla,$atributo1,$atributo2)
    {        
        $datos = array(
             "parametro1"=>$parametroValue1,
             "parametro2"=>$parametroValue2
         );

        $respuesta = ModeloRegistroAdminGeneral::mdladdOfTableDosParametrosAsociada($tabla, $datos,$atributo1,$atributo2);
        return $respuesta;
    }

    static public function ctrladdOfTableDosParametrosString($parametroValue1,$parametroValue2,$tabla,$atributo1,$atributo2)
    {        
        $datos = array(
             "parametro1"=>$parametroValue1,
             "parametro2"=>$parametroValue2
         );

        $respuesta = ModeloRegistroAdminGeneral::mdladdOfTableDosParametrosString($tabla, $datos,$atributo1,$atributo2);
        return $respuesta;
    }

    //-----------------Metodo que consulta un registro por dos parametros en el where pero uno de ellos es un int-------------------------
    static public function ctrlconsultarRegistroExisteBDEnTablaDosParamtrosAsociada($parametroValue1,$parametroValue2,$tabla,$atributo1,$atributo2)
    {     
         $datos = array(
             "parametro1"=>$parametroValue1,
             "parametro2"=>$parametroValue2
         );
        $respuesta = ModeloRegistroAdminGeneral::mdlconsultarRegistroBDTablaDosParamtros($datos,$tabla,$atributo1,$atributo2);
        return $respuesta;
    }

    static public function ctrlModificarOfTable2Campos($parametro1Value,$parametros2Value,$parametros3Value,$tabla,$atributo1,$atributo2,$atributo3)
    {        
        $datos = array(
             "parametro1"=>$parametro1Value,
             "parametros2"=>$parametros2Value,
             "parametros3"=>$parametros3Value
         );

        $respuesta = ModeloRegistroAdminGeneral::mdlModificarOfTable2Campos($tabla, $datos,$atributo1,$atributo2,$atributo3);
        return $respuesta;
    }
    static public function ctrlModificarOfTable3Campos($parametros1,$parametros2,$parametros3,$parametros4,$tabla,$atributo1,$atributo2,$atributo3,$atributo4)
    {        
        $datos = array(
             "parametros1"=>$parametros1,
             "parametros2"=>$parametros2,
             "parametros3"=>$parametros3,
             "parametros4"=>$parametros4
         );

        $respuesta = ModeloRegistroAdminGeneral::mdlModificarOfTable3Campos($tabla, $datos,$atributo1,$atributo2,$atributo3,$atributo4);
        return $respuesta;
    }

   static public function ctrlConsultarSiRegistroExisteBD($parametros1,$parametros2,$parametros3,$tabla,$atributo1,$atributo2,$atributo3)
    {     
         $datos = array(
             "parametros1"=>$parametros1,
             "parametros2"=>$parametros2,
             "parametros3"=>$parametros3
         );
        $respuesta = ModeloRegistroAdminGeneral::mdlConsultarSiRegistroExisteBD($datos,$tabla,$atributo1,$atributo2,$atributo3);
        return $respuesta;
    }

   static public function ctrlAddRegistroTresParametros($parametro1,$parametro2,$parametro3,$tabla,$atributo1,$atributo2,$atributo3)
    {        
        $datos = array(
             "parametro1"=>$parametro1,
             "parametro2"=>$parametro2,
             "parametro3"=>$parametro3
         );

        $respuesta = ModeloRegistroAdminGeneral::mdlAddRegistroTresParametros($tabla, $datos,$atributo1,$atributo2,$atributo3);
        return $respuesta;
    }

    static public function ctrlConsultarParametros(){
        $respuesta = ModeloRegistroAdminGeneral::mdlConsultarParametros();
        return $respuesta;
	}

        //-----------------Metodo que consulta un registro por dos parametros ambos string-------------------------
    static public function ctrlconsultarRegistroExisteBDDosParamtros($parametroValue1,$parametroValue2,$tabla,$atributo1,$atributo2)
    {     
         $datos = array(
             "parametro1"=>$parametroValue1,
             "parametro2"=>$parametroValue2
         );
        $respuesta = ModeloRegistroAdminGeneral::mdlconsultarRegistroBDTablaDosParamtros($datos,$tabla,$atributo1,$atributo2);
        return $respuesta;
    }

    static public function ctrlModificarOfTable2CamposStrings($parametroValue1,$parametroValue2,$parametroValue3,$tabla,$atributo1,$atributo2,$atributo3)
    {     
         $datos = array(
             "parametro1"=>$parametroValue1,
             "parametro2"=>$parametroValue2,
             "parametro3"=>$parametroValue3
         );
        $respuesta = ModeloRegistroAdminGeneral::mdlModificarOfTable2CamposStrings($datos,$tabla,$atributo1,$atributo2,$atributo3);
        return $respuesta;
    }
    /*------Consultar dos tablas con un atibuto entero----------------------------------------------------------------------*/
    public static function ctrlConsultar2TablasAtributoEntero($tabla,$tabla2,$valor,$atributo,$atributoTabla,$atributoTabla2)
    {
        $respuesta = ModeloRegistroAdminGeneral::mdlConsultar2TablasAtributoEntero($tabla,$tabla2,$valor,$atributo,$atributoTabla,$atributoTabla2);
        return $respuesta;
    }
    public static function ctrlConsultarTablaAtributoEntero($tabla,$atributo,$valor)
    {
        $respuesta = ModeloRegistroAdminGeneral::mdlConsultarTablaAtributoEntero($tabla,$atributo,$valor);
        return $respuesta;
    }
    public static function ctrlDevolverContrato($tabla,$idContratoDevolucion,$cantidad,$cantidad2,$capacidad,$capacidad2)
    {
        $estadoAModificar = 'D';
        $datos = array(
             "idContratoDevolucion"=>$idContratoDevolucion,
             "estadoAModificar"=>$estadoAModificar,
             "cantidad"=>$cantidad,
             "cantidad2"=>$cantidad2,
             "capacidad"=>$capacidad,
             "capacidad2"=>$capacidad2,
         );
        $respuesta = ModeloRegistroAdminGeneral::mdlDevolverContrato($tabla,$datos);
        return $respuesta;
    }
    public static function ctrlConsultarTodosContratosSucursal($tabla,$tabla2,$valor,$atributoTabla1,$atributoTabla2)
    {
        $respuesta = ModeloRegistroAdminGeneral::mdlConsultarTodosContratosSucursal($tabla,$tabla2,$valor,$atributoTabla1,$atributoTabla2);
        return $respuesta;
    }

    public static function ctrlConsultaTodosBDJoin($tabla1,$tabla2)
    {
        $respuesta = ModeloRegistroAdminGeneral::mdlConsultaTodosBDJoin($tabla1,$tabla2);
        return $respuesta;
    }
    public static function ctrlConsultarRegistroExistenteCon1ParametroEntero1String($tabla,$atributo1,$atributo2,$valor1,$valor2)
    {
        $datos = array(
             "valor1"=>$valor1,
             "valor2"=>$valor2,
         );
        $respuesta = ModeloRegistroAdminGeneral::mdlConsultarRegistroExistenteCon1ParametroEntero1String($tabla,$atributo1,$atributo2,$datos);
        return $respuesta;
    }
    public static function ctrlEliminarCliente($idClienteEliminar)
    {
         $datos = array(
             "id"=>$idClienteEliminar,
         );
        $respuesta = ModeloRegistroAdminGeneral::mdlEliminarCliente($datos);
        return $respuesta;
    }
} 
?>