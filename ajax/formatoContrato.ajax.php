<?php
require_once "../controladores/c_formatoContrato.php";
require_once "../modelos/m_formatoContrato.php";


class   AjaxFormatoContrato
{
    
    public function ajaxConsultarFormatoContrato($tabla)
    {
        $respuesta = ControladorFormatoContrato::consultarFormatoContrato($tabla);
        echo  json_encode ($respuesta);
    }
}


if(isset($_POST["valor"]))
{  
    $tabla = "formatocontrato";
    $allStates = new AjaxFormatoContrato();
    $allStates->ajaxConsultarFormatoContrato($tabla);
}

?>