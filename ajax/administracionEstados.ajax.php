<?php

require_once "../controladores/c_adminTablas.php";
require_once "../controladores/c_bitacora.php";
require_once "../modelos/m_bitacora.php";
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
        $respuesta = ControladorRegistroAdminGeneral::ctrlconsultarRegistroExisteBDEnTablaDosParamtrosAsociada($parametroValue1,$parametroValue2,$tabla,$atributo1,$atributo2);
        echo  json_encode ($respuesta);
    }

   public function ajaxEliminarEstado($idDelete,$tabla,$atributo,$nombreDeleteEstado)
    {

         $respuesta = ControladorRegistroAdminGeneral::ctrleliminar($idDelete,$tabla,$atributo);

       if(strpos($respuesta,"ok")!== false){
           session_start();  
           $audit = ControladorBitacora::ctrlRegistroBitacora($_SESSION['usuarioAuditoria'],"El usuario elimina el estado con nombre: ".$nombreDeleteEstado);
		}
        echo  json_encode ($respuesta);
    }
    public function ajaxModificarOfTable2Campos($parametro1,$parametros2,$parametros3,$tabla,$atributo1,$atributo2,$atributo3)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrlModificarOfTable2Campos($parametro1,$parametros2,$parametros3,$tabla,$atributo1,$atributo2,$atributo3);
        echo  json_encode ($respuesta);
    }

         public function ajaxAddRegistroDosParametros($parametroValue1,$parametroValue2,$tabla,$atributo1,$atributo2)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrlAddRegistroDosParametrosAsociada($parametroValue1,$parametroValue2,$tabla,$atributo1,$atributo2);
        echo  json_encode ($respuesta);
    }

 }
//---------------------------------------------------------------------------------------------------------------
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

if(isset($_POST["nombreEstadoAdd"]))
{  
    $allStates = new AjaxAdministracionEstados();
    $nombreValue = $_POST["nombreEstadoAdd"];
    $idPaisSeleccionado = $_POST["idPaisValue"];
    $allStates->ajaxAddRegistroDosParametros($nombreValue,$idPaisSeleccionado,"estado","nombreEstado","Pais_idPais");
}
if(isset($_POST["idEstadoDelete"])){
    $objEstado = new AjaxAdministracionEstados();
    $idDeleteEstado = $_POST['idEstadoDelete'];
    $nombreDeleteEstado = $_POST['nombreEstadoDelete'];
    $objEstado->ajaxEliminarEstado($idDeleteEstado,"estado","idEstado",$nombreDeleteEstado);
}
if(isset($_POST["idEstadoModificado"])){
    $objEstado = new AjaxAdministracionEstados();
    $idUpdateEstado = $_POST['idEstadoModificado'];
    $valueUpdate = $_POST['descripcion'];
    $idvalueUpdatePais = $_POST['idEstadoUpdated'];
    $objEstado->ajaxModificarOfTable2Campos($idUpdateEstado,$valueUpdate,$idvalueUpdatePais,"estado","idEstado","nombreEstado","Pais_idPais");
}

?>