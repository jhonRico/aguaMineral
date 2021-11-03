<?php  
  $consultar = ControladorRegistroAdmin::ctrlConsultarTipoProducto("tipoproducto","descripcion");
  $consultarSucurales = ControladorRegistroAdmin::ctrlConsultarTipoProducto("sucursal","nombreSucursal");
    $url = Ruta::ctrlRuta();
?>
<body class="">
<input type="hidden" id="oculto" value="<?php echo $consultar;?>">
<div class="container mt-3 fs-5 ms-5">
        <nav aria-label="breadcrumb" class="ms-5">
          <ol class="breadcrumb" class="ms-5">
            <li class="breadcrumb-item"><a href="<?php echo $url;?>adminProductos" class="link-primary">Administración Producto</a></li>
            <li class="breadcrumb-item active" aria-current="page" class="">Producto</li>
          </ol>
        </nav>
    </div> 
<div class="ms-5 me-5 mt-0 p-5 text-center">
  <div class="ms-5">
    <h1 class="ms-5 mb-5">Inventario de Productos</h1>
  </div>
  <div class="row g-3 ms-3">
        <div class="col-md-1">
        </div>
        <div class="col-md-4">
          <label for="inputPassword6" class="col-form-label me-0 mt-5 btn btn-light p-2 rounded"><b>Seleccione Sucursal</b></label>
        </div>
        <div class="col-md-3">
          <select name="" id="selectSucursales" class="form-select w-75 mt-5">
            <?php foreach ($consultarSucurales as $key):?>
            <option value="<?php echo $key['idSucursal'];?>"><?php echo $key['nombreSucursal'];?></option>
          <?php endforeach ?>
          </select>
        </div>
        <div class="col-md-3">
          <button class="col-md-2 mb-0 ms-5 mt-5 btn btn-primary me-0 text-white mostrarModal w-50" type="button" id="" dataToggle="modal">Agregar</button> 
        </div>
  </div>
  <div class="ms-5 me-5 mt-0 p-5">
  <div class="ms-5">
      
  </div>
  <div class="scrollComentario">
  <table class="table table-sm ms-5 me-5 mt-0 p-5 fs-5 fondoModal">
  <thead class="cabezaTabla text-white">
    <tr>
      <th scope="col">Producto</th>
      <th scope="col">Capacidad</th>
      <th scope="col">Serial</th>
      <th scope="col"></th> 
      <th scope="col">Inventario</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col">Acciones</th>   
    </tr>
  </thead>
  <tbody id="fila">
  </tbody>
</table>
  </div>
<div class="ms-5">
  <div class="ms-5">
    <div class=" w-100 rounded ms-5">
       <div class="text-dark m-3 p-2 mb-1 rounded ms-5" id="respuestaCons"></div>
    </div>
  </div>
</div>  
</div>
</div>
  <!-- Modal para agregar nuevo pais  -->
<form class="form needs-validation" method="post"  enctype="multipart/form-data" novalidate>
        <div class="modal fade" id="moddaddCountry" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                           <div class="modal-content">
                                       <div class="modal-header " style ="background-color: #006C9E;color:#FFFFFF;" >
                                              <h5  id="staticBackdropLabel">Agregar Producto</h5>
                                              <a class="link-white "><button type="button" class="btn"><i class="fas fa-times cerrarModalProducto text-white"></i></button></a>
                                        </div>
                                      
                                      <div class="modal-body mx-3">
                                             <div class="modal-body">  
                                                    <label for="" class="form-label mb-3"><b>Sucursal</b></label>                   
                                                   <select class="form-select mb-3" id="sucursal">
                                                    <?php foreach ($consultarSucurales as $key):?>
                                                     <option value="<?php echo $key['idSucursal']."-". $key['nombreSucursal'];?>"><?php echo $key['nombreSucursal'];?></option>
                                                    <?php endforeach ?>
                                                   </select>
                                                   <label for="" class="form-label mb-3"><b>Tipo Producto</b></label>                     
                                                   <select class="form-select" id="tipoProducto">
                                                    <?php foreach ($consultar as $key):?>
                                                     <option value="<?php echo $key['idTipoProducto']."-". $key['descripcion'];?>"><?php echo $key['descripcion'];?></option>
                                                    <?php endforeach ?>
                                                   </select>
                                             </div>
                                             <div class="modal-body">
                                              <div class="row g-3 align-items-center">
                                                  <div class="col-auto">
                                                    <label for="" class="col-form-label me-3"><b>Capacidad</b></label>
                                                  </div>
                                                  <div class="col-md-6">
                                                    <input   type="number" min="1" class="form-control w-75" id="capacidad" name ="nameEstado" placeholder="Capacidad" required> 
                                                  </div>
                                                </div>
                                             </div>
                                             <div class="modal-body">
                                              <div class="row g-3 align-items-center">
                                                  <div class="col-auto">
                                                    <label for="" class="col-form-label me-4"><b>Cantidad</b></label>
                                                  </div>
                                                  <div class="col-md-6">
                                                   <input   type="number" min="1" class="form-control w-75" id="cantidad" name ="nameEstado" placeholder="Productos" required>  
                                                  </div>
                                                </div>
                                             </div>
                                             <div class="modal-body" id="modalSerial">
                                                   <label for="" class="form-label mb-3" id="labelSerial"><b>Serial</b></label>   
                                                   <input   type="text" class="form-control" id="serial" name ="nameEstado" placeholder="Por favor ingrese el serial del producto" required> 
                                             </div>
                                      </div>
                                       <div class="form-group">  
                                               <div class="modal-footer">         
                                                     <button type="button" class="btn btn-secondary cerrarModalProducto" style ="width:48%;">Cancelar</button>                                                                 
                                                     <a style ="width:48%;" id = "agregarProducto"  class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> <span id = "1" class="">Agregar</span></a>
                                                </div>
                                         </div>
                            </div>
                  </div>   
        </div>
  </form>
    <!-- Modal para editar nuevo pais  -->
<form class="form needs-validation" method="post"  enctype="multipart/form-data" novalidate>
        <div class="modal fade" id="editProducto" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                           <div class="modal-content">
                                       <div class="modal-header " style ="background-color: #006C9E;color:#FFFFFF;" >
                                              <h5  id="staticBackdropLabel"> Modificar Producto</h5>
                                              <a class="link-white "><button type="button" class="btn"><i class="fas fa-times cerrarModalProducto text-white"></i></button></a>
                                        </div>
                                      
                                       <div class="modal-body mx-3">
                                             <div class="modal-body" id="modalSerial">
                                                   <label for="" class="form-label mb-3" id="labelSerial"><b>Serial</b></label>   
                                                   <input   type="text" class="form-control" id="serialEditar" name ="nameEstado" placeholder="Por favor ingrese el serial del producto" required> 
                                             </div>
                                             <div class="modal-body">
                                              <div class="row g-3 align-items-center">
                                                  <div class="col-auto">
                                                    <label for="" class="col-form-label me-3"><b>Capacidad</b></label>
                                                  </div>
                                                  <div class="col-md-6">
                                                    <input   type="number" min="1" class="form-control w-75" id="capacidadEditar" name ="nameEstado" placeholder="Capacidad" required> 
                                                  </div>
                                                </div>
                                             </div>
                                             <div class="modal-body">
                                              <div class="row g-3 align-items-center">
                                                  <div class="col-auto">
                                                    <label for="" class="col-form-label me-4"><b>Cantidad</b></label>
                                                  </div>
                                                  <div class="col-md-6">
                                                   <input   type="number" min="1" class="form-control w-75" id="cantidadEditar" name ="nameEstado" placeholder="Productos" required>  
                                                  </div>
                                                </div>
                                             </div>
                                      </div>
                                       <div class="form-group">  
                                               <div class="modal-footer">         
                                                     <button type="button" class="btn btn-secondary cerrarModalProducto" style ="width:48%;">Cancelar</button>                                                                 
                                                     <a style ="width:48%;" id = "editarPais"  class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> <span id = "1" class="">Modificar</span></a>
                                                </div>
                                         </div>
                            </div>
                  </div>   
        </div>
  </form>
</body>