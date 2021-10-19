<?php

class ControladorRegistroAdmin
{ 
    //paises
    static public function consultarPais()
    {
        $tabla = "pais";
        $respuesta = ModeloRegistroAdmin::mdlConsultarPais($tabla);
        return $respuesta;
	}

      static public function eliminarPais($id)
    {
        $tabla = "pais";
        $datos = array(
             "idPais"=>$id,
         );

        $respuesta = ModeloRegistroAdmin::mdlEliminarPais($tabla,$datos);
        return $respuesta;
    }
     static public function modificarPais($id,$descripcion)
    {
        $tabla = "pais";
        $datos = array(
             "idPais"=>$id,
             "descripcion"=>$descripcion
         );

        $respuesta = ModeloRegistroAdmin::mdlModificarPais($tabla,$datos);
        return $respuesta;
    }

    static public function ctrlAddPais($nombrePais)
    {

    $tabla = "pais";
    $datos = array(
             "nombrePais"=>$nombrePais,
         );

        $respuesta = ModeloRegistroAdmin::mdlRegistroAdmin($tabla,$datos);
        return $respuesta;
	}
    static public function consultarRegistroPais($registroPais)
    {

    $tabla = "pais";
    $datos = array(
             "registroPais"=>$registroPais,
         );

        $respuesta = ModeloRegistroAdmin::mdlConsultarRegistroPais($tabla,$datos);
        return $respuesta;
    }
    //Tipo Producto 
    static public function ctrlRegistrarTipoProducto($descripcion)
    {
        $tabla = "tipoproducto";
        $datos = array(
             "descripcion"=>$descripcion,
         );
        $respuesta = ModeloRegistroAdmin::mdlRegistrarTipoProducto($tabla, $datos);
        return $respuesta;
    }
    static public function ctrlConsultarProducto($parametro)
    {
        $respuesta = ModeloRegistroAdmin::mdlConsultarProducto($parametro);
        return $respuesta;
    }
    static public function ctrlConsultarTipoProducto($tabla,$parametro1)
    {
        $datos = array(
           "parametro1"=>$parametro1,
        );
        $respuesta = ModeloRegistroAdmin::mdlConsultarTipoProducto($tabla,$datos);
        return $respuesta;
    }
    static public function ctrlModificarTipoProducto($idTipoProducto,$descripcion)
    {
        $tabla = "tipoproducto";
        $datos = array(
             "idTipoProducto"=>$idTipoProducto,
             "descripcion"=>$descripcion,
         );
        $respuesta = ModeloRegistroAdmin::mdlModificarTipoProducto($tabla,$datos);
        return $respuesta;
    }
    static public function ctrlEliminarRegistroTabla($id,$tabla,$parametro)
    {
        $datos = array(
             "id"=>$id,
             "parametro"=>$parametro
         );
        $respuesta = ModeloRegistroAdmin::mdlEliminarRegistroTabla($tabla,$datos);
        return $respuesta;
    }
    //Productos
    static public function ctrlRegistrarProducto($tipoProducto,$serial,$capacidad,$cantidad,$sucursal)
    {
        date_default_timezone_set("America/Bogota");
        if ($serial == '') 
        {
            $serial = date("Y-m-d H:i:s");
        }
        $tabla = "serialproducto";
        $tabla2 = "producto";
        $datos = array(
             "tipoProducto"=>$tipoProducto,
             "serial"=>$serial,
             "capacidad"=>$capacidad,
             "cantidad"=>$cantidad,
             "sucursal"=>$sucursal,
             "fecha"=> date("Y-m-d H:i:s"),
             "estado"=> "disponible",
             "idContrato" => 0
         );
        $respuesta = ModeloRegistroAdmin::mdlRegistrarProducto($tabla,$tabla2,$datos);
        return $respuesta;
    }
    public static function ctrlModificarProducto($idEditarProducto,$serialEditar,$cantidadEditar,$capacidadEditar,$serialDescripcion)
    {
        $tabla = 'producto';
        $tabla2 = 'serialproducto';
        $datos = array(
             "idEditarProducto"=>$idEditarProducto,
             "serialEditar"=>$serialEditar,
             "cantidadEditar"=>$cantidadEditar,
             "capacidadEditar"=>$capacidadEditar,
             "serialDescripcion"=>$serialDescripcion,
         );
        $respuesta = ModeloRegistroAdmin::mdlModificarProducto($tabla,$tabla2,$datos);
        return $respuesta;
    }
    public static function ctrlConsultarProductoExistente($capacidadProductoExistente,$tipoProductoExistente,$sucursalProductoExistente)
    {
        $tabla = 'producto';
        $tabla2 = 'producto_has_contrato';
        $datos = array(
             "capacidadProductoExistente"=>$capacidadProductoExistente,
             "tipoProductoExistente"=>$tipoProductoExistente,
             "sucursalProductoExistente"=>$sucursalProductoExistente,
         );
        $respuesta = ModeloRegistroAdmin::mdlConsultarProductoExistente($tabla,$tabla2,$datos);
        return $respuesta;
    }
}

?>