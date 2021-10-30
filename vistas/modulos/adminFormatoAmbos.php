<?php 
  $url2 = Ruta::ctrlRuta();  
  $respuesta = ControladorRegistroAdminGeneral::consultarRegistroExisteBD("Ambos","tipocontrato","nombre");
  $parametros = ControladorRegistroAdminGeneral::ctrlConsultarParametros();
?>

<section class="home-section">
  <div class="container mt-3 fs-5 ms-5">
        <nav aria-label="breadcrumb" class="ms-5">
          <ol class="breadcrumb" class="ms-5">
            <li class="breadcrumb-item"><a href="http://localhost/aguaMineral/adminFormatos" class="link-primary">Administración de formatos</a></li>
            <li class="breadcrumb-item active" aria-current="page" class="">Formatos</li>
          </ol>
        </nav>
  </div> 

        <div class="container-fluid well well-sm barraProductos">

        </div>

    <div class="container-fluid blogs text-center">
	        <h1 class="mt-5 mb-5">Administración del formato de Ambos</h1>
            
                 <a href ="javascript:mostrarModalAyuda()"><i class="far fa-question-circle fs-1 mb-3" data-toggle="tooltip"  title="Ayuda sobre parametros"></i></a>
                 <a href ="javascript:miFuncionAmbos(<?php echo $respuesta["idTipoContrato"]?>)"><i class="far fa-check-circle fs-1 mb-3" data-toggle="tooltip"  title="Modificar"></i></a>
                 <a href ="javascript:mostrarModalVistaPreviaAmbos()"><i class="fas fa-search fs-1 mb-3" data-toggle="tooltip"  title="Vista previa"></i></a>

                 <form class="form needs-validation" method="post"  enctype="multipart/form-data" novalidate>
                       <div class="form-group ms-5">   
                       <div class="ms-5">
                       <div class="ms-5">
                            <textarea class="form-control w-75 h-75 ms-5" id="formateAmbos" rows="200" cols = "100" ></textarea>
                          
                        </div>
                        </div>
                      </div>
                      <br>
                      <div class="row g-3">
                          <div class="col-md-4">
                             
                         </div>
                         <div class="col-md-4">
                              
                 <a href ="javascript:mostrarModalAyuda()"><i class="far fa-question-circle fs-1 mb-3" data-toggle="tooltip"  title="Ayuda sobre parametros"></i></a>
                 <a href ="javascript:miFuncionAmbos(<?php echo $respuesta["idTipoContrato"]?>)"><i class="far fa-check-circle fs-1 mb-3" data-toggle="tooltip"  title="Modificar"></i></a>
                 <a href ="javascript:mostrarModalVistaPreviaAmbos()"><i class="fas fa-search fs-1 mb-3" data-toggle="tooltip"  title="Vista previa"></i></a>

                         </div>


                      </div>
                 </form>
            
    </div>




</section>
<form class="form needs-validation" method="post"  enctype="multipart/form-data" novalidate>
        <div class="modal fade" id="moddaddhelp" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                  <div class="modal-dialog modal-lg">
                           <div class="modal-content">
                                       <div class="modal-header " style ="background-color: #006C9E;color:#FFFFFF;" >
                                              <h5  id="staticBackdropLabel"> Parámetros de ayuda</h5>
                                              <a class="text-white"><i class="fas fa-times cerrar"></i></a>
                                        </div>
                                    
                                          
                                              <div class="row">
                                              <div class="col-sm-12">
                                                        <div class="card">
                                                          <div class="card-body">
                                                            <h5 class="card-title">Gestión para la modificación del formato</h5>
                                                            <p class="card-text">El formato se puede modificar, pero se debe tener en cuenta mantener los parámetros para que se genere el contrato correctamente. A continuación, se describe la lista de parámetros que permiten registrar la información de los clientes y productos en base de datos para cada uno de los formatos de contrato disponible.</p>
                                                            
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <br>
                                                 <?php foreach ($parametros as $parametroValue){
                                                        list($nombreParametro, $description) = $parametroValue;
                                                 ?>
    

                                                      <div class="card text-white bg-primary mb-5  ms-3" style="max-width: 20rem;">
                                                          <div class="card-header">PARÁMETRO</div>
                                                          <div class="card-body">
                                                            <h5 class="card-title"><b><?php echo $nombreParametro;?></b></h5>
                                                            <p class="card-text"><?php echo $description;?></p>
                                                          </div>
                                                        </div>
                                                      </br>
                                                    <?php } ?>  
                                                </div>


                                       
                            </div>
                  </div>   
        </div>
  </form>

  <form class="form needs-validation" method="post"  enctype="multipart/form-data" novalidate>
        <div class="modal fade" id="modalVistaPreviaAmbos" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                  <div class="modal-dialog modal-lg">
                           <div class="modal-content">
                                       <div class="modal-header " style ="background-color: #006C9E;color:#FFFFFF;" >
                                              <h5  id="staticBackdropLabel"> Vista previa formato</h5>
                                              <a class="text-white"><i class="fas fa-times cerrar"></i></a>
                                        </div>
                                    
                                          
                                              <div class="row">
                                                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-2" id="">
                                                      <div class="col-sm-12" id="verPrevioAmbos">
                                                  
                                                      </div>
                                                   </div>
                                               </div>


                                       
                            </div>
                  </div>   
        </div>
  </form>

    