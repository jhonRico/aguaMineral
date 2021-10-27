<?php
class ControladorClientes
{      
    static public function ctrlConsultarPersonasEnBd($zona,$tipoUsuario)
    {
        $tabla = "persona";
        $datos = array(
        	"tipoUsuario"=>$tipoUsuario,
        	"zona"=>$zona,
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
    static public function ctrlConsultarReporte($zona,$ciudad,$tipoUsuario,$idPersona)
    {
        $tabla = "persona";
        $estadoContrato = "A";
        $datos = array(
            "idPersona"=>$idPersona,
            "tipoUsuario"=>$tipoUsuario,
            "zona"=>$zona,
            "ciudad"=>$ciudad,
            "estadoContrato"=>$estadoContrato
        );
        $respuesta = ModeloClientes::mdlConsultarReporte($tabla,$datos);
        return $respuesta;
    }
    static public function ctrlConsultarParroquias($ciudad)
    {
        $tabla = "parroquia";
        $datos = array(
            "ciudad"=>$ciudad
        );
        $respuesta = ModeloClientes::ctrlConsultarParroquias($tabla,$datos);
        return $respuesta;
    }
}  

?>