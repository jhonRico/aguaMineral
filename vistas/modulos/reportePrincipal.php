<?php 
  $url2 = Ruta::ctrlRuta();  

?>

<section class="home-section">


        <div class="container-fluid well well-sm barraProductos">

        </div>

<!---========================================  
MOSTRAR UNA LISTA DE 6 BLOGS POR CADA PAGINA
===========================================-->
<div class="container-fluid blogs text-center">
	<h1 class="mt-5 mb-5">Reportes</h1>

    <!---========================================  
    BLOG EN CUADRICULA
    ===========================================-->
    <ul class="grid0" id="">

    <div class="row">
     <div class="col">
      <a href="<?php echo $url2;?>reporteProducto" class="link-dark">
        <div class="border m-3 p-3 bg-light div-admin rounded">
          <i class="fas fa-chart-line iconosAdmin"></i>          
          <h3 class="titulosAdmin mb-0">Reportes Producto</h3>
          <p class="mb-5 mt-0">Consulte los reportes de producto</p>
        </div>
      </a>
     </div>
     <div class="col">
      <a href="<?php echo $url2;?>reporteContrato" class="link-dark">
        <div class="border m-3 p-3 bg-light div-admin rounded">
        <i class="fas fa-chart-bar iconosAdmin"></i>          
        <h3 class="titulosAdmin mb-0">Reportes Contrato</h3>
          <p class="mb-5 mt-0">Consulte los reportes de contrato</p>
        </div>
      </a>
     </div>
    </div>
</ul>  



</div>

</section>