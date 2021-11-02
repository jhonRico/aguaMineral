<?php

require_once "../controladores/c_adminTablas.php";
require_once "../modelos/m_adminTablasModelo.php";
require_once "../controladores/c_bitacora.php";
require_once "../modelos/m_bitacora.php";

class   AjaxAdministracionCiudad{


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

   public function ajaxEliminarEstado($idDelete,$tabla,$atributo,$nombreDeleteCiudad)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrleliminar($idDelete,$tabla,$atributo);
        if(strpos($respuesta,"ok")!== false){
           session_start();  
           $audit = ControladorBitacora::ctrlRegistroBitacora($_SESSION['usuarioAuditoria'],"El usuario elimina la ciudad con nombre: ".$nombreDeleteCiudad);
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
    $objCiudad = new AjaxAdministracionCiudad();
    $objCiudad->ajaxConsultaTodosBD("ciudad");
}

if(isset($_POST["ciudad"]))
{  
    $objCiudad = new AjaxAdministracionCiudad();
    $registroValue = $_POST['ciudad'];
    $idMunicipioValue = $_POST["idMunicipioValue"];
    $objCiudad->ctrlconsultarRegistroExisteBDEnTablaDosParamtrosAsociada($idMunicipioValue,$registroValue,"ciudad","Municipio_idMunicipio","nombreCiudad");
}
if(isset($_POST["nombreciudadAdd"]))
{  
    $objCiudad = new AjaxAdministracionCiudad();
    $nombreValue = $_POST["nombreciudadAdd"];
    $idMunicipioSeleccionado = $_POST["idMunicipioValue"];
    $objCiudad->ajaxAddRegistroDosParametros($nombreValue,$idMunicipioSeleccionado,"ciudad","nombreCiudad","Municipio_idMunicipio");
}
if(isset($_POST["idCiudadDelete"])){
    $objCiudad = new AjaxAdministracionCiudad();
    $idDeleteCiudadEstado = $_POST['idCiudadDelete'];
    $nombreCiudadDelete = $_POST['nombreCiudadDelete'];
    $objCiudad->ajaxEliminarEstado($idDeleteCiudadEstado,"ciudad","idCiudad",$nombreCiudadDelete);
}
if(isset($_POST["idCiudadModificado"])){
    $objEstado = new AjaxAdministracionCiudad();
    $idUpdateEstado = $_POST['idCiudadModificado'];
    $valueUpdate = $_POST['descripcion'];
    $idvalueUpdatePais = $_POST['idMunicipioUpdated'];
    $objEstado->ajaxModificarOfTable2Campos($idUpdateEstado,$valueUpdate,$idvalueUpdatePais,"ciudad","idCiudad","nombreCiudad","Municipio_idMunicipio");
}

?>