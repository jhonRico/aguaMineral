<?php

class ControladorFormatoContrato
{ 


    static public function consultarFormatoContrato($tabla)
    {
        $respuesta = ModeloFormatoContrato::mdlConsultarFormatoContrato($tabla);
        return $respuesta;
	}

}