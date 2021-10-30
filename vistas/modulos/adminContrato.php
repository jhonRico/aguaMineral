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
            <li class="breadcrumb-item"><a href="http://localhost/aguaMineral/administracion" class="link-primary">Administración</a></li>
            <li class="breadcrumb-item active" aria-current="page" class="">Administración de Formato</li>
          </ol>
        </nav>
    </div>
<div class="container-fluid blogs text-center">
	<h1 class="mt-5 mb-5">Administración de Contratos</h1>

    <!---========================================  
    BLOG EN CUADRICULA
    ===========================================-->
    <ul class="grid0" id="">

    <div class="row">
     <div class="col">
      <a href="<?php echo $url2;?>adminFormatos" class="link-dark">
        <div class="border m-3 p-3 bg-light div-admin rounded">
          <i class="fas fa-file-signature iconosAdmin"></i>
          <h3 class="titulosAdmin mb-0">Formato</h3>
          <p class="mb-5 mt-0">Administre el formato de los contratos</p>
        </div>
      </a>
     </div>
     <div class="col">
      <a href="<?php echo $url2;?>administracionContrato" class="link-dark">
        <div class="border m-3 p-3 bg-light div-admin rounded">
          <i class="fas fa-file-contract iconosAdmin"></i>
          <h3 class="titulosAdmin mb-0">Contratos</h3>
          <p class="mb-5 mt-0">Administre los contratos ya existentes</p>
        </div>
      </a>
     </div>
    </div>
</ul>  



</div>

</section>