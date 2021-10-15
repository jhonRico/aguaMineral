<?php
require_once "../controladores/c_clientes.php";
require_once "../modelos/m_clientes.php";


class   AjaxClientes
{
    public function ajaxConsultarClientes($zona,$ciudad,$tipoUsuario)
    {
        $respuesta = ControladorClientes::ctrlConsultarPersonasEnBd($zona,$ciudad,$tipoUsuario);
        echo  json_encode ($respuesta);
    }
    public function ajaxConsultarReporte($zona,$ciudad,$tipoUsuario,$idPersona)
    {
        $respuesta = ControladorClientes::ctrlConsultarReporte($zona,$ciudad,$tipoUsuario,$idPersona);
        echo  json_encode ($respuesta);
    }

}

if(isset($_POST["zona"]))
{  
    $zona = $_POST['zona'];
    $ciudad = $_POST['ciudad'];
    $tipoUsuario = $_POST['tipoUsuario'];
    $allStates = new AjaxClientes();
    $allStates->ajaxConsultarClientes($zona,$ciudad,$tipoUsuario);
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