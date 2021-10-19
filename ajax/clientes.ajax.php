<?php
require_once "../controladores/c_clientes.php";
require_once "../modelos/m_clientes.php";


class   AjaxClientes
{
    public function ajaxConsultarClientes($zona,$tipoUsuario)
    {
        $respuesta = ControladorClientes::ctrlConsultarPersonasEnBd($zona,$tipoUsuario);
        echo  json_encode ($respuesta);
    }
    public function ajaxConsultarReporte($zona,$ciudad,$tipoUsuario,$idPersona)
    {
        $respuesta = ControladorClientes::ctrlConsultarReporte($zona,$ciudad,$tipoUsuario,$idPersona);
        echo  json_encode ($respuesta);
    }
    public function ajaxConsultarParroquias($ciudad)
    {
        $respuesta = ControladorClientes::ctrlConsultarParroquias($ciudad);
        echo  json_encode ($respuesta);
    }

}

if(isset($_POST["zona"]))
{  
    $zona = $_POST['zona'];
    $tipoUsuario = $_POST['tipoUsuario'];
    $allStates = new AjaxClientes();
    $allStates->ajaxConsultarClientes($zona,$tipoUsuario);
}
if(isset($_POST["ciudadAConsultar"]))
{  
    $ciudad = $_POST['ciudadAConsultar'];
    $allStates = new AjaxClientes();
    $allStates->ajaxConsultarParroquias($ciudad);
}
if(isset($_POST["idPersona"]))
{  
    $idPersona = $_POST['idPersona'];
    $zona = $_POST['zonas'];
    $ciudad = $_POST['ciudad'];
    $tipoUsuario = $_POST['tipoUsuario'];
    $allStates = new AjaxClientes();
    $allStates->ajaxConsultarReporte($zona,$ciudad,$tipoUsuario,$idPersona);
}

?>