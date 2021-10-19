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
    public function ajaxConsultarTipoProducto($tabla,$parametro1)
    {
        $respuesta = ControladorRegistroAdmin::ctrlConsultarTipoProducto($tabla,$parametro1);
        echo  json_encode ($respuesta);
    }
     public function ajaxConsultarProducto($parametro)
    {
        $respuesta = ControladorRegistroAdmin::ctrlConsultarProducto($parametro);
        echo  json_encode ($respuesta);
    }
    public function ajaxModificarTipoProducto($idTipoProducto,$descripcion)
    {
        $respuesta = ControladorRegistroAdmin::ctrlModificarTipoProducto($idTipoProducto,$descripcion);
        echo  json_encode ($respuesta);
    }
    public function ajaxEliminarRegistroTabla($id,$tabla,$parametro)
    {
        $respuesta = ControladorRegistroAdmin::ctrlEliminarRegistroTabla($id,$tabla,$parametro);
        echo  json_encode ($respuesta);
    }
    //Producto
    public function ajaxRegistrarProducto($tipoProducto,$serial,$capacidad,$cantidad,$sucursal)
    {
        $respuesta = ControladorRegistroAdmin::ctrlRegistrarProducto($tipoProducto,$serial,$capacidad,$cantidad,$sucursal);
        echo  json_encode ($respuesta);
    }

    public function ajaxModificarProducto($idEditarProducto,$serialEditar,$cantidadEditar,$capacidadEditar,$serialDescripcion)
    {
        $respuesta = ControladorRegistroAdmin::ctrlModificarProducto($idEditarProducto,$serialEditar,$cantidadEditar,$capacidadEditar,$serialDescripcion);
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
    $parametro1 = "descripcion";
    $tabla = $_POST['tabla'];
    $allStates = new AjaxRegistroAdmin();
    $allStates->ajaxConsultarTipoProducto($tabla,$parametro1);
}
if(isset($_POST["idTipoProducto"]))
{  
    $idTipoProducto = $_POST["idTipoProducto"];
    $descripcion = $_POST["descripcionTipoProducto"];
    $allStates = new AjaxRegistroAdmin();
    $allStates->ajaxModificarTipoProducto($idTipoProducto,$descripcion);
}
if(isset($_POST["idEliminar"]))
{  
    $id = $_POST["idEliminar"];
    $tabla = $_POST["tablaEliminar"];
    $parametro = $_POST["parametroEliminar"];
    $allStates = new AjaxRegistroAdmin();
    $allStates->ajaxEliminarRegistroTabla($id,$tabla,$parametro);
}

//Ajax para productos

if(isset($_POST["tipoProducto"]))
{  
    $sucursal = $_POST["sucursal"];
    $tipoProducto = $_POST["tipoProducto"];
    $serial = $_POST["serial"];
    $capacidad = $_POST["capacidad"];
    $cantidad = $_POST["cantidad"];

    $allStates = new AjaxRegistroAdmin();
    $allStates->ajaxRegistrarProducto($tipoProducto,$serial,$capacidad,$cantidad,$sucursal);
}
if(isset($_POST["consultar"]))
{  
    $sucursal = $_POST["consultar"];
    $allStates = new AjaxRegistroAdmin();
    $allStates->ajaxConsultarProducto($sucursal);
}
if(isset($_POST["idEditarProducto"]))
{  
    $idEditarProducto = $_POST["idEditarProducto"];
    $serialEditar = $_POST["serialEditar"];
    $cantidadEditar = $_POST["cantidadEditar"];
    $capacidadEditar = $_POST["capacidadEditar"];
    $serialDescripcion = $_POST["serialDescripcion"];

    $allStates = new AjaxRegistroAdmin();
    $allStates->ajaxModificarProducto($idEditarProducto,$serialEditar,$cantidadEditar,$capacidadEditar,$serialDescripcion);
}

?>