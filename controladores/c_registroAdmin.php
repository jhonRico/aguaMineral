<?php

class ControladorRegistroAdmin
{ 


    static public function consultarPais()
    {
        $tabla = "pais";
        $respuesta = ModeloRegistroAdmin::mdlConsultarPais($tabla);
        return $respuesta;
	}

      static public function eliminarPais($id)
    {
        $tabla = "pais";
        $datos = array(
             "idPais"=>$id,
         );

        $respuesta = ModeloRegistroAdmin::mdlEliminarPais($tabla,$datos);
        return $respuesta;
    }

    static public function ctrlAddPais($nombrePais){

    $tabla = "pais";
    $datos = array(
             "nombrePais"=>$nombrePais,
         );

        $respuesta = ModeloRegistroAdmin::mdlRegistroAdmin($tabla,$datos);
        return $respuesta;
	}
}