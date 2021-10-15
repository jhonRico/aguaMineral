<?php
require_once "../controladores/c_registroAdmin.php";
require_once "../modelos/m_registroAdmin.php";


class   AjaxRegistroAdmin{
    //Paises
    public function ajaxAddRegistroPais($nombrePais)
    {
        $respuesta = ControladorRegistroAdmin::ctrlAddPais($nombrePais);
        echo  json_encode ($respuesta);
	}
    public function ajaxConsultaTodosPaises()
    {
        $respuesta = ControladorRegistroAdmin::consultarPais();
        echo  json_encode ($respuesta);
    }
     public function ajaxEliminarPais($id)
    {
        $respuesta = ControladorRegistroAdmin::eliminarPais($id);
        echo  json_encode ($respuesta);
    }
      public function ajaxModificarPais($id,$descripcion)
    {
        $respuesta = ControladorRegistroAdmin::modificarPais($id,$descripcion);
        echo  json_encode ($respuesta);
    }
    public function ajaxRegistroPais($registroPais)
    {
        $respuesta = ControladorRegistroAdmin::consultarRegistroPais($registroPais);
        echo  json_encode ($respuesta);
    }
    //Tipo Producto 
    public function ajaxRegistrarTipoProducto($descripcion)
    {
        $respuesta = ControladorRegistroAdmin::ctrlRegistrarTipoProducto($descripcion);
        echo  json_encode ($respuesta);
    }
     public function ajaxConsultarTipoProducto($tabla)
    {
        $respuesta = ControladorRegistroAdmin::ctrlConsultarTipoProducto($tabla);
        echo  json_encode ($respuesta);
    }
     public function ajaxConsultarProducto()
    {
        $respuesta = ControladorRegistroAdmin::ctrlConsultarProducto();
        echo  json_encode ($respuesta);
    }
    public function ajaxModificarTipoProducto($idTipoProducto,$descripcion)
    {
        $respuesta = ControladorRegistroAdmin::ctrlModificarTipoProducto($idTipoProducto,$descripcion);
        echo  json_encode ($respuesta);
    }
    public function ajaxEliminarTipoProducto($idTipoProducto)
    {
        $respuesta = ControladorRegistroAdmin::ctrlEliminarTipoProducto($idTipoProducto);
        echo  json_encode ($respuesta);
    }
    //Producto
    public function ajaxRegistrarProducto($tipoProducto,$serial,$capacidad,$cantidad)
    {
        $respuesta = ControladorRegistroAdmin::ctrlRegistrarProducto($tipoProducto,$serial,$capacidad,$cantidad);
        echo  json_encode ($respuesta);
    }
}

if(isset($_POST["nombrePais"]))
{  
    $allStates = new AjaxRegistroAdmin();
    $nombrePais = $_POST["nombrePais"];
    $allStates->ajaxAddRegistroPais($nombrePais);
}

if(isset($_POST["paises"]))
{  
    $allStates = new AjaxRegistroAdmin();
    $allStates->ajaxConsultaTodosPaises();
}

if(isset($_POST["idPais"]))
{  
  
    $allStates = new AjaxRegistroAdmin();
    $id = $_POST['idPais'];
    $allStates->ajaxEliminarPais($id);
}
if(isset($_POST["idPaisModificado"]))
{  
  
    $allStates = new AjaxRegistroAdmin();
    $id = $_POST['idPaisModificado'];
    $descripcion = $_POST['descripcion'];
    $allStates->ajaxModificarPais($id,$descripcion);
}
if(isset($_POST["registroPais"]))
{  
  
    $allStates = new AjaxRegistroAdmin();
    $registroPais = $_POST['registroPais'];
    $allStates->ajaxRegistroPais($registroPais);
}

//Ajax para registro de Tipo de Producto

if(isset($_POST["descripcion"]))
{  
    $allStates = new AjaxRegistroAdmin();
    $descripcion = $_POST["descripcion"];
    $allStates->ajaxRegistrarTipoProducto($descripcion);
}
if(isset($_POST["tabla"]))
{  
    $tabla = $_POST['tabla'];
    $allStates = new AjaxRegistroAdmin();
    $allStates->ajaxConsultarTipoProducto($tabla);
}
if(isset($_POST["idTipoProducto"]))
{  
    $idTipoProducto = $_POST["idTipoProducto"];
    $descripcion = $_POST["descripcionTipoProducto"];
    $allStates = new AjaxRegistroAdmin();
    $allStates->ajaxModificarTipoProducto($idTipoProducto,$descripcion);
}
if(isset($_POST["idTipoProductoEliminar"]))
{  
    $idTipoProducto = $_POST["idTipoProductoEliminar"];
    $allStates = new AjaxRegistroAdmin();
    $allStates->ajaxEliminarTipoProducto($idTipoProducto);
}

//Ajax para productos

if(isset($_POST["tipoProducto"]))
{  
    $tipoProducto = $_POST["tipoProducto"];
    $serial = $_POST["serial"];
    $capacidad = $_POST["capacidad"];
    $cantidad = $_POST["cantidad"];

    $allStates = new AjaxRegistroAdmin();
    $allStates->ajaxRegistrarProducto($tipoProducto,$serial,$capacidad,$cantidad);
}
if(isset($_POST["consultar"]))
{  
    $allStates = new AjaxRegistroAdmin();
    $allStates->ajaxConsultarProducto();
}

?>