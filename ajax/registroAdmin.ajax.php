<?php
require_once "../controladores/c_registroAdmin.php";
require_once "../modelos/m_registroAdmin.php";


class   AjaxRegistroAdmin{
    
   
    
    public function ajaxAddRegistroPais($nombrePais)
    {
        $respuesta = ControladorRegistroAdmin::ctrlAddPais($nombrePais);
        echo  json_encode ($respuesta);
	}
    public function ajaxConsultaTodosPaises()
    {
        $respuesta = ControladorRegistroAdmin::consultarPais();
        echo  json_encode ($respuesta);
    }
     public function ajaxEliminarPais($id)
    {
        $respuesta = ControladorRegistroAdmin::eliminarPais($id);
        echo  json_encode ($respuesta);
    }

}

if(isset($_POST["nombrePais"]))
{  
    $allStates = new AjaxRegistroAdmin();
    $nombrePais = $_POST["nombrePais"];
    $allStates->ajaxAddRegistroPais($nombrePais);
}

if(isset($_POST["paises"]))
{  
    $allStates = new AjaxRegistroAdmin();
    $allStates->ajaxConsultaTodosPaises();
}

if(isset($_POST["idPais"]))
{  
  
    $allStates = new AjaxRegistroAdmin();
    $id = $_POST['idPais'];
    $allStates->ajaxEliminarPais($id);
}


?>