<?php

require_once "../controladores/c_adminTablas.php";
require_once "../modelos/m_adminTablasModelo.php";

class   AjaxAdministracionZonas{


     public function ajaxConsultaTodosBD($tabla)
    {
        $respuesta = ControladorRegistroAdminGeneral::consultarTodoRegBD($tabla);
        echo  json_encode ($respuesta);
    }

 }

if(isset($_POST["parametroNeutro"]))
{  
    $objZonas = new AjaxAdministracionZonas();
    $objZonas->ajaxConsultaTodosBD("zonas");
}

?>