<?php

require_once "../controladores/c_adminTablas.php";
require_once "../modelos/m_adminTablasModelo.php";

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

?>