<?php  
$resultadoConsulta = ControladorFormatoContrato::ctrlConsultarTotalProductosPrestados("tipousuario");
$url = Ruta::ctrlRuta();
?>
<div class="container mt-3 fs-5 ms-5">
        <nav aria-label="breadcrumb" class="ms-5">
          <ol class="breadcrumb" class="ms-5">
            <li class="breadcrumb-item"><a href="<?php echo $url;?>adminPersonas" class="link-primary">Administración</a></li>
            <li class="breadcrumb-item active" aria-current="page" class="">Administración Usuarios</li>
          </ol>
        </nav>
    </div> 
<div class="ms-5 me-5 mt-0 p-5 text-center">
  <div class="ms-5">
    <h1 class="ms-3 mt-5">Administración Usuarios</h1>
  </div>
</div>
  <div class="ms-5 me-5 mt-0 p-5">
    <div class="row m-0 p-0">
    <div class="col-md-10 m-0 p-0"></div>
    <div class="col-md-2 m-0 p-0">
      <div class="me-5">
        <div class="me-0">
          <div class="me-0">
            <a href="<?php echo $url;?>registro"><button class="btn btn-primary w-100 me-5">Agregar</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="ms-5 me-5 mt-0 p-5">
          <table class="table table-sm ms-5 me-5 mt-0 p-5 fs-5 fondoModal text-center">
            <thead class="cabezaTabla text-white">
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Usuario</th>
                <th scope="col">Tipo de Usuario</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody id="cuerpoTablaAdminUsuarios">
            </tbody>
          </table>
    </div>
  </div>  
<form class="form needs-validation" method="post"  enctype="multipart/form-data" novalidate>
        <div class="modal fade" id="editUser" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                           <div class="modal-content">
                                       <div class="modal-header " style ="background-color: #006C9E;color:#FFFFFF;" >
                                              <h5  id="staticBackdropLabel"> Modificar Usuario</h5>
                                              <a class="link-white "><button type="button" class="btn"><i class="fas fa-times text-white cerrarModalUsuario"></i></button></a>
                                        </div>
                                      <input type="hidden" id="idUsuarioModificar">
                                      <div class="modal-body mx-3">
                                            <label for="" class="ms-3 mt-3">Nombre</label>
                                             <div class="modal-body">                       
                                                   <input type="text" class="form-control" id="nombUsuario" placeholder="Por favor ingrese un nombre" required>  
                                             </div>
                                            <label for="" class="ms-3 mt-3">Apellido</label>
                                              <div class="modal-body">                       
                                                   <input type="text" class="form-control" id="apeUsuario" placeholder="Por favor ingrese un apellido" required>  
                                             </div>
                                             <label for="" class="ms-3 mt-3">Nombre de Usuario</label>
                                              <div class="modal-body">                       
                                                   <input type="text" class="form-control" id="nombreUsuario" placeholder="Por favor ingrese el nombre de usuario" required>  
                                             </div>
                                             <label for="" class="ms-3 mt-3">Tipo de Usuario</label>
                                             <div class="modal-body">                       
                                                  <select name="" id="tipoUsuario" class="form-select">
                                                    <?php foreach ($resultadoConsulta as $key): ?>
                                                      <?php if ($key['descripcion'] == 'Cliente') 
                                                      {
                                                        
                                                      }else
                                                      {
                                                      ?>
                                                        <option value="><?php echo $key['idTipoUsuario'];?>"><?php echo $key['descripcion'];?></option>
                                                      <?php  
                                                      }             
                                                      ?>
                                                    <?php endforeach ?>
                                                  </select>
                                             </div>
                                      </div>
                                       <div class="form-group">  
                                               <div class="modal-footer">         
                                                     <button type="button" class="btn btn-secondary cerrarModalUsuario" style ="width:48%;">Cancelar</button>                                                                 
                                                     <a style ="width:48%;" id = "editarUsuario"  class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> <span id = "1" class="">Modificar</span></a>
                                                </div>
                                         </div>
                            </div>
                  </div>   
        </div>
  </form>