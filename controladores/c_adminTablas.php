<?php

class ControladorRegistroAdmin1

{


    static public function consultarTodoRegBD($tabla)
    {
        
        $respuesta = ModeloRegistroAdmin1::mdlConsultarTodosRegBD($tabla); 
        return $respuesta;
	}

    static public function consultarRegistroExisteBD($registroValue,$tabla)
    {
        $tabla = "pais";
        $respuesta = ModeloRegistroAdmin1::mdlConsultarRegistroAdd($registroValue,$tabla);
        return $respuesta;
    }

   static public function ctrlAddregistro($nombreValue,$tabla)
    {

 
    $datos = array(
             "nombreValue"=>$nombreValue,
         );

        $respuesta = ModeloRegistroAdmin1::mdlRegistro($datos,$tabla);
        return $respuesta;
    }


   } 
?>