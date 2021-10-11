<?php

require_once "../controladores/c_adminTablas.php";
require_once "../modelos/m_adminTablasModelo.php";

class   AjaxRegistroAdmin1{

    public function ajaxConsultaTodosBD($tabla)

    {
        $respuesta = ControladorRegistroAdminGeneral::consultarTodoRegBD($tabla);
        echo  json_encode ($respuesta);
    }

     public function ajaxConsultaInDbExisteTipUser($registroValue,$tabla)
    {
        $respuesta = ControladorRegistroAdminGeneral::consultarRegistroExisteBD($registroValue,$tabla,"descripcion");
        echo  json_encode ($respuesta);
    }

    public function ajaxAddRegistro($nombreValue,$tabla)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrlAddregistro($nombreValue,$tabla);
        echo  json_encode ($respuesta);
    }

   public function ajaxEliminarTipUser($idDeleteTipUser,$tabla,$atributo)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrleliminar($idDeleteTipUser,$tabla,$atributo);
        echo  json_encode ($respuesta);
    }
    
    public function ajaxModificarOfTable($id,$valueTable,$tabla,$atributoSet,$atributoWhere)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrlModificarOfTable($id,$valueTable,$tabla,$atributoSet,$atributoWhere);
        echo  json_encode ($respuesta);
    }
 }

if(isset($_POST["tiposusu"]))
{  
    $allStates = new AjaxRegistroAdmin1();
    $allStates->ajaxConsultaTodosBD("tipousuario");
}

if(isset($_POST["descripcionTipUserValue"]))
{  
    $allStates = new AjaxRegistroAdmin1();
    $nombreValue = $_POST["descripcionTipUserValue"];
    $allStates->ajaxAddRegistro($nombreValue,"tipousuario");
}
if(isset($_POST["validaExisteTipUsuInBd"]))
{  
    
    $allStates = new AjaxRegistroAdmin1();
    $registroValue = $_POST['validaExisteTipUsuInBd'];
    $allStates->ajaxConsultaInDbExisteTipUser($registroValue,"tipousuario");
}
if(isset($_POST["idTipUser"])){
    $objTipoUser = new AjaxRegistroAdmin1();
    $idDeleteTipUser = $_POST['idTipUser'];
    $objTipoUser->ajaxEliminarTipUser($idDeleteTipUser,"tipousuario","idTipoUsuario");
}

if(isset($_POST["idTipUserModificado"])){
    $objTipoUser = new AjaxRegistroAdmin1();
    $idUpdateTipUser = $_POST['idTipUserModificado'];
    $valueUpdate = $_POST['descripcion'];
    $objTipoUser->ajaxModificarOfTable($idUpdateTipUser,$valueUpdate,"tipousuario","descripcion","idTipoUsuario");
}
?>