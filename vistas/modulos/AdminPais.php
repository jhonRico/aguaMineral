<?php    
    $url = Ruta::ctrlRuta();
?>

<div class="container mt-3 fs-5">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo $url;?>adminZonas" class="link-primary">Administración de Ubicación</a></li>
            <li class="breadcrumb-item active" aria-current="page" class="">Pais</li>
          </ol>
        </nav>
    </div>

<form method="post" id="formulario" autocomplete="off" class="m-5 fp-5">
  <div class="m-5 p-5">
    <table class="table m-3 p-3">
    <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col" class="ms-5"><h3 class="display-6 ms-5">Pais</h3></th>
      <th></th>
      <th></th>
      <th scope="col">
        <div class="me-5 ms-0">
          <div class="me-5">
            <div class="me-5">
              <div class="me-5">
                <button class="mb-2 ms-0 mt-2 btn btn-primary me-3 text-white mostrarModal" type="button" id="" dataToggle="modal">Agregar</button>  
                <div id="aqui"></div>
                <!--<button class="btn btn-danger" type="button" >Eliminar</button>-->
              </div>
            </div>
          </div>
        </div>
      </th>
    </tr>
   </thead>
</table> 
<div class="ms-5">
  <div class="ms-5">
    <div class=" w-100 rounded ms-5">
       <div class="text-dark m-3 p-2 mb-1 rounded ms-5 scrollComentario" id="respuestaCons"></div>
    </div>
  </div>
</div>  
</div>
</form>
  <!-- Modal para agregar nuevo pais  -->
<form class="form needs-validation" method="post"  enctype="multipart/form-data" novalidate>
        <div class="modal fade" id="moddaddCountry" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                           <div class="modal-content">
                                       <div class="modal-header " style ="background-color: #006C9E;color:#FFFFFF;" >
                                              <h5  id="staticBackdropLabel"> Agregar Pa&iacute;s</h5>
                                              <a class="link-white "><button type="button" class="btn"><i class="fas fa-times cerrar text-white"></i></button></a>
                                        </div>
                                      
                                      <div class="modal-body mx-3">
                                             <div class="modal-body">                       
                                                   <input   type="text" class="form-control" id="namePais" name ="nameEstado" placeholder="Por favor ingrese el nombre del pais" required>  
                                             </div>
                                      </div>
                                       <div class="form-group">  
                                               <div class="modal-footer">         
                                                     <button type="button" class="btn btn-secondary cerrar" style ="width:48%;">Cancelar</button>                                                                 
                                                     <a style ="width:48%;" id = "agregarPais"  class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> <span id = "1" class="">Agregar</span></a>
                                                </div>
                                         </div>
                            </div>
                  </div>   
        </div>
  </form>
    <!-- Modal para editar nuevo pais  -->
<form class="form needs-validation" method="post"  enctype="multipart/form-data" novalidate>
        <div class="modal fade" id="editCountry" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                           <div class="modal-content">
                                       <div class="modal-header " style ="background-color: #006C9E;color:#FFFFFF;" >
                                              <h5  id="staticBackdropLabel"> Modificar Pa&iacute;s</h5>
                                              <a class="link-white "><button type="button" class="btn"><i class="fas fa-times cerrar text-white"></i></button></a>
                                        </div>
                                      
                                      <div class="modal-body mx-3">
                                             <div class="modal-body">                       
                                                   <input   type="text" class="form-control" id="namePais2" name ="nameEstado" placeholder="Por favor ingrese el nombre del pais" required>  
                                             </div>
                                      </div>
                                       <div class="form-group">  
                                               <div class="modal-footer">         
                                                     <button type="button" class="btn btn-secondary cerrar" style ="width:48%;">Cancelar</button>                                                                 
                                                     <a style ="width:48%;" id = "editarPais"  class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> <span id = "1" class="">Modificar</span></a>
                                                </div>
                                         </div>
                            </div>
                  </div>   
        </div>
  </form>