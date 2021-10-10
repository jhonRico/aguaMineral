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

   static public function ctrlAddregistroTipUser($nombreValue,$tabla)
    {

 
    $datos = array(
             "registroValueTipUser"=>$nombreValue,
         );

        $respuesta = ModeloRegistroAdminGeneral::mdlAddregistroTipUser($tabla,$datos);
        return $respuesta;
    }

    static public function ctrleliminarTipoUser($id,$tabla,$atributoEliminar)
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


   } 
?>