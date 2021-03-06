<?php

require_once "../controladores/c_adminTablas.php";
require_once "../modelos/m_adminTablasModelo.php";
require_once "../controladores/c_bitacora.php";
require_once "../modelos/m_bitacora.php";  

class   AjaxAdministracionMunicipio{


     public function ajaxConsultaTodosBDJoin($tabla1,$tabla2)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrlConsultaTodosBDJoin($tabla1,$tabla2);
        echo  json_encode ($respuesta);
    }



   public function ajaxConsultarSiRegistroExisteBD($parametro1,$parametros2,$parametros3,$tabla,$atributo1,$atributo2,$atributo3)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrlConsultarSiRegistroExisteBD($parametro1,$parametros2,$parametros3,$tabla,$atributo1,$atributo2,$atributo3);
        echo  json_encode ($respuesta);
    }
   public function ajaxEliminarMunicipio($idDelete,$tabla,$atributo,$nombreDeleteMunicipio)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrleliminar($idDelete,$tabla,$atributo);
        if(strpos($respuesta,"ok")!== false){
           session_start();  
           $audit = ControladorBitacora::ctrlRegistroBitacora($_SESSION['usuarioAuditoria'],"El usuario elimina el municipio con nombre: ".$nombreDeleteMunicipio);
		}
        echo  json_encode ($respuesta);
    }
    public function ajaxModificarOfTable3Campos($parametros1,$parametros2,$parametros3,$parametros4,$tabla,$atributo1,$atributo2,$atributo3,$atributo4)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrlModificarOfTable3Campos($parametros1,$parametros2,$parametros3,$parametros4,$tabla,$atributo1,$atributo2,$atributo3,$atributo4);
        echo  json_encode ($respuesta);
    }




   public function ajaxAddRegistroTresParametros($parametro1,$parametro2,$parametro3,$tabla,$atributo1,$atributo2,$atributo3){
        $respuesta = ControladorRegistroAdminGeneral::ctrlAddRegistroTresParametros($parametro1,$parametro2,$parametro3,$tabla,$atributo1,$atributo2,$atributo3);
        echo  json_encode ($respuesta);
    }

 }
//---------------------------------------------------------------------------------------------------------------
if(isset($_POST["consultaAllMunicipio"]))
{  
    $objmunicipio = new AjaxAdministracionMunicipio();
    $objmunicipio->ajaxConsultaTodosBDJoin("municipio","estado");
}

if(isset($_POST["municipio"]))
{  
    $objMunicipio = new AjaxAdministracionMunicipio();
    $municipio = $_POST['municipio'];
    $idEstadoValue = $_POST['idEstadoValue'];
    $capital = $_POST['capital'];
    $objMunicipio->ajaxConsultarSiRegistroExisteBD($municipio,$idEstadoValue,$capital,"municipio","nombreMunicipio","Estado_idEstado","capitalMunicipio");
}
if(isset($_POST["addMunicipio"]))
{  
    $allStates = new AjaxAdministracionMunicipio();
    $municipio     = $_POST["addMunicipio"];
    $capital       = $_POST["addCapital"];
    $idEstadoValue = $_POST["addidEstadoValue"];
    $allStates->ajaxAddRegistroTresParametros($idEstadoValue,$municipio,$capital,"municipio","Estado_idEstado","nombreMunicipio","capitalMunicipio");
}
if(isset($_POST["idMunicipioDelete"])){
    $objMunicipio = new AjaxAdministracionMunicipio();
    $idDeleteMunicipio = $_POST['idMunicipioDelete'];
    $nombreDeleteMunicipio = $_POST['nombreMunicipioDelete'];
    $objMunicipio->ajaxEliminarMunicipio($idDeleteMunicipio,"municipio","idMunicipio",$nombreDeleteMunicipio);
}
if(isset($_POST["idMunicipioEdit"])){
    $objEstado = new AjaxAdministracionMunicipio();
    $idMunicipioEdit = $_POST['idMunicipioEdit'];
    $nombreMunicipioEdit = $_POST['nombreMunicipioEdit'];
    $capitalMunicipioEdit = $_POST['capitalMunicipioEdit'];
    $idEstadoEditipioEdit = $_POST['idEstadoEdit'];
    $objEstado->ajaxModificarOfTable3Campos($nombreMunicipioEdit,$capitalMunicipioEdit,$idEstadoEditipioEdit,$idMunicipioEdit,"municipio","nombreMunicipio","capitalMunicipio","Estado_idEstado","idMunicipio");
}
/*Ajax para sucursales*/
if(isset($_POST["sector"]))
{  
    $allStates = new AjaxAdministracionMunicipio();
    $sector    = $_POST["sector"];
    $sucursal  = $_POST["sucursal"];
    $direccion = $_POST["direccion"];
    $allStates->ajaxAddRegistroTresParametros($sector,$sucursal,$direccion,"sucursal","Sector_idSector" ,"nombreSucursal","direccionSucursal");
}
if(isset($_POST["consultar"]))
{  
    $objmunicipio = new AjaxAdministracionMunicipio();
    $objmunicipio->ajaxConsultaTodosBD("sucursal");
}

?>