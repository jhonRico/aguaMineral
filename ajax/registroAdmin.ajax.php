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
      public function ajaxModificarPais($id,$descripcion)
    {
        $respuesta = ControladorRegistroAdmin::modificarPais($id,$descripcion);
        echo  json_encode ($respuesta);
    }
    public function ajaxRegistroPais($registroPais)
    {
        $respuesta = ControladorRegistroAdmin::consultarRegistroPais($registroPais);
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
if(isset($_POST["idPaisModificado"]))
{  
  
    $allStates = new AjaxRegistroAdmin();
    $id = $_POST['idPaisModificado'];
    $descripcion = $_POST['descripcion'];
    $allStates->ajaxModificarPais($id,$descripcion);
}
if(isset($_POST["registroPais"]))
{  
  
    $allStates = new AjaxRegistroAdmin();
    $registroPais = $_POST['registroPais'];
    $allStates->ajaxRegistroPais($registroPais);
}


?>