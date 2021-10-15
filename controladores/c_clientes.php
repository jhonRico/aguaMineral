<?php
class ControladorClientes
{      
    static public function ctrlConsultarPersonasEnBd($zona,$ciudad,$tipoUsuario)
    {
        $tabla = "persona";
        $datos = array(
        	"tipoUsuario"=>$tipoUsuario,
        	"zona"=>$zona,
        	"ciudad"=>$ciudad
        );
        $respuesta = ModeloClientes::mdlConsultarClientesEnBd($tabla,$datos);
        return $respuesta;
	}
     static public function ctrlConsultarTipoUsuario($parametroAComparar)
    {
        $tabla = "tipousuario";
        $datos = array(
            "parametroAComparar"=>$parametroAComparar,
        );
        $respuesta = ModeloClientes::mdlConsultarTipoUsuario($tabla,$datos);
        return $respuesta;
    }
}  

?>