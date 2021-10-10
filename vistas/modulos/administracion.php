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
	<h1 class="mt-5 mb-5">Administración</h1>

    <!---========================================  
    BLOG EN CUADRICULA
    ===========================================-->
    <ul class="grid0" id="">

    <div class="row">
     <div class="single-blog col">
      <div class="single-blog-img">
        <a href="http://localhost/aguaMineral/adminPersonas" ><img src="<?php echo $url2;?>vistas/img/general/persona.jpg" alt="Blog Image"></a>
      </div>
      <div class="blog-content-box">
        <div class="blog-content">
          <h4><a href="">Personas</a></h4>
        </div>
     </div>
   </div>     <div class="single-blog col">
      <div class="single-blog-img">
        <a href="http://localhost/aguaMineral/adminZonas" ><img src="<?php echo $url2;?>vistas/img/general/zonas.jpg" alt="Blog Image"></a>
      </div>
      <div class="blog-content-box">
        <div class="blog-content">
          <h4><a href="#">Ubicación</a></h4>
        </div>
     </div>
   </div>
   <div class="single-blog col">
      <div class="single-blog-img">
        <a href="http://localhost/aguaMineral/adminContrato" ><img src="<?php echo $url2;?>vistas/img/general/contratos.jpg" alt="Blog Image"></a>
      </div>
      <div class="blog-content-box">
        <div class="blog-content">
          <h4><a href="http://localhost/aguaMineral/adminContrato">Contratos</a></h4>
        </div>
     </div>
   </div>
   </div>
<div class="row">

  <div class="single-blog col">
    <div class="single-blog-img">
      <a href="http://localhost/aguaMineral/adminProductos"  ><img src="<?php echo $url2;?>vistas/img/general/agua.jpg" alt="Blog Image"></a>
    </div>
    <div class="blog-content-box">
      <div class="blog-content">
        <h4><a href="#">Productos</a></h4>
      </div>
    </div>
  </div>
  <div class="single-blog col">
    <div class="single-blog-img">
      <a href="#"  ><img src="<?php echo $url2;?>vistas/img/general/empresa.jpg" alt="Blog Image"></a>
    </div>
    <div class="blog-content-box">
      <div class="blog-content">
        <h4><a href="#">Empresa</a></h4>
      </div>
    </div>
  </div>
  <div class="single-blog col">
    <div class="single-blog-img">
      <a href="#"  ><img src="<?php echo $url2;?>vistas/img/general/sucursal.jpg" alt="Blog Image"></a>
    </div>
    <div class="blog-content-box">
      <div class="blog-content">
        <h4><a href="#">Sucursal</a></h4>
      </div>
    </div>
  </div>
</div>
<div class="row">

<div class="single-blog col">
    <div class="single-blog-img mt-5">
      <a href="#" ><img src="<?php echo $url2;?>vistas/img/general/carrito.jpg" alt="Blog Image" class="w-50 h-25" ></a>
    </div>
    <div class="blog-content-box tienda  me-1">
      <div class="me-3">
        <h4 class="me-3"><a href="#" class="me-5 link-dark link">Tienda</a></h4>
      </div>
    </div>
  </div>
</div>
</ul>  



</div>

</section>