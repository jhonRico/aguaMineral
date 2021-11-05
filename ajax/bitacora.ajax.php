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
    
    public function ajaxConsultaTodosBDConWhere($tabla,$atributo,$valor)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrlConsultarTablaAtributoEnteroV($tabla,$atributo,$valor);
        echo  json_encode ($respuesta);
    }

 }
//---------------------------------------------------------------------------------------------------------------
if(isset($_POST["consultaAllBitacora"]))
{  
    $objCiudad = new AjaxABitacora();
    $objCiudad->ajaxConsultaTodosBD("bitacorasistema");
}

if(isset($_POST["capacidadContrato"]))
{  
    $objCiudad = new AjaxABitacora();
    $idProducto = $_POST["capacidadContrato"];
    $objCiudad->ajaxConsultaTodosBDConWhere("producto","idProducto",$idProducto);
}

?>