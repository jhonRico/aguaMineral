<?php 
  $url2 = Ruta::ctrlRuta();  
  $respuesta = ControladorRegistroAdminGeneral::consultarTodoRegBD("tipocontrato");
?>

<section class="home-section">


        <div class="container-fluid well well-sm barraProductos">

        </div>

<!---========================================  
MOSTRAR UNA LISTA DE 6 BLOGS POR CADA PAGINA
===========================================-->
<div class="container-fluid blogs text-center">
	<h1 class="mt-5 mb-5">Administración de Formatos</h1>

    <!---========================================  
    BLOG EN CUADRICULA
    ===========================================-->
    <ul class="grid0" id="">

    <div class="row">
    <?php foreach ($respuesta as $key): ?>
     <div class="col-md-6">        
              <a href="<?php echo $url2; ?>adminFormato<?php echo $key['nombre']; ?>" class="link-dark">
                <div class="border m-3 p-3 bg-light div-admin rounded">
                  <i class="fas fa-file-signature iconosAdmin"></i>
                  <h3 class="titulosAdmin mb-0"><?php echo $key['nombre']; ?></h3>
                  <p class="mb-5 mt-0">Administre el formato de los contratos</p>
                </div>
              </a>        
     </div>
     <?php endforeach ?>
    </div>
</ul>  



</div>

</section>