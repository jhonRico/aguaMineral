<?php 
  $respuesta = ControladorRegistroAdminGeneral::consultarTodoRegBD("ciudad");
  $url = Ruta::ctrlRuta();
?>
<body class="bg-light">
<div class="container mt-3 fs-5 ms-5">
        <nav aria-label="breadcrumb" class="ms-5">
          <ol class="breadcrumb" class="ms-5">
            <li class="breadcrumb-item"><a href="<?php echo $url;?>adminZonas" class="link-primary">Administración de Ubicación</a></li>
            <li class="breadcrumb-item active" aria-current="page" class="">Parroquias</li>
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
      <th scope="col" class="ms-5"><h3 class="display-6 ms-5">Parroquias</h3></th>
      <th></th>
      <th></th>
      <th scope="col">
        <div class="me-5 ms-0">
          <div class="me-5">
            <div class="me-5">
              <div class="me-5">
                <button class="mb-2 ms-0 mt-2 btn btn-primary me-4 text-white mostrarModalAddZonas" type="button" id="" dataToggle="modal">Agregar</button>  
                <div id="aqui"></div>               
              </div>
            </div>
          </div>
        </div>
      </th>
    </tr>
   </thead>
</table> 
<div class="bg-light ms-5">
  <div class="ms-5">
    <div class=" w-100 rounded ms-5">
       <div class="text-dark m-3 p-2 mb-1 rounded ms-5" id="verZonas"></div>
    </div>
  </div>
</div>  
</div>
</form>
  <!-- Modal para agregar una nueva zona -->
<form class="form needs-validation" method="post"  enctype="multipart/form-data" novalidate>
        <div class="modal fade" id="moddaddzonas" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                  <div class="modal-dialog">
                           <div class="modal-content">
                                       <div class="modal-header " style ="background-color: #006C9E;color:#FFFFFF;" >
                                              <h5  id="staticBackdropLabel"> Agregar Parroquia</h5>
                                              <a class="text-white"><i class="fas fa-times cerrar"></i></a>
                                        </div>
                                      
                                      <div class="modal-body mx-3">
                                        <div class="modal-body">  
                                                  <label class="form-label mb-3">Ciudad</label>
                                                   <select name="" id="valorCiudad" class="form-select">
                                                     <?php foreach ($respuesta as $key):?>
                                                      <option value="<?php echo $key['idCiudad'];?>"><?php echo $key['nombreCiudad'];?></option>
                                                    <?php endforeach ?>
                                                   </select>
                                             </div>
                                             <div class="modal-body">
                                                   <label class="form-label mb-3">Parroquia</label>
                                                   <input   type="text" class="form-control" id="nameZona" name ="nameEstado" placeholder="Por favor ingrese el nombre de la parroquia" required>  
                                             </div>
                                      </div>

                                       <div class="form-group">  
                                               <div class="modal-footer">         
                                                     <button type="button" class="btn btn-secondary  cerrarModParroquia" style ="width:48%;"data-dismiss="modal">Cancelar</button>                                                                 
                                                     <a onclick="return " style ="width:48%;" id = "agregarZonaBtn"  class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> <span id = "1" class="">Agregar</span></a>
                                                </div>
                                         </div>
                            </div>
                  </div>   
        </div>
  </form>
    <!-- Modal para editar nuevo pais  -->
<form class="form needs-validation" method="post"  enctype="multipart/form-data" novalidate>
        <div class="modal fade" id="editZonas" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                  <div class="modal-dialog">
                           <div class="modal-content">
                                       <div class="modal-header " style ="background-color: #006C9E;color:#FFFFFF;" >
                                              <h5  id="staticBackdropLabel"> Modificar Parroquia</h5>
                                              <a class="text-white"><i class="fas fa-times cerrar"></i></a>
                                        </div>
                                      
                                      <div class="modal-body mx-3">
                                        <div class="modal-body">  
                                                  <label class="form-label mb-3">Ciudad</label>
                                                   <select name="" id="valorCiudadModificar" class="form-select">
                                                     <?php foreach ($respuesta as $key):?>
                                                      <option value="<?php echo $key['idCiudad'];?>"><?php echo $key['nombreCiudad'];?></option>
                                                    <?php endforeach ?>
                                                   </select>
                                             </div>
                                             <div class="modal-body">
                                                   <label class="form-label mb-3">Parroquia</label>                       
                                                   <input   type="text" class="form-control" id="parroquiModificar" name ="nameEstado" value="" placeholder="Por favor ingrese el nombre de la parroquia" required>  
                                             </div>
                                      </div>

                                       <div class="form-group">  
                                               <div class="modal-footer">         
                                                     <button type="button" class="btn btn-secondary cerrarModParroquia" style ="width:48%;"data-dismiss="modal">Cancelar</button>                                                                 
                                                     <a style ="width:48%;" id = "editarZonaValue"  class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> <span id = "1" class="">Modificar</span></a>
                                                </div>
                                         </div>
                            </div>
                  </div>   
        </div>
  </form>
</body>