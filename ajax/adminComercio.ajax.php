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
    public static function ajaxConsultarComercioExistente($registroValue,$tabla,$atributoComparar)
    {
    	$respuesta = ControladorRegistroAdminGeneral::consultarRegistroExisteBD($registroValue,$tabla,$atributoComparar);
        echo  json_encode ($respuesta);
    }
    public static function ajaxModificarComercio($id,$valueTable,$tabla,$atributoSet,$atributoWhere)
    {
    	$respuesta = ControladorRegistroAdminGeneral::ctrlModificarOfTable($id,$valueTable,$tabla,$atributoSet,$atributoWhere);
        echo  json_encode ($respuesta);
    }
}
//----------------------------------------------------------------------------------------------------

if(isset($_POST["consultar"]))
{  
    $objFormato = new AjaxAdministracionComercio();
    $objFormato->ajaxConsultarComercios('comercios','persona','Persona_idPersona','idPersona');    
}
if(isset($_POST["comercioConsultar"]))
{  
	$descripcion = $_POST['comercioConsultar'];
    $objFormato = new AjaxAdministracionComercio();
    $objFormato->ajaxConsultarComercioExistente($descripcion,'comercios','nombreTienda');    
}
if(isset($_POST["idModificarComercio"]))
{  
	$id = $_POST['idModificarComercio'];
	$nombreComercio = $_POST['nombreComercio'];
    $objFormato = new AjaxAdministracionComercio();
    $objFormato->ajaxModificarComercio($id,$nombreComercio,'comercios','nombreTienda','idComercios');
}

?>