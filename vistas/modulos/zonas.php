<?php 
  $url2 = Ruta::ctrlRuta();  

?>

<section class="home-section">

    <div class="container-fluid blogs text-center">
    	  <h1 class="mt-5 mb-5">Clientes por zona</h1>
        <!---========================================  
        ZONAS POR CLIENTES 
        ===========================================-->
        <ul class="grid0" id="">
          <div class="row">
              <div class="col">
                <a href="http://localhost/aguaMineral/norte" class="link-dark">
                <div class="border m-3 p-3 bg-light div-admin rounded">
                      <i class="fas fa-map-marked-alt iconosAdmin"></i>
                      <h3 class="titulosAdmin mb-0">Norte</h3>
                      <p class="mb-5 mt-0">Clientes de la zona Norte</p>  

                </div>
                </a>
              </div>

              <div class="col">
                <a href="http://localhost/aguaMineral/sur" class="link-dark">
                <div class="border m-3 p-3 bg-light div-admin rounded">
                    <i class="fas fa-globe-americas iconosAdmin"></i>
                    <h3 class="titulosAdmin mb-0">Sur</h3>
                    <p class="mb-5 mt-0">Clientes de la zona Sur</p> 
                </div>
                </a>
              </div>
          </div>

          <div class="row">
              <div class="col">
                <a href="http://localhost/aguaMineral/este" class="link-dark">
                <div class="border m-3 p-3 bg-light div-admin rounded">
                      <i class="fas fa-map-signs iconosAdmin"></i>
                      <h3 class="titulosAdmin mb-0">Este</h3>
                      <p class="mb-5 mt-0">Clientes de la zona Este</p>  
                </div>
                </a>
              </div>

              <div class="col">
                <a href="http://localhost/aguaMineral/oeste" class="link-dark">
                <div class="border m-3 p-3 bg-light div-admin rounded">
                    <i class="fas fa-road iconosAdmin"></i>
                    <h3 class="titulosAdmin mb-0">Oeste</h3>
                    <p class="mb-5 mt-0">Clientes de  zona Oeste</p>
                </div>
                </a>
              </div>
          </div>

        </ul>  
    </div>
</section>