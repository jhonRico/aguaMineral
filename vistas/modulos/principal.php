<!--  
BANNER
-->
<?php  
$url2 = Ruta::ctrlRuta();
?>
<section class="home-section">


        <div class="container-fluid well well-sm barraProductos">

        </div>

<!---========================================  
MOSTRAR UNA LISTA DE 6 BLOGS POR CADA PAGINA
===========================================-->
<div class="container-fluid blogs">

    <!---========================================  
    BLOG EN CUADRICULA
    ===========================================-->
    <ul class="grid0" id="">
      <div class="container mt-5">
        <div class="row">
        <div class="single-blog col">
          <div class="single-blog-img">
            <a href="http://localhost/aguaMineral/contratoEstante" ><img src="<?php echo $url2;?>vistas/img/general/contrato.jpg" alt="Blog Image"></a>
          </div>
          <div class="blog-content-box">
            <div class="blog-content">
              <h4><a href="http://localhost/aguaMineral/contratoEstante"><i class="fa fa-bar-chart" aria-hidden="true"></i> Contratos</a></h4>
            </div>
            <div>       
              <div class="exerpt">
               Generar Contrato
             </div>

           </div>
         </div>
       </div>     <div class="single-blog col">
          <div class="single-blog-img">
            <a href="#" ><img src="<?php echo $url2;?>vistas/img/general/reporte.jpg" alt="Blog Image"></a>
          </div>
          <div class="blog-content-box">
            <div class="blog-content">
              <h4><a href="#"><i class="fa fa-bar-chart" aria-hidden="true"></i> REPORTES</a></h4>
            </div>
            <div>       
              <div class="exerpt">
               Inventario de estante y envases disponibles y prestados
             </div>

           </div>
         </div>
       </div>

       <div class="single-blog col">
        <div class="single-blog-img">
          <a href="#"  ><img src="<?php echo $url2;?>vistas/img/general/zonas.jpg" alt="Blog Image"></a>
        </div>
        <div class="blog-content-box">
          <div class="blog-content">
            <h4><a href="#"><i class="fa fa-map-signs" aria-hidden="true"></i> ZONAS</a></h4>
          </div>
          <div>
            <div class="exerpt">
              Modulo para consultar los clientes por zonas
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

</ul>  



</div>

</section>



