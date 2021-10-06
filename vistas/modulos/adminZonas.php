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
        <a href="http://localhost/aguaMineral/adminPais" ><img src="<?php echo $url2;?>vistas/img/general/mapaMundi.jpg" alt="Blog Image"></a>
      </div>
      <div class="blog-content-box">
        <div class="blog-content">
          <h4><a href="http://localhost/aguaMineral/adminPais">Paises</a></h4>
        </div>
     </div>
   </div>     <div class="single-blog col">
      <div class="single-blog-img">
        <a href="#" ><img src="<?php echo $url2;?>vistas/img/general/mapaVenezuela.png" alt="Blog Image"></a>
      </div>
      <div class="blog-content-box">
        <div class="blog-content">
          <h4><a href="#">Estados</a></h4>
        </div>
     </div>
   </div>
  </div>
  <div class="row">
     <div class="single-blog col">
      <div class="single-blog-img">
        <a href="#" ><img src="<?php echo $url2;?>vistas/img/general/estadoTachira.png" alt="Blog Image"></a>
      </div>
      <div class="blog-content-box">
        <div class="blog-content">
          <h4><a href="#">Municipios</a></h4>
        </div>
     </div>
   </div>     <div class="single-blog col">
      <div class="single-blog-img">
        <a href="#" ><img src="<?php echo $url2;?>vistas/img/general/ciudad.jpg" alt="Blog Image"></a>
      </div>
      <div class="blog-content-box">
        <div class="blog-content">
          <h4><a href="#">Ciudad</a></h4>
        </div>
     </div>
   </div>
  </div>
<div class="row">

<div class="single-blog col">
    <div class="single-blog-img">
      <a href="#" ><img src="<?php echo $url2;?>vistas/img/general/sector.jpg" alt="Blog Image" class="w-50 h-25" ></a>
    </div>
    <div class="blog-content-box tienda">
      <div class="me-4">
        <h4 class="me-5"><a href="#" class="link-dark link">Sectores</a></h4>
      </div>
    </div>
  </div>
</div>
</ul>  



</div>

</section>