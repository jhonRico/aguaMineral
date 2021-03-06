<?php  
require_once "../controladores/c_adminTablas.php";
require_once "../modelos/m_adminTablasModelo.php";
require_once "../controladores/c_bitacora.php";
require_once "../modelos/m_bitacora.php";

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
    public static function ajaxConsultarPersonas($tabla,$tabla2,$atributoTabla1,$atributoTabla2)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrlConsultarTodoEnDosTablas($tabla,$tabla2,$atributoTabla1,$atributoTabla2);
        echo  json_encode ($respuesta);
    }
    public static function ajaxConsultarClientes($tabla,$tabla2,$atributoTabla1,$atributoTabla2)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrlConsultarTodoEnDosTablas($tabla,$tabla2,$atributoTabla1,$atributoTabla2);
        echo  json_encode ($respuesta);
    }
    public static function ajaxModificarUsuario($idUsuarioModificar,$nombre,$apellido,$nombreUsuario,$tipoUsuario)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrlModificarUsuario($idUsuarioModificar,$nombre,$apellido,$nombreUsuario,$tipoUsuario);
        echo  json_encode ($respuesta);
    }
    public static function ajaxEliminarUsuario($id,$tabla,$atributoEliminar,$nombre)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrleliminar($id,$tabla,$atributoEliminar);
        if(strpos($respuesta,"ok")!== false){
           session_start();  
           $audit = ControladorBitacora::ctrlRegistroBitacora($_SESSION['usuarioAuditoria'],"El usuario elimina el usuario con nombre: ".$nombre);
        }

        echo  json_encode ($respuesta);
    }
    public static function ajaxModificarCliente($nombreClienteModificar,$apellido,$cedulaCliente,$idClienteModificar)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrlModificarCliente($nombreClienteModificar,$apellido,$cedulaCliente,$idClienteModificar);
        echo  json_encode ($respuesta);
    }
    public static function ajaxConsultarClienteContratoActivo($id)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrlConsultarClienteContratoActivo($id);
        echo  json_encode ($respuesta);
    }

    public static function ajaxEliminarCliente($idClienteEliminar,$nombreClienteEliminar)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrlEliminarCliente($idClienteEliminar);
        if(strpos($respuesta,"ok")!== false){
           session_start();  
           $audit = ControladorBitacora::ctrlRegistroBitacora($_SESSION['usuarioAuditoria'],"El usuario elimina el cliente con nombre: ".$nombreClienteEliminar);
        }
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
if(isset($_POST["consultarPersona"]))
{  
    $tabla = $_POST['tabla'];
    $tabla2 = $_POST['tabla2'];
    $atributo = $_POST['atributo'];
    $atributo2 = $_POST['atributo2'];
    $objFormato = new AjaxAdministracionComercio();
    $objFormato->ajaxConsultarPersonas($tabla,$tabla2,$atributo,$atributo2);
}
if(isset($_POST["nombreUsuarioModificar"]))
{  
    $idUsuarioModificar = $_POST['idUsuarioModificar'];
    $nombre = $_POST['nombreUsuarioModificar'];
    $apellido = $_POST['apellido'];
    $nombreUsuario = $_POST['nombreUsuario'];
    $tipoUsuario = $_POST['tipoUsuario'];
    $objFormato = new AjaxAdministracionComercio();
    $objFormato->ajaxModificarUsuario($idUsuarioModificar,$nombre,$apellido,$nombreUsuario,$tipoUsuario);
}
if(isset($_POST["idUsuarioEliminar"]))
{  
    $idUsuarioEliminar = $_POST['idUsuarioEliminar'];
    $nombreUsuarioEliminar = $_POST['nombreUsuarioEliminar'];
    $objFormato = new AjaxAdministracionComercio();
    $objFormato->ajaxEliminarUsuario($idUsuarioEliminar,'usuario','idUsuario',$nombreUsuarioEliminar);
}
if(isset($_POST["consultarCliente"]))
{  
    $tabla = $_POST['tablaCliente'];
    $tabla2 = $_POST['tabla2Cliente'];
    $atributo = $_POST['atributoCliente'];
    $atributo2 = $_POST['atributo2Cliente'];
    $objFormato = new AjaxAdministracionComercio();
    $objFormato->ajaxConsultarClientes($tabla,$tabla2,$atributo,$atributo2);
}
if(isset($_POST["nombreClienteModificar"]))
{  
    $nombreClienteModificar = $_POST['nombreClienteModificar'];
    $apellido = $_POST['apellido'];
    $cedulaCliente = $_POST['cedulaCliente'];
    $idClienteModificar = $_POST['idClienteModificar'];
    $objFormato = new AjaxAdministracionComercio();
    $objFormato->ajaxModificarCliente($nombreClienteModificar,$apellido,$cedulaCliente,$idClienteModificar);
}
if(isset($_POST["consultarClienteContratoActivo"]))
{  
    $id = $_POST['consultarClienteContratoActivo'];
    $objFormato = new AjaxAdministracionComercio();
    $objFormato->ajaxConsultarClienteContratoActivo($id);
}
if(isset($_POST["idClienteEliminar"]))
{  
    $idClienteEliminar = $_POST['idClienteEliminar'];
    $nombreClienteEliminar = $_POST['nombreClienteEliminar'];
    $objFormato = new AjaxAdministracionComercio();
    $objFormato->ajaxEliminarCliente($idClienteEliminar,$nombreClienteEliminar);
}

?>