
<?php    
    $url = Ruta::ctrlRuta();
?>

<div class="container mt-3 fs-5 ms-5">
        <nav aria-label="breadcrumb" class="ms-5">
          <ol class="breadcrumb" class="ms-5">
            <li class="breadcrumb-item"><a href="<?php echo $url;?>adminPersonas" class="link-primary">Administración</a></li>
            <li class="breadcrumb-item active" aria-current="page" class="">Administración Clientes</li>
          </ol>
        </nav>
    </div> 
<div class="ms-5 me-5 mt-0 p-5 text-center">
  <div class="ms-5">
    <h1 class="ms-3 mt-5">Administración Clientes</h1>
  </div>
</div>
  <div class="ms-5 me-5 mt-0 p-5">
    <div class="row m-0 p-0">
    <div class="col-md-10 m-0 p-0"></div>
    <div class="col-md-2 m-0 p-0">
      <div class="me-5">
        <div class="me-0">
          <div class="me-0">
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="ms-5 me-5 mt-0 p-5 scrollComentario">
          <table class="table table-sm ms-5 me-5 mt-0 p-5 fs-5 fondoModal text-center">
            <thead class="cabezaTabla text-white">
              <tr>
                <th scope="col">Identificación</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Comercio</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody id="cuerpoTablaAdminClientes">
            </tbody>
          </table>
    </div>
  </div>  
<form class="form needs-validation" method="post"  enctype="multipart/form-data" novalidate>
        <div class="modal fade" id="editarCliente" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                           <div class="modal-content">
                                       <div class="modal-header " style ="background-color: #006C9E;color:#FFFFFF;" >
                                              <h5  id="staticBackdropLabel"> Modificar Cliente</h5>
                                              <a class="link-white "><button type="button" class="btn"><i class="fas fa-times text-white cerrarModalCliente"></i></button></a>
                                        </div>
                                      <input type="hidden" id="idClienteModificar">
                                      <div class="modal-body mx-3">
                                            <label for="" class="ms-3 mt-3">Nombre</label>
                                             <div class="modal-body">                       
                                                   <input type="text" class="form-control" id="nombreCliente" placeholder="Por favor ingrese un nombre" required>  
                                             </div>
                                            <label for="" class="ms-3 mt-3">Apellido</label>
                                              <div class="modal-body">                       
                                                   <input type="text" class="form-control" id="apellidoCliente" placeholder="Por favor ingrese un apellido" required>  
                                             </div>
                                             <label for="" class="ms-3 mt-3">Cédula</label>
                                              <div class="modal-body">                       
                                                   <input type="text" class="form-control" id="cedulaCliente" placeholder="Por favor ingrese un documento de identidad" required>
                                             </div>
                                      </div>
                                       <div class="form-group">  
                                               <div class="modal-footer">         
                                                     <button type="button" class="btn btn-secondary cerrarModalCliente" style ="width:48%;">Cancelar</button>                                                                 
                                                     <a style ="width:48%;" id = "btnEditarCliente"  class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> <span id = "1" class="">Modificar</span></a>
                                                </div>
                                         </div>
                            </div>
                  </div>   
        </div>
  </form>