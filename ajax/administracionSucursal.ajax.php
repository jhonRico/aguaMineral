<?php

require_once "../controladores/c_adminTablas.php";
require_once "../modelos/m_adminTablasModelo.php";

class   AjaxAdministracionSucursal{


     public function ajaxConsultaTodosBD($tabla)
    {
        $respuesta = ControladorRegistroAdminGeneral::consultarTodoRegBD($tabla);
        echo  json_encode ($respuesta);
    }



   public function ajaxConsultarSiRegistroExisteBD($parametro1,$parametros2,$parametros3,$tabla,$atributo1,$atributo2,$atributo3)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrlConsultarSiRegistroExisteBD($parametro1,$parametros2,$parametros3,$tabla,$atributo1,$atributo2,$atributo3);
        echo  json_encode ($respuesta);
    }
   public function ajaxEliminarSucursal($idDelete,$tabla,$atributo)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrleliminar($idDelete,$tabla,$atributo);
        echo  json_encode ($respuesta);
    }
    public function ajaxModificarOfTable2Campos($parametros1,$parametros2,$parametros3,$tabla,$atributo1,$atributo2,$atributo3)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrlModificarOfTable2CamposStrings($parametros1,$parametros2,$parametros3,$tabla,$atributo1,$atributo2,$atributo3);
        echo  json_encode ($respuesta);
    }


    public function ajaxConsultarSiRegistroExisteBD2parametros($parametro1,$parametro2,$tabla,$atributo1,$atributo2){
         $respuesta = ControladorRegistroAdminGeneral::ctrlconsultarRegistroExisteBDDosParamtros($parametro1,$parametro2,$tabla,$atributo1,$atributo2);
         echo  json_encode ($respuesta);
	}

   public function ajaxAddRegistroTresParametros($parametro1,$parametro2,$parametro3,$tabla,$atributo1,$atributo2,$atributo3){
        $respuesta = ControladorRegistroAdminGeneral::ctrlAddRegistroTresParametros($parametro1,$parametro2,$parametro3,$tabla,$atributo1,$atributo2,$atributo3);
        echo  json_encode ($respuesta);
    }

    public function ajaxAddRegistroDosParametrosString($parametro1,$parametro2,$tabla,$atributo1,$atributo2){
        $respuesta = ControladorRegistroAdminGeneral::ctrladdOfTableDosParametrosString($parametro1,$parametro2,$tabla,$atributo1,$atributo2);
        echo  json_encode ($respuesta);
    }

    public function ajaxConsultarSiRegistroExisteBDDosParametrosSrting($parametro1,$parametro2,$tabla,$atributo1,$atributo2){
        $respuesta = ControladorRegistroAdminGeneral::ctrlconsultarRegistroExisteBDDosParamtros($parametro1,$parametro2,$tabla,$atributo1,$atributo2);
        echo  json_encode ($respuesta);    
	}

 }
//---------------------------------------------------------------------------------------------------------------
if(isset($_POST["parametroNeutro"]))
{  
    $objSucursal = new AjaxAdministracionSucursal();
    $objSucursal->ajaxConsultaTodosBD("sucursal");
}

if(isset($_POST["nameSucursal"]))
{  
    $objSucursal = new AjaxAdministracionSucursal();
    $sucursal = $_POST['nameSucursal'];
    $direccion = $_POST['direccion'];
    $objSucursal->ajaxConsultarSiRegistroExisteBDDosParametrosSrting($sucursal,$direccion,"sucursal","nombreSucursal","direccionSucursal");
}
if(isset($_POST["nombreSucursalAdd"]))
{  
    $allStates = new AjaxAdministracionSucursal();
    $sucursal     = $_POST["nombreSucursalAdd"];
    $direccion       = $_POST["direccionAdd"];
    $allStates->ajaxAddRegistroDosParametrosString($sucursal,$direccion,"sucursal","nombreSucursal","direccionSucursal");
}
if(isset($_POST["idSucursalDelete"])){
    $objMunicipio = new AjaxAdministracionSucursal();
    $idDeleteSucursal = $_POST['idSucursalDelete'];
    $objMunicipio->ajaxEliminarSucursal($idDeleteSucursal,"sucursal","idSucursal ");
}
if(isset($_POST["idSucursalModificado"])){
    $objEstado = new AjaxAdministracionSucursal();
    $idSucursalEdit = $_POST['idSucursalModificado'];
    $nombreSucursalEdit = $_POST['sucursalupdate'];
    $direccionEdit = $_POST['direccionUpdate'];
    $objEstado->ajaxModificarOfTable2Campos($nombreSucursalEdit,$direccionEdit,$idSucursalEdit,"sucursal","nombreSucursal","direccionSucursal","idSucursal");
}

?>