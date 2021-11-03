<?php 
  $url2 = Ruta::ctrlRuta();  

?>

<div class="container mt-3 fs-5">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo $url2;?>principal" class="link-primary">Principal</a></li>
            <li class="breadcrumb-item active" aria-current="page" class="">Administración</li>
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
  <h1 class="mt-5 mb-5">Administración</h1>

    <!---========================================  
    BLOG EN CUADRICULA
    ===========================================-->
    <ul class="grid0" id="">

    <div class="row">
    <div class="single-blog col-md-4">
    <div class="single-blog-img">
      <a href="<?php echo $url2;?>adminProductos"  ><img src="<?php echo $url2;?>vistas/img/general/agua.jpg" alt="Blog Image"></a>
    </div>
    <div class="blog-content-box">
      <div class="blog-content">
        <h4><a href="#">Productos</a></h4>
      </div>
    </div>
  </div>
  <div class="single-blog col">
      <div class="single-blog-img">
        <a href="<?php echo $url2;?>adminContrato" ><img src="<?php echo $url2;?>vistas/img/general/contratos.jpg" alt="Blog Image"></a>
      </div>
      <div class="blog-content-box">
        <div class="blog-content">
          <h4><a href="<?php echo $url2;?>adminContrato">Contratos</a></h4>
        </div>
     </div>
   </div>
  <div class="single-blog col">
      <div class="single-blog-img">
        <a href="<?php echo $url2;?>adminZonas" ><img src="<?php echo $url2;?>vistas/img/general/zonas.jpg" alt="Blog Image"></a>
      </div>
      <div class="blog-content-box">
        <div class="blog-content">
          <h4><a href="#">Ubicación</a></h4>
        </div>
     </div>
   </div>
   </div>
<div class="row">

   <div class="single-blog col">
      <div class="single-blog-img">
        <a href="<?php echo $url2;?>adminPersonas" ><img src="<?php echo $url2;?>vistas/img/general/persona.jpg" alt="Blog Image"></a>
      </div>
      <div class="blog-content-box">
        <div class="blog-content">
          <h4><a href="">Personas</a></h4>
        </div>
     </div>
   </div>
  <div class="single-blog col-md-4">
    <div class="single-blog-img">
      <a href="<?php echo $url2;?>adminSucursal"><img src="<?php echo $url2;?>vistas/img/general/sucursal.jpg" alt="Blog Image"></a>
    </div>
    <div class="blog-content-box">
      <div class="blog-content">
        <h4><a href="<?php echo $url2;?>adminSucursal">Sucursal</a></h4>
      </div>
    </div>
  </div>
  <div class="single-blog col-md-4">
    <div class="single-blog-img">
      <a href="<?php echo $url2;?>adminComercio" ><img src="<?php echo $url2;?>vistas/img/general/carrito.jpg" alt="Blog Image"></a>
    </div>
    <div class="blog-content-box">
      <div class="blog-content">
        <h4><a href="">Comercio</a></h4>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="single-blog col-md-4">
    <div class="single-blog-img">
      <a href="<?php echo $url2;?>bitacora" ><img src="<?php echo $url2;?>vistas/img/general/bitacora.jpg" alt="Blog Image"></a>
    </div>
    <div class="blog-content-box">
      <div class="blog-content">
        <h4><a href="<?php echo $url2;?>bitacora">Bitácora</a></h4>
      </div>
    </div>
  </div>
</div>




</section>