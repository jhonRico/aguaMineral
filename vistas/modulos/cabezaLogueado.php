<?php

$url = Ruta::ctrlRuta();

    session_start();


    $usuario =  $_SESSION['username'];

    if (!isset($usuario)) 
    {
       header("location: http://localhost/aguaMineral/");
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
    <div  class="container-fluid p-3 barra" id="top"> 
        <a href="<?php echo $url ?>" >
            <i class="fas fa-home home text-white"></i>
        </a> 
        <img src="<?php echo $url ?>vistas/img/logoPrincipal/logop.png" class="img-responsive imagenLogo">                                                                               
    </div>


