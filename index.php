<?php
/**se incluyen los controladores */
require_once "controladores/c_clientes.php";
require_once 'controladores/c_zonas.php';
require_once 'controladores/c_formatoContrato.php';
require_once "controladores/c_plantilla.php";
require_once "controladores/c_servicios.php";
require_once "controladores/c_slider.php";
require_once "controladores/c_productos.php";
require_once "controladores/c_usuarios.php";
require_once "controladores/c_listas.php";
require_once "controladores/c_recetas.php";
require_once "controladores/c_blogs.php";
require_once "controladores/c_state.php";
require_once "controladores/c_registro.php";
require_once "controladores/c_registroAdmin.php";
require_once "controladores/c_adminTablas.php";
require_once "controladores/c_reportes.php";
require_once "controladores/c_bitacora.php";

/**se incluyen los Modelos */
require_once "modelos/m_clientes.php";
require_once 'modelos/m_zonas.php';
require_once 'modelos/m_formatoContrato.php';
require_once "modelos/rutas.php";
require_once "modelos/m_productos.php";
require_once "modelos/m_usuarios.php";
require_once "modelos/m_listas.php";
require_once "modelos/m_recetas.php";
require_once "modelos/m_blogs.php";
require_once "modelos/m_state.php";
require_once "modelos/m_registro.php";
require_once "modelos/m_registroAdmin.php";
require_once "modelos/m_adminTablasModelo.php";
require_once "modelos/m_reportes.php";
require_once "modelos/m_bitacora.php";

$plantilla = new ControladorPlantilla();
$plantilla ->plantilla();