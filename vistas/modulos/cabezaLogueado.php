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
    if ($usuario == 2 && $rutas[0] == "administracion" || $usuario == 2 && $rutas[0] == "adminPais" || $usuario == 2 && $rutas[0] == "adminZonas" || $usuario == 2 && $rutas[0] == "adminContrato" || $usuario == 2 && $rutas[0] == "adminProductos") 
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
    if ($usuario == 1)
        {
       
            ?>
                <div  class="container-fluid p-3 barra"> 
                    <a href="http://localhost/aguaMineral/administracion" class="returnAdmin"><i class="fas fa-users-cog text-white"></i></a>
                    <img src="<?php echo $url ?>vistas/img/logoPrincipal/logop.png" class="img-responsive imagenLogo">                                                                               
                </div
            <?php
        }
    if ($usuario == 2)
        {
       
            ?>
                <div  class="container-fluid p-3 barra"> 
                    <a href="http://localhost/aguaMineral/principal" class="returnAdmin"><i class="fas fa-home text-white"></i></a>
                    <img src="<?php echo $url ?>vistas/img/logoPrincipal/logop.png" class="img-responsive imagenLogo">                                                                               
                </div
            <?php
        }
    ?>


