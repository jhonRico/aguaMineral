<?php
    $url = Ruta::ctrlRuta();    
    $servidor = Ruta::ctrlRutaServidor();  
    session_start();
?>
<!-- TOP -->

<div  class="container-fluid p-3 barra border" id="top"> 
    <a href="<?php echo $url ?>" >
        <i class="fas fa-home home text-white"></i>
    </a> 
    <img src="<?php echo $url ?>vistas/img/logoPrincipal/logop.png" class="img-responsive imagenLogo">                                                                               
</div>
