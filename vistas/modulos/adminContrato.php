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
        <a href="#" ><img src="<?php echo $url2;?>vistas/img/general/contratos1.png" alt="Blog Image"></a>
      </div>
      <div class="blog-content-box">
        <div class="blog-content">
          <h4><a href="#">Formato Contrato</a></h4>
        </div>
     </div>
   </div>     <div class="single-blog col">
      <div class="single-blog-img">
        <a href="#" ><img src="<?php echo $url2;?>vistas/img/general/contrato2.jpeg" alt="Blog Image"></a>
      </div>
      <div class="blog-content-box">
        <div class="blog-content">
          <h4><a href="#">Contratos</a></h4>
        </div>
     </div>
   </div>
  </div>
</ul>  



</div>

</section>