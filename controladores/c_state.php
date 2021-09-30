<?php


class ControladorState{ 
  
    static public function ctrlConsultarAllStates(){
        $respuesta = ModeloState::mdlConsultarAllStates();
        return $respuesta;
	}
    static public function ctrlAddState($nameState){

    $tabla = "estado";
    $datos = array(
             "nameValue"=>$nameState);

        $respuesta = ModeloState::mdlAddState($tabla,$datos);
        return $respuesta;
	}
}