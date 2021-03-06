<?php    
    $url = Ruta::ctrlRuta();
?>

<div class="container mt-3 fs-5 ms-5">
        <nav aria-label="breadcrumb" class="ms-5">
          <ol class="breadcrumb" class="ms-5">
            <li class="breadcrumb-item"><a href="<?php echo $url;?>administracion" class="link-primary">Administración</a></li>
            <li class="breadcrumb-item active" aria-current="page" class="">Comercio</li>
          </ol>
        </nav>
    </div> 
<div class="ms-5 me-5 mt-0 p-5 text-center">
  <div class="ms-5">
    <h1 class="ms-3 mb-5">Comercios</h1>
  </div>
  <div class="ms-5 me-5 mt-0 p-5">
  <div class="ms-5">
  </div>
  <div class="scrollComentario">
  <table class="table table-sm ms-5 me-5 mt-0 p-5 fs-5 fondoModal">
  <thead class="cabezaTabla text-white">
    <tr>
      <th scope="col">Identificación</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Comercio</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody id="cuerpoTablaComercio">
  </tbody>
</table>
</div>
  <!-- Modal para agregar nuevo pais  -->
<form class="form needs-validation" method="post"  enctype="multipart/form-data" novalidate>
        <div class="modal fade" id="moddaddStore" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                           <div class="modal-content">
                                       <div class="modal-header " style ="background-color: #006C9E;color:#FFFFFF;" >
                                              <h5  id="staticBackdropLabel"> Agregar Comercio</h5>
                                              <a class="link-white "><button type="button" class="btn"><i class="fas fa-times text-white cerrarModalComercio"></i></button></a>
                                        </div>
                                      
                                      <div class="modal-body mx-3">
                                             <div class="modal-body">                       
                                                   <input   type="text" class="form-control" id="nombreComercio" placeholder="Por favor ingrese el nombre del comercio" required>  
                                             </div>
                                      </div>
                                       <div class="form-group">  
                                               <div class="modal-footer">         
                                                     <button type="button" class="btn btn-secondary cerrarModalComercio" style ="width:48%;">Cancelar</button>                                                                 
                                                     <a style ="width:48%;" id = "agregarComercio"  class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> <span id = "1" class="">Agregar</span></a>
                                                </div>
                                         </div>
                            </div>
                  </div>   
        </div>
  </form>
    <!-- Modal para editar nuevo pais  -->
<form class="form needs-validation" method="post"  enctype="multipart/form-data" novalidate>
        <div class="modal fade" id="editStore" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                           <div class="modal-content">
                                       <div class="modal-header " style ="background-color: #006C9E;color:#FFFFFF;" >
                                              <h5  id="staticBackdropLabel"> Modificar Comercio</h5>
                                              <a class="link-white "><button type="button" class="btn"><i class="fas fa-times text-white cerrarModalComercio"></i></button></a>
                                        </div>
                                      
                                      <div class="modal-body mx-3">
                                             <div class="modal-body">                       
                                                   <input type="text" class="form-control" id="comercioModificar" placeholder="Por favor ingrese el nombre del comercio" required>  
                                             </div>
                                      </div>
                                       <div class="form-group">  
                                               <div class="modal-footer">         
                                                     <button type="button" class="btn btn-secondary cerrarModalComercio" style ="width:48%;">Cancelar</button>                                                                 
                                                     <a style ="width:48%;" id = "editarComercio"  class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> <span id = "1" class="">Modificar</span></a>
                                                </div>
                                         </div>
                            </div>
                  </div>   
        </div>
  </form>