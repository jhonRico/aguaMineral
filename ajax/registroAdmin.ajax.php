<?php
require_once "../controladores/c_registroAdmin.php";
require_once "../modelos/m_registroAdmin.php";


class   AjaxRegistroAdmin{
    
   
    
    public function ajaxAddRegistroPais($nombrePais)
    {
        $respuesta = ControladorRegistroAdmin::ctrlAddPais($nombrePais);
        echo  json_encode ($respuesta);
	}

}

if(isset($_POST["nombrePais"]))
{  
    $allStates = new AjaxRegistroAdmin();
    $nombrePais = $_POST["nombrePais"];
    $allStates->ajaxAddRegistroPais($nombrePais);
}



?>