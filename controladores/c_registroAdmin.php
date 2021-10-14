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
    static public function ctrlConsultarTipoProducto()
    {
        $tabla = "tipoproducto";
        $respuesta = ModeloRegistroAdmin::mdlConsultarTipoProducto($tabla);
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
    static public function ctrlEliminarTipoProducto($idTipoProducto)
    {
        $tabla = "tipoproducto";
        $datos = array(
             "idTipoProducto"=>$idTipoProducto,
         );
        $respuesta = ModeloRegistroAdmin::mdlEliminarTipoProducto($tabla,$datos);
        return $respuesta;
    }
}

?>