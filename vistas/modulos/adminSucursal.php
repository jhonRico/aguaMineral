<?php
    $respuesta = ControladorRegistroAdminGeneral::consultarTodoRegBD("sector");
?>
<body class="bg-light">
<div class="container mt-3 fs-5 ms-5">
        <nav aria-label="breadcrumb" class="ms-5">
          <ol class="breadcrumb" class="ms-5">
            <li class="breadcrumb-item"><a href="http://localhost/aguaMineral/administracion" class="link-primary">Administración</a></li>
            <li class="breadcrumb-item active" aria-current="page" class="">Sucursal</li>
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
      <th scope="col" class="ms-5"><h3 class="display-6 ms-5">Sucursal</h3></th>
      <th></th>
      <th></th>
      <th scope="col">
        <div class="me-5 ms-0">
          <div class="me-5">
            <div class="me-5">
              <div class="me-5">
                <button class="mb-2 ms-0 mt-2 btn btn-primary me-4 text-white mostrarModalAddSucursal" id="" type="button" dataToggle="modal">Agregar</button>  
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
       <div class="text-dark m-3 p-2 mb-1 rounded ms-5" id="verMunicipios"></div>
    </div>
  </div>
</div>  
</div>
</form>
  <!-- Modal para agregar una nuevo estado -->
<form class="form needs-validation" method="post"  enctype="multipart/form-data" novalidate>
        <div class="modal fade" id="moddAddSucursal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                  <div class="modal-dialog">
                           <div class="modal-content">
                                       <div class="modal-header " style ="background-color: #006C9E;color:#FFFFFF;" >
                                              <h5  id="staticBackdropLabel">Agregar nueva Sucursal</h5>
                                              <a class="text-white"><i class="fas fa-times cerrar"></i></a>
                                        </div>
                                      <div class="modal-body mx-3">

                                            <div class="modal-body"> 
                                               <p>Sector</p>
                                                 <select name="" id="idSector" class="form-select w-75">
                                                    <?php foreach ($respuesta as $key): ?>
                                                       <option value="<?php echo $key['idSector']; ?>"><?php echo $key['nombreSector']; ?></option>
                                                    <?php endforeach ?>
                                                  </select>
                                                   <label for="form-label" class="mt-3 mb-3">Sucursal</label>
                                                   <input   type="text" class="form-control" id="sucursal" name ="" placeholder="Por favor ingrese una Sucursal" required>  
                                                   <label for="form-label" class="mt-3 mb-3">Dirección</label>
                                                   <input   type="text" class="form-control" id="direccion" name ="" placeholder="Por favor ingrese una direccion" required>
                                             </div>
                                      </div>

                                       <div class="form-group">  
                                               <div class="modal-footer">         
                                                     <button type="button" class="btn btn-secondary cerrar" style ="width:48%;"data-dismiss="modal">Cancelar</button>                                                                 
                                                     <a onclick="return " style ="width:48%;" id = "agregarSucursalBtn"  class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> <span id = "1" class="">Agregar</span></a>
                                                </div>
                                         </div>
                            </div>
                  </div>   
        </div>
  </form>
    <!-- Modal para editar nuevo pais  -->
<form class="form needs-validation" method="post"  enctype="multipart/form-data" novalidate>
        <div class="modal fade" id="editCiudad" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                  <div class="modal-dialog">
                           <div class="modal-content">
                                       <div class="modal-header " style ="background-color: #006C9E;color:#FFFFFF;" >
                                              <h5  id="staticBackdropLabel"> Modificar Sucursal</h5>
                                              <a class="text-white"><i class="fas fa-times cerrar"></i></a>
                                        </div>
                                      <div class="modal-body mx-3">
                                         <div class="modal-body">  
                                          <select name="" id="MunicipioSelectEdit" class="form-select w-75">
                                             <?php foreach ($respuesta as $key): ?>
                                                <option value="<?php echo $key['idSector']; ?>"><?php echo $key['nombreSector']; ?></option>
                                             <?php endforeach ?>
                                           </select>                                       
                                          </div>
                                             <div class="modal-body">                       
                                                   <input   type="text" class="form-control" id="nameCiudadIdEdit" name ="nameCiudadIdEdit" value="" placeholder="Por favor ingrese el nombre del pais" required>  
                                             </div>
                                      </div>

                                       <div class="form-group">  
                                               <div class="modal-footer">         
                                                     <button type="submit" class="btn btn-secondary " style ="width:48%;"data-dismiss="modal">Cancelar</button>                                                                 
                                                     <a style ="width:48%;" id = "editarCiudadValue"  class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> <span id = "1" class="">Modificar</span></a>
                                                </div>
                                         </div>
                            </div>
                  </div>   
        </div>
  </form>
</body>