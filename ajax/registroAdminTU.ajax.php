<?php

require_once "../controladores/c_adminTablas.php";
require_once "../modelos/m_admintablasModelo.php";

    public function ajaxConsultaTodosBD()

    {
        $tabla = "tipousuario"; 
        $respuesta = ControladorRegistroAdmin::consultarTodoRegBD($tabla);
        echo  json_encode ($respuesta);
    }

if(isset($_POST["tiposusu"]))
{  
    $allStates = new AjaxRegistroAdmin();
    $allStates->ajaxConsultaTodosBD();
}

?>