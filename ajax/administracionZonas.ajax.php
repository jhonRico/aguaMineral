<?php

require_once "../controladores/c_adminTablas.php";
require_once "../modelos/m_adminTablasModelo.php";

class   AjaxAdministracionZonas{


     public function ajaxConsultaTodosBD($tabla)
    {
        $respuesta = ControladorRegistroAdminGeneral::consultarTodoRegBD($tabla);
        echo  json_encode ($respuesta);
    }
    public function ajaxConsultaInDbExisteZonas($registroValue,$tabla)
    {
        $respuesta = ControladorRegistroAdminGeneral::consultarRegistroExisteBD($registroValue,$tabla,"descripcion");
        echo  json_encode ($respuesta);
    }
      public function ajaxAddRegistro($nombreValue,$tabla)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrlAddregistro($nombreValue,$tabla);
        echo  json_encode ($respuesta);
    }

    public function ajaxEliminarZona($idDeleteTipUser,$tabla,$atributo)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrleliminar($idDeleteTipUser,$tabla,$atributo);
        echo  json_encode ($respuesta);
    }
    public function ajaxModificarOfTable($id,$valueTable,$tabla,$atributoSet,$atributoWhere)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrlModificarOfTable($id,$valueTable,$tabla,$atributoSet,$atributoWhere);
        echo  json_encode ($respuesta);
    }

 }

if(isset($_POST["parametroNeutro"]))
{  
    $objZonas = new AjaxAdministracionZonas();
    $objZonas->ajaxConsultaTodosBD("zonas");
}

if(isset($_POST["validaExisteZonaInBd"]))
{  
    $objZonas = new AjaxAdministracionZonas();
    $registroValue = $_POST['validaExisteZonaInBd'];
    $objZonas->ajaxConsultaInDbExisteZonas($registroValue,"zonas");
}

if(isset($_POST["descripcionZonaValue"]))
{  
    $allStates = new AjaxAdministracionZonas();
    $nombreValue = $_POST["descripcionZonaValue"];
    $allStates->ajaxAddRegistro($nombreValue,"zonas");
}

if(isset($_POST["idZona"])){
    $objZona = new AjaxAdministracionZonas();
    $idDeleteZona = $_POST['idZona'];
    $objZona->ajaxEliminarZona($idDeleteZona,"zonas","idZonas");
}

if(isset($_POST["idZonaModificado"])){
    $objTipoUser = new AjaxAdministracionZonas();
    $idUpdateTipUser = $_POST['idZonaModificado'];
    $valueUpdate = $_POST['descripcion'];
    $objTipoUser->ajaxModificarOfTable($idUpdateTipUser,$valueUpdate,"zonas","descripcion","idZonas");
}

?>