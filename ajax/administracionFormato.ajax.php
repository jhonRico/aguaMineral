<?php

require_once "../controladores/c_adminTablas.php";
require_once "../modelos/m_adminTablasModelo.php";
require_once "../controladores/c_bitacora.php";
require_once "../modelos/m_bitacora.php";

class   AjaxAdministracionFormato{


   public function ajaxModificarinBD($id,$valueTable,$tabla,$atributoSet,$atributoWhere){
        $respuesta = ControladorRegistroAdminGeneral::ctrlModificarOfTable($id,$valueTable,$tabla,$atributoSet,$atributoWhere);
        echo  json_encode ($respuesta);
    }
    public function ajaxConsultarBD($valor,$tabla,$atributo){
         $respuesta = ControladorRegistroAdminGeneral::consultarRegistroExisteBD($valor,$tabla,$atributo);
         echo  json_encode ($respuesta);
	}
   
 }

class AjaxAdministracionContrato
{
    public function ajaxConsultarContratos($tabla,$tabla2,$valor,$atributo,$atributoTabla,$atributoTabla2)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrlConsultar2TablasAtributoEntero($tabla,$tabla2,$valor,$atributo,$atributoTabla,$atributoTabla2);
        echo  json_encode ($respuesta);
    }
    public function ajaxConsultarReporteContrato($tabla,$tabla2,$valor,$atributo,$atributoTabla,$atributoTabla2)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrlConsultar2TablasAtributoEntero($tabla,$tabla2,$valor,$atributo,$atributoTabla,$atributoTabla2);
        echo  json_encode ($respuesta);
    }
    public function ajaxDevolverContrato($tabla,$idContratoDevolucion,$cantidad,$cantidad2,$capacidad,$capacidad2,$dataCliente)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrlDevolverContrato($tabla,$idContratoDevolucion,$cantidad,$cantidad2,$capacidad,$capacidad2);
        if(strpos($respuesta,"ok")!== false){
           session_start();  
           $audit = ControladorBitacora::ctrlRegistroBitacora($_SESSION['usuarioAuditoria'],"El usuario Devolvio un contrato de: ".$dataCliente);
        }
        echo  json_encode ($respuesta);
    }
    public static function ajaxConsultarTodosContratos($tabla,$tabla2,$valor,$atributoTabla1,$atributoTabla2)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrlConsultarTodosContratosSucursal($tabla,$tabla2,$valor,$atributoTabla1,$atributoTabla2);
        echo  json_encode ($respuesta);
    }
}
//---------------------------------------------------------------------------------------------------------------
if(isset($_POST["consultarEstante"]))
{  
    $objFormato = new AjaxAdministracionFormato();
    $estante = $_POST["consultarEstante"];
    $objFormato->ajaxConsultarBD($estante,"tipocontrato","nombre");    
}

if(isset($_POST["estante"]))
{  
    $objFormato = new AjaxAdministracionFormato();
    $estante = $_POST["estante"];
    $idFormato = $_POST["idFormato"];
    $objFormato->ajaxModificarinBD($idFormato,$estante,"tipocontrato","descripcion","idTipoContrato");    
}

if(isset($_POST["consultarBotellon"]))
{  
    $objFormato = new AjaxAdministracionFormato();
    $estante = $_POST["consultarBotellon"];
    $objFormato->ajaxConsultarBD($estante,"tipocontrato","nombre");    
}

if(isset($_POST["botellon"]))
{  
    $objFormato = new AjaxAdministracionFormato();
    $estante = $_POST["botellon"];
    $idFormato = $_POST["idFormato"];
    $objFormato->ajaxModificarinBD($idFormato,$estante,"tipocontrato","descripcion","idTipoContrato");    
}

if(isset($_POST["consultarAmbos"]))
{  
    $objFormato = new AjaxAdministracionFormato();
    $estante = $_POST["consultarAmbos"];
    $objFormato->ajaxConsultarBD($estante,"tipocontrato","nombre");    
}

if(isset($_POST["ambos"]))
{  
    $objFormato = new AjaxAdministracionFormato();
    $estante = $_POST["ambos"];
    $idFormato = $_POST["idFormato"];
    $objFormato->ajaxModificarinBD($idFormato,$estante,"tipocontrato","descripcion","idTipoContrato");    
}
//Ajax Administración contrato-----------------------------------------------------------------------------
if(isset($_POST["consultarContrato"]))
{  
    $tabla = 'contrato';
    $tabla2 = 'persona';
    $atributo = 'cedulaPersona';
    $atributoTabla = 'Persona_idPersona';
    $atributoTabla2 = 'idPersona';
    $valorCedula = $_POST['consultarContrato'];
    $objFormato = new AjaxAdministracionContrato();
    $objFormato->ajaxConsultarContratos($tabla,$tabla2,$valorCedula,$atributo,$atributoTabla,$atributoTabla2);    
}
if(isset($_POST["idContrato"]))
{  
    $tabla = 'contrato';
    $tabla2 = 'persona';
    $atributo = 'idContrato';
    $atributoTabla = 'Persona_idPersona';
    $atributoTabla2 = 'idPersona';
    $valor = $_POST['idContrato'];
    $objFormato = new AjaxAdministracionContrato();
    $objFormato->ajaxConsultarContratos($tabla,$tabla2,$valor,$atributo,$atributoTabla,$atributoTabla2);       
}
if(isset($_POST["idContratoDevolucion"]))
{  
    $tabla = 'contrato';
    $idContratoDevolucion = $_POST['idContratoDevolucion'];
    $cantidad = $_POST['cantidad'];
    $cantidad2 = $_POST['cantidad2'];
    $capacidad = $_POST['capacidad'];
    $capacidad2 = $_POST['capacidad2'];
    $dataCliente = $_POST['dataCliente'];

    $objFormato = new AjaxAdministracionContrato();
    $objFormato->ajaxDevolverContrato($tabla,$idContratoDevolucion,$cantidad,$cantidad2,$capacidad,$capacidad2,$dataCliente);       
}
if(isset($_POST["valorConsultar"]))
{  
    $tabla = "contrato";
    $tabla2 = "persona";
    $atributo = "idSucursal";
    $atributoTabla1 = "Persona_idPersona";
    $atributoTabla2 = "idPersona";
    $valor = $_POST['sucursal'];
    $objFormato = new AjaxAdministracionContrato();
    $objFormato->ajaxConsultarTodosContratos($tabla,$tabla2,$valor,$atributoTabla1,$atributoTabla2);       
}
?>