<?php
require_once "../controladores/c_state.php";
require_once "../modelos/m_state.php";


class   AjaxStates{

    public function ajaxConsultarAllStates(){
        $respuesta = ControladorState::ctrlConsultarAllStates();
        echo  json_encode ($respuesta);
	}
    public function ajaxAddState($nameState){
        $respuesta = ControladorState::ctrlAddState($nameState);
        echo  json_encode ($respuesta);
	}

}


if(isset($_POST["estados"])){  
    $allStates = new AjaxStates();
    $allStates->ajaxConsultarAllStates();
}
if(isset($_POST["nombreEstadoValue"])){  
    $allStates = new AjaxStates();
    $nameState = $_POST["nombreEstadoValue"];
    $allStates->ajaxAddState($nameState);
}
