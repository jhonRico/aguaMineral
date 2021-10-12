<?php 
  $url2 = Ruta::ctrlRuta(); 
  $consultar = "consultar";
  $consultaZonas = controladorZonas::ctrlZonas($consultar); 
  $array = ['fas fa-street-view iconosAdmin','fas fa-map-marker-alt iconosAdmin','fas fa-map-marked-alt iconosAdmin','far fa-map iconosAdmin','fas fa-map-marker-alt iconosAdmin','fas fa-street-view iconosAdmin','fas fa-map-marked-alt iconosAdmin','far fa-map iconosAdmin','fas fa-street-view iconosAdmin','fas fa-map-marked-alt iconosAdmin','far fa-map iconosAdmin','fas fa-street-view iconosAdmin','fas fa-map-marker-alt iconosAdmin','fas fa-map-marker-alt iconosAdmin','far fa-map iconosAdmin','fas fa-map-marker-alt iconosAdmin','far fa-map iconosAdmin','fas fa-street-view iconosAdmin','fas fa-map-marked-alt iconosAdmin','far fa-map iconosAdmin','fas fa-street-view iconosAdmin','fas fa-map-marker-alt iconosAdmin','fas fa-map-marker-alt iconosAdmin','far fa-map iconosAdmin','fas fa-map-marker-alt iconosAdmin'];
    $i = 0;
?>


<section class="home-section">
    <div class="container mt-3 fs-5">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="http://localhost/aguaMineral/principal" class="link-primary">Principal</a></li>
            <li class="breadcrumb-item active" aria-current="page" class="">Clientes por zonas</li>
          </ol>
        </nav>
    </div>
    <div class="container-fluid blogs text-center">
    	  <h1 class="mt-5 mb-5">Clientes por zona</h1>
        <!---========================================  
        ZONAS POR CLIENTES 
        ===========================================-->
        <ul class="grid0" id="">
          <div class="row">
            <?php foreach ($consultaZonas as $key): ?>
               <div class="col-md-6">
                <a href="javascript: redireccionarPaginaZonas('<?php  echo $key['descripcion']; ?>')" class="link-dark">
                <div class="border m-3 p-3 bg-light div-admin rounded">
                      <i class="<?php echo $array[$i]; $i++; ?>"></i>
                      <h3 class="titulosAdmin mb-0"><?php echo $key['descripcion']; ?></h3>
                      <p class="mb-5 mt-0">Clientes de la zona <?php echo $key['descripcion']; ?></p>  
                </div>
                </a>
                </div>
              <?php endforeach ?>
          </div>
        </ul>  
    </div>
</section>