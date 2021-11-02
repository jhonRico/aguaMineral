<?php

$url = Ruta::ctrlRuta();
$rutas = array();
$ruta =  null;
$rutas = explode("/", $_GET["ruta"]);
    session_start();

    $usuario =  $_SESSION['username'];

    if (!isset($usuario)) 
    {
       header("location: http://localhost/aguaMineral/");
    }
    if ($usuario == 'Empleado' && $rutas[0] == "administracion" || $usuario == 'Empleado' && $rutas[0] == "adminPais" || $usuario == 'Empleado' && $rutas[0] == "adminZonas" || $usuario == 'Empleado' && $rutas[0] == "adminContrato" || $usuario == 'Empleado' && $rutas[0] == "adminProductos" || $usuario == 'Empleado' && $rutas[0] == "adminCiudad" || $usuario == 'Empleado' && $rutas[0] == "adminPersonas" || $usuario == 'Empleado' && $rutas[0] == "adminComercio" || $usuario == 'Empleado' && $rutas[0] == "adminEstado" || $usuario == 'Empleado' && $rutas[0] == "adminFormatos" || $usuario == 'Empleado' && $rutas[0] == "administracionMunicipio" || $usuario == 'Empleado' && $rutas[0] == "adminFormatoEstantes" || $usuario == 'Empleado' && $rutas[0] == "adminFormatoBotellones" || $usuario == 'Empleado' && $rutas[0] == "adminFormatoAmbos" || $usuario == 'Empleado' && $rutas[0] == "adminTipoUsuario" || $usuario == 'Empleado' && $rutas[0] == "administracionTipoProducto" || $usuario == 'Empleado' && $rutas[0] == "bitacora" || $usuario == 'Empleado' && $rutas[0] == "registro") 
    {
         header("location: http://localhost/aguaMineral/principal");
    }
    if (isset($_POST['cerrar'])) 
    {
        session_start();
        session_destroy();
        header("location: http://localhost/aguaMineral/");
        exit();   
    }
  
?>
    <!-- TOP -->
    <?php 
    if ($usuario == 'Administrador')
        {
       
            ?>
                <div  class="container-fluid p-1 barra"> 
                    <span title="Administración"><a href="http://localhost/aguaMineral/administracion" class="home"><i class="fas fa-users-cog text-white"></i></a></span>
                </div>
            <?php
        }
    if ($usuario == 'Empleado')
        {
       
            ?>
                <div  class="container-fluid p-1 barra"> 
                    <span title="Regresar a pagina principal"><a href="http://localhost/aguaMineral/principal" class="home"><i class="fas fa-home text-white"></i></a></span>            
                </div>
            <?php
        }
    ?>



