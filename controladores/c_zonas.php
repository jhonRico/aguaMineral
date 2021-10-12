<?php

class controladorZonas
{ 
  
    static public function ctrlconsultarCiudades($consultar)
    {
        
    $tabla = "ciudad";

    $respuesta = ModeloZonas::mdlconsultarCiudades($tabla);

    return $respuesta;

	}
    static public function ctrlconsultarClientes($consultar)
    {        

    $tabla = "persona";
    $tipoUsuario = "3";

    $respuesta = ModeloZonas::mdlconsultarClientes($tabla,$tipoUsuario);

    return $respuesta;

    }
    static public function ctrlZonas($consultar)
    {
        $tabla = "zonas";

        $respuesta = ModeloZonas::mdlconsultarZonas($tabla);

        return $respuesta;
    }

}