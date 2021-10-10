<?php

class controladorZonas
{ 
  
    static public function ctrlconsultarCiudades($consultar)
    {
        
    $tabla = "ciudad";

    $respuesta = ModeloZonas::mdlconsultarCiudades($tabla);

    return $respuesta;

	}
}