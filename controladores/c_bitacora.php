<?php

class ControladorBitacora
{
    static public function consultarTodoRegBD($tabla)
    {
        
        $respuesta = ModeloRegistroAdminGeneral::mdlConsultarTodosRegBD($tabla); 
        return $respuesta;
	}

    static public function ctrlRegistroBitacora($usuario,$descripcion)
    {     
        date_default_timezone_set("America/Bogota");
        $fecha = date("Y-m-d H:i:s");
        $tabla = "bitacorasistema";
        $respuesta = ModeloBitacora::mdlRegistroBitacora($tabla,$usuario,$descripcion,$fecha);
        return $respuesta;
    }


} 
?>