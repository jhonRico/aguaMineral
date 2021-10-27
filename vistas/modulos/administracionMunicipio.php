<?php
   $respuesta = ControladorRegistroAdminGeneral::consultarTodoRegBD("estado");
?>
<body class="bg-light">
  <div class="container mt-3 fs-5 ms-5">
        <nav aria-label="breadcrumb" class="ms-5">
          <ol class="breadcrumb" class="ms-5">
            <li class="breadcrumb-item"><a href="http://localhost/aguaMineral/adminZonas" class="link-primary">Administración de Ubicación</a></li>
            <li class="breadcrumb-item active" aria-current="page" class="">Municipio</li>
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
      <th scope="col" class="ms-5"><h3 class="display-6 ms-5">Municipios</h3></th>
      <th></th>
      <th></th>
      <th scope="col">
        <div class="me-5 ms-0">
          <div class="me-5">
            <div class="me-5">
              <div class="me-5">
                <button class="mb-2 ms-0 mt-2 btn btn-primary me-4 text-white mostrarModalAddMunicipios" type="button" id="" dataToggle="modal">Agregar</button>  
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
  <!-- Modal para agregar una nuevo municipio -->
<form class="form needs-validation" method="post"  enctype="multipart/form-data" novalidate>
        <div class="modal fade" id="moddaddmunicipio" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                  <div class="modal-dialog">
                           <div class="modal-content">
                                       <div class="modal-header " style ="background-color: #006C9E;color:#FFFFFF;" >
                                              <h5  id="staticBackdropLabel"> Agregar nuevo municipio</h5>
                                              <a class="text-white"><i class="fas fa-times cerrar"></i></a>
                                        </div>
                                      
                                      <div class="modal-body mx-3">

                                            <div class="modal-body"> 
                                            Estado
                                                 <select name="" id="estadoSelectValue" class="form-select w-75">
                                                    <?php foreach ($respuesta as $key): ?>
                                                       <option value="<?php echo $key['idEstado']; ?>"><?php echo $key['nombreEstado']; ?></option>
                                                    <?php endforeach ?>
                                                  </select>
                                             </div>
                                             <div class="modal-body">                       
                                                   <input   type="text" class="form-control" id="nameMunicipio" name ="nameMunicipio" placeholder="Por favor ingrese un municipio" required>  
                                             </div>
                                             <div class="modal-body">                       
                                                   <input   type="text" class="form-control" id="capitalMunicipio" name ="capitalMunicipio" placeholder="Por favor ingrese una capital del municipio" required>  
                                             </div>
                                      </div>

                                       <div class="form-group">  
                                               <div class="modal-footer">         
                                                     <button type="submit" class="btn btn-secondary " style ="width:48%;"data-dismiss="modal">Cancelar</button>                                                                 
                                                     <a onclick="return " style ="width:48%;" id = "agregarMunicipioBtn"  class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> <span id = "1" class="">Agregar</span></a>
                                                </div>
                                         </div>
                            </div>
                  </div>   
        </div>
  </form>
    <!-- Modal para editar nuevo pais  -->
<form class="form needs-validation" method="post"  enctype="multipart/form-data" novalidate>
        <div class="modal fade" id="editMunicipios" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                  <div class="modal-dialog">
                           <div class="modal-content">
                                       <div class="modal-header " style ="background-color: #006C9E;color:#FFFFFF;" >
                                              <h5  id="staticBackdropLabel"> Modificar Estado</h5>
                                              <a class="text-white"><i class="fas fa-times cerrar"></i></a>
                                        </div>
 

                                      <div class="modal-body mx-3">
                                         <div class="modal-body">  
                                                Estado
                                                 <select name="" id="estadoSelectValueEdit" class="form-select w-75">
                                                    <?php foreach ($respuesta as $key): ?>
                                                       <option value="<?php echo $key['idEstado']; ?>"><?php echo $key['nombreEstado']; ?></option>
                                                    <?php endforeach ?>
                                                  </select>
                                             </div>
                                             <div class="modal-body">                       
                                                   <input   type="text" class="form-control" id="nameMunicipioEdit" name ="nameMunicipio" placeholder="Por favor ingrese un municipio" required>  
                                             </div>
                                             <div class="modal-body">                       
                                                   <input   type="text" class="form-control" id="capitalMunicipioEdit" name ="capitalMunicipio" placeholder="Por favor ingrese una capital del municipio" required>  
                                             </div>
                                      </div>

                                       <div class="form-group">  
                                               <div class="modal-footer">         
                                                     <button type="submit" class="btn btn-secondary " style ="width:48%;"data-dismiss="modal">Cancelar</button>                                                                 
                                                     <a style ="width:48%;" id = "editarMunicipioValue"  class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> <span id = "1" class="">Modificar</span></a>
                                                </div>
                                         </div>
                            </div>
                  </div>   
        </div>
  </form>
</body>