<?php 
  $url2 = Ruta::ctrlRuta();  

?>


<div class="container mt-3 fs-5">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo $url2;?>administracion" class="link-primary">Administración</a></li>
            <li class="breadcrumb-item active" aria-current="page" class="">Ubicacion</li>
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
	<h1 class="mt-5 mb-5">Administración de Ubicación</h1>

    <!---========================================  
    BLOG EN CUADRICULA
    ===========================================-->
    <ul class="grid0" id="">

    <div class="row">
     <div class="col">
      <a href="<?php echo $url2?>adminPais" class="link-dark">
        <div class="border m-3 p-3 bg-light div-admin rounded">
          <i class="fas fa-globe-americas iconosAdmin"></i>
          <h3 class="titulosAdmin mb-0">Paises</h3>
          <p class="mb-5 mt-0">Administración de Paises</p>
          
        </div>
      </a>
     </div>
     <div class="col">
      <a href="<?php echo $url2?>adminEstado" class="link-dark">
        <div class="border m-3 p-3 bg-light div-admin rounded">
          <i class="fas fa-map-marked-alt iconosAdmin"></i>
          <h3 class="titulosAdmin mb-0">Estados</h3>
          <p class="mb-5 mt-0">Administración de Estados</p>
        </div>
      </a>
     </div>
    </div>
   
  <div class="row">
     <div class="col">
      <a href="<?php echo $url2?>administracionMunicipio" class="link-dark">
        <div class="border m-3 p-3 bg-light div-admin rounded">
          <i class="fas fa-map-marker-alt iconosAdmin"></i>
          <h3 class="titulosAdmin mb-0">Municipio</h3>
          <p class="mb-5 mt-0">Administración de Paises</p>
        </div>
      </a>
     </div>
     <div class="col">
      <a href="<?php echo $url2?>adminCiudad" class="link-dark">
        <div class="border m-3 p-3 bg-light div-admin rounded">
          <i class="fas fa-map-signs iconosAdmin"></i>
          <h3 class="titulosAdmin mb-0">Ciudad</h3>
          <p class="mb-5 mt-0">Administración de Paises</p>
        </div>
      </a>
     </div>
    </div>
<div class="row">
     <div class="col-md-6">
      <a href="<?php echo $url2?>administracionZonas" class="link-dark">
        <div class="border m-3 p-3 bg-light div-admin rounded">
          <i class="far fa-compass iconosAdmin"></i>
          <h3 class="titulosAdmin mb-0">Parroquias</h3>
          <p class="mb-5 mt-0">Administración de Parroquias</p>
        </div>
      </a>
     </div>
    </div>
    </div>
</ul>  



</div>

</section>