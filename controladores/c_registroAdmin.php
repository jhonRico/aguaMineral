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
     static public function modificarPais($id,$descripcion)
    {
        $tabla = "pais";
        $datos = array(
             "idPais"=>$id,
             "descripcion"=>$descripcion
         );

        $respuesta = ModeloRegistroAdmin::mdlModificarPais($tabla,$datos);
        return $respuesta;
    }

    static public function ctrlAddPais($nombrePais)
    {

    $tabla = "pais";
    $datos = array(
             "nombrePais"=>$nombrePais,
         );

        $respuesta = ModeloRegistroAdmin::mdlRegistroAdmin($tabla,$datos);
        return $respuesta;
	}
    static public function consultarRegistroPais($registroPais)
    {

    $tabla = "pais";
    $datos = array(
             "registroPais"=>$registroPais,
         );

        $respuesta = ModeloRegistroAdmin::mdlConsultarRegistroPais($tabla,$datos);
        return $respuesta;
    }
}

?>