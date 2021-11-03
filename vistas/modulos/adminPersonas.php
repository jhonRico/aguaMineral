<?php 
  $url2 = Ruta::ctrlRuta();  

?>
<div class="container mt-3 fs-5">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo $url2;?>administracion" class="link-primary">Administración</a></li>
            <li class="breadcrumb-item active" aria-current="page" class="">Personas</li>

          </ol>
        </nav>
    </div>


<section class="home-section">


        <div class="container-fluid well well-sm barraProductos">

        </div>

<!---========================================  
MOSTRAR UNA LISTA DE 6 BLOGS POR CADA PAGINA
===========================================-->
<div class="container-fluid blogs text-center">
	<h1 class="mt-5 mb-5">Administración de Personas</h1>

    <!---========================================  
    BLOG EN CUADRICULA
    ===========================================-->
    <ul class="grid0" id="">
    <div class="row">
     <div class="col">
      <a href="<?php echo $url2;?>adminUsuarios" class="link-dark">
        <div class="border m-3 p-3 bg-light div-admin rounded">
          <i class="fas fa-users iconosAdmin"></i>
          <h3 class="titulosAdmin mb-0">Usuario</h3>
          <p class="mb-5 mt-0">Administraci&oacute;n de Usuarios del Sistema</p>
        </div>
      </a>
     </div>
     <div class="col">
      <a href="<?php echo $url2;?>adminTipoUsuario" class="link-dark">
        <div class="border m-3 p-3 bg-light div-admin rounded">
          <i class="fas fa-user-shield iconosAdmin"></i>
          <h3 class="titulosAdmin mb-0">Tipo Usuario</h3>
          <p class="mb-5 mt-0">Administración perfiles de acceso</p>
        </div>
      </a>
     </div>
    </div>
    <div class="row">
     <div class="col-md-6">
      <a href="<?php echo $url2;?>adminClientes" class="link-dark">
        <div class="border m-3 p-3 bg-light div-admin rounded">
          <i class="fas fa-users iconosAdmin"></i>
          <h3 class="titulosAdmin mb-0">Clientes</h3>
          <p class="mb-5 mt-0">Administraci&oacute;n de clientes del Sistema</p>
        </div>
      </a>
     </div>
    </div>
</ul>  



</div>

</section>