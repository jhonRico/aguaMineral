<?php 
  $url2 = Ruta::ctrlRuta();  

?>

<section class="home-section">


        <div class="container-fluid well well-sm barraProductos">

        </div>

<!---========================================  
MOSTRAR UNA LISTA DE 6 BLOGS POR CADA PAGINA
===========================================-->
 <div class="container mt-3 fs-5">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo $url2;?>administracion" class="link-primary">Administración</a></li>
            <li class="breadcrumb-item active" aria-current="page" class="">Productos</li>
          </ol>
        </nav>
    </div>
<div class="container-fluid blogs text-center">
	<h1 class="mt-5 mb-5">Administración de Productos</h1>

    <!---========================================  
    BLOG EN CUADRICULA
    ===========================================-->
      <ul class="grid0" id="">

    <div class="row">
     <div class="col">
      <a href="<?php echo $url2;?>administracionTipoProducto" class="link-dark">
        <div class="border m-3 p-3 bg-light div-admin rounded">
          <i class="fas fa-hand-holding-water iconosAdmin"></i>
          <h3 class="titulosAdmin mb-0">Tipo producto</h3>
          <p class="mb-5 mt-0">Administre los tipos de productos</p>
        </div>
      </a>
     </div>
     <div class="col">
      <a href="<?php echo $url2;?>administracionProductos" class="link-dark">
        <div class="border m-3 p-3 bg-light div-admin rounded">
           <i class="fas fa-tint iconosAdmin"></i>
          <h3 class="titulosAdmin mb-0">Productos</h3>
          <p class="mb-5 mt-0">Administre los productos de la empresa</p>
        </div>
      </a>
     </div>
    </div>
</ul> 



</div>

</section>