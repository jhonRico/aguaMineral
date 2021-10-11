<?php

require_once "../controladores/c_adminTablas.php";
require_once "../modelos/m_adminTablasModelo.php";

class   AjaxAdministracionEstados{


     public function ajaxConsultaTodosBD($tabla)
    {
        $respuesta = ControladorRegistroAdminGeneral::consultarTodoRegBD($tabla);
        echo  json_encode ($respuesta);
    }
    public function ajaxConsultaInDbExisteEstado($registroValue,$tabla)
    {
        $respuesta = ControladorRegistroAdminGeneral::consultarRegistroExisteBD($registroValue,$tabla,"nombreEstado");
        echo  json_encode ($respuesta);
    }
      public function ctrlconsultarRegistroExisteBDEnTablaDosParamtrosAsociada($parametroValue1,$parametroValue2,$tabla,$atributo1,$atributo2)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrlAddRegistroDosParametrosAsociada($parametroValue1,$parametroValue2,$tabla,$atributo1,$atributo2);
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

         public function ajaxAddRegistroDosParametros($parametroValue1,$parametroValue2,$tabla,$atributo1,$atributo2)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrlAddRegistroDosParametrosAsociada($parametroValue1,$parametroValue2,$tabla,$atributo1,$atributo2);
        echo  json_encode ($respuesta);
    }

 }

if(isset($_POST["parametroNeutro"]))
{  
    $objEstados = new AjaxAdministracionEstados();
    $objEstados->ajaxConsultaTodosBD("estado");
}

if(isset($_POST["validaExisteEstadoInBd"]))
{  
    $objZonas = new AjaxAdministracionEstados();
    $registroValue = $_POST['validaExisteEstadoInBd'];
    $idPaisValue = $_POST["idPaisValue"];
    $objZonas->ctrlconsultarRegistroExisteBDEnTablaDosParamtrosAsociada($idPaisValue,$registroValue,"estado","Pais_idPais","nombreEstado");
}

if(isset($_POST["descripcionEstadoValue"]))
{  
    $allStates = new AjaxAdministracionEstados();
    $nombreValue = $_POST["descripcionEstadoValue"];
    $idPaisSeleccionado = $_POST["idPaisValue"];
    $allStates->ajaxAddRegistroDosParametros($nombreValue,$idPaisSeleccionado,"estado","nombreEstado","Pais_idPais");
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