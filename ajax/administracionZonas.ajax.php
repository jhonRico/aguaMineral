<?php

require_once "../controladores/c_adminTablas.php";
require_once "../modelos/m_adminTablasModelo.php";

class   AjaxAdministracionZonas{


     public function ajaxConsultaTodosBD($tabla)
    {
        $respuesta = ControladorRegistroAdminGeneral::consultarTodoRegBD($tabla);
        echo  json_encode ($respuesta);
    }
    public function ajaxConsultaInDbExisteZonas($tabla,$atributo1,$atributo2,$valor1,$valor2)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrlConsultarRegistroExistenteCon1ParametroEntero1String($tabla,$atributo1,$atributo2,$valor1,$valor2);
        echo  json_encode ($respuesta);
    }
      public function ajaxAddRegistro($parametro1,$parametro2,$parametro3,$tabla,$atributo1,$atributo2,$atributo3)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrlAddRegistroTresParametros($parametro1,$parametro2,$parametro3,$tabla,$atributo1,$atributo2,$atributo3);
        echo  json_encode ($respuesta);
    }

    public function ajaxEliminarZona($idDeleteTipUser,$tabla,$atributo)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrleliminar($idDeleteTipUser,$tabla,$atributo);
        echo  json_encode ($respuesta);
    }
    public function ajaxModificarOfTable($parametro1Value,$parametros2Value,$parametros3Value,$tabla,$atributo1,$atributo2,$atributo3)
    {
        $respuesta = ControladorRegistroAdminGeneral::ctrlModificarOfTable2Campos($parametro1Value,$parametros2Value,$parametros3Value,$tabla,$atributo1,$atributo2,$atributo3);
        echo  json_encode ($respuesta);
    }

 }

if(isset($_POST["parametroNeutro"]))
{  
    $objZonas = new AjaxAdministracionZonas();
    $objZonas->ajaxConsultaTodosBD("parroquia");
}

if(isset($_POST["idCiudad"]))
{  
    $objZonas = new AjaxAdministracionZonas();
    $idCiudad = $_POST['idCiudad'];
    $nombreParroquia = $_POST['descripcion'];
    $objZonas->ajaxConsultaInDbExisteZonas('parroquia','Ciudad_idCiudad','nombreParroquia',$idCiudad,$nombreParroquia);
}

if(isset($_POST["descripcionZonaValue"]))
{  
    $allStates = new AjaxAdministracionZonas();
    $idCiudadRegistrar = $_POST["idCiudadRegistrar"];
    $nombreValue = $_POST["descripcionZonaValue"];
    $allStates->ajaxAddRegistro($idCiudadRegistrar,$nombreValue,null,'parroquia','Ciudad_idCiudad','nombreParroquia','Descripcion');
}

if(isset($_POST["idZona"])){
    $objZona = new AjaxAdministracionZonas();
    $idDeleteZona = $_POST['idZona'];
    $objZona->ajaxEliminarZona($idDeleteZona,"parroquia","idParroquia");
}

if(isset($_POST["idZonaModificado"])){
    $objTipoUser = new AjaxAdministracionZonas();
    $idUpdateTipUser = $_POST['idZonaModificado'];
    $idCiudadModificar = $_POST['idCiudadModificar'];
    $valueUpdate = $_POST['descripcionModificar'];
    $objTipoUser->ajaxModificarOfTable($idUpdateTipUser,$valueUpdate,$idCiudadModificar,'parroquia','idParroquia','nombreParroquia','Ciudad_idCiudad');
}

?>