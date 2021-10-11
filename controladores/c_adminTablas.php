<?php

class ControladorRegistroAdminGeneral

{


    static public function consultarTodoRegBD($tabla)
    {
        
        $respuesta = ModeloRegistroAdminGeneral::mdlConsultarTodosRegBD($tabla); 
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

    //-----------------Metodo que consulta un registro por dos parametros en el where pero uno de ellos es un int-------------------------
    static public function ctrlconsultarRegistroExisteBDEnTablaDosParamtrosAsociada($parametroValue1,$parametroValue2,$tabla,$atributo1,$atributo2)
    {     
         $datos = array(
             "parametro1"=>$parametroValue1,
             "parametro2"=>$parametroValue2
         );
        $respuesta = ModeloRegistroAdminGeneral::mdlconsultarRegistroExisteBDEnTablaDosParamtrosAsociada($datos,$tabla,$atributo1,$atributo2);
        return $respuesta;
    }


   } 
?>