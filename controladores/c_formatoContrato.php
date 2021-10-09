<?php

class ControladorFormatoContrato
{ 


    static public function ctrlConsultarFormatoContrato($tabla)
    {
        $respuesta = ModeloFormatoContrato::mdlConsultarFormatoContrato($tabla);
        return $respuesta;
	}
     static public function ctrlConsultarClientesEnBd($tabla,$tipoUsuario,$nombreCliente)
    {
        $datos = array(
             "tipoUsuario"=>$tipoUsuario,
             "nombreCliente"=>$nombreCliente
         );
        $respuesta = ModeloFormatoContrato::mdlConsultarClientesEnBd($tabla,$datos);
        return $respuesta;
    }
     static public function ctrlConsultarTiendaEnBd($tabla,$idCliente)
    {
        $datos = array(
             "idCliente"=>$idCliente,
         );
        $respuesta = ModeloFormatoContrato::mdlConsultarTiendaEnBd($tabla,$datos);
        return $respuesta;
    }

}