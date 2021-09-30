<!--  
BANNER
-->
<?php
    $url2 = Ruta::ctrlRuta();     
?>


<div class="container-fluid well well-sm barraProductos">

</div>

<!---========================================  
MOSTRAR UNA LISTA DE 6 BLOGS POR CADA PAGINA
===========================================-->
<div class="container-fluid blogs">
    <div class="container">
	    <div class="row">

    <!---========================================  
    BLOG EN CUADRICULA
    ===========================================-->
    
    <ul class="grid0" id="">
            <div class="col-sm-4 col-xs-12">

                     <div class="single-blog">
                          <div class="single-blog-img">
                              <a href="<?php echo $url2?>contratoEstante"  ><img src="<?php echo $url2?>vistas/img/general/contrato.jpg" alt="Blog Image"></a>
                          </div>
                          <div class="blog-content-box">
                         <div class="blog-content">
                                  
                              <h4><a href="<?php echo $url2?>contratoEstante"><i class="fa fa-file-text-o" aria-hidden="true"></i> CONTRATOS</a></h4>
                              </div>
                              <div>
                                  <div class="exerpt">
                                     Modulo para la creación y consulta de contrato de estantes y envases
                                  </div>
                                  

                              </div>
                          </div>
                     </div>
             </div>


             <div class="col-sm-4 col-xs-12">

                     <div class="single-blog">
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
             </div>



             <div class="col-sm-4 col-xs-12">

                     <div class="single-blog">
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

     </ul>  


           
         </div>
    </div>
</div>


