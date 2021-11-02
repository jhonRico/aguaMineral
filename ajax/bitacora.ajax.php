<?php

require_once "../controladores/c_adminTablas.php";
require_once "../modelos/m_adminTablasModelo.php";
require_once "../controladores/c_bitacora.php";
require_once "../modelos/m_bitacora.php";

class   AjaxABitacora{


     public function ajaxConsultaTodosBD($tabla)
    {
        $respuesta = ControladorRegistroAdminGeneral::consultarTodoRegBD($tabla);
        echo  json_encode ($respuesta);
    }
    

 }
//---------------------------------------------------------------------------------------------------------------
if(isset($_POST["consultaAllBitacora"]))
{  
    $objCiudad = new AjaxABitacora();
    $objCiudad->ajaxConsultaTodosBD("bitacorasistema");
}



?>