<?php  
require_once "../controladores/c_adminTablas.php";
require_once "../modelos/m_adminTablasModelo.php";

class   AjaxAdministracionComercio
{
   public function ajaxConsultarComercios($tabla,$tabla2,$atributoTabla1,$atributoTabla2)
   {
        $respuesta = ControladorRegistroAdminGeneral::ctrlConsultarTodoEnDosTablas($tabla,$tabla2,$atributoTabla1,$atributoTabla2);
        echo  json_encode ($respuesta);
    }
}
//----------------------------------------------------------------------------------------------------

if(isset($_POST["consultar"]))
{  
    $objFormato = new AjaxAdministracionComercio();
    $objFormato->ajaxConsultarComercios('comercios','persona','Persona_idPersona','idPersona');    
}

?>