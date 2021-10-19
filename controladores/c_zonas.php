<?php

class controladorZonas
{ 
  
    static public function ctrlconsultarCiudades($consultar)
    {
        
    $tabla = "ciudad";

    $respuesta = ModeloZonas::mdlconsultarCiudades($tabla);

    return $respuesta;

	}
    static public function ctrlconsultarClientes($zona,$tipoUsuario)
    {        

    $tabla = "persona";
    $datos = array(
        "tipoUsuario"=>$tipoUsuario,
        "zona"=>$zona
    );

    $respuesta = ModeloZonas::mdlconsultarClientes($tabla,$datos);

    return $respuesta;

    }
    static public function ctrlZonas($consultar)
    {
        $tabla = "parroquia";

        $respuesta = ModeloZonas::mdlconsultarZonas($tabla);

        return $respuesta;
    }

}