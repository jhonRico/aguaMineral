<?php 
	$url = Ruta::ctrlRuta(); 
  $respuesta = ControladorRegistroAdminGeneral::consultarTodoRegBD("sucursal");  
?>
<div class="container mt-3 fs-5 ms-5">
        <nav aria-label="breadcrumb" class="ms-5">
          <ol class="breadcrumb" class="ms-5">
            <li class="breadcrumb-item"><a href="<?php echo $url;?>administracionContrato" class="link-primary">Administración de Contratos</a></li>
            <li class="breadcrumb-item active" aria-current="page" class="">Contratos</li>		            	
          </ol>
        </nav>
  </div> 
<div class="container text-center mt-4">
	<h2 class="mt-3">Todos los Contratos</h2>
</div>
<div class="text-center">
  <label for="" class="mt-3 mb-3">Sucursal</label>
  <select name="" id="sucursalContrato" class="form-select w-25 mx-auto">
    <?php foreach ($respuesta as $key):?>
      <option value="<?php echo $key['idSucursal'];?>"><?php echo $key['nombreSucursal'];?></option>
    <?php endforeach ?> 
  </select>
</div>
<div class="container text-center mt-3">
	<h3 class="mt-5 ms-3" id="nombrePersona"></h3>
</div>
<div class="ms-5 me-5 mt-5">
	<div class="ms-5 me-5 mt-5">
		<div class="ms-5 me-5 mt-5">
			<div class="ms-3 me-5 mt-5">
				<div class="ms-3 me-5 mt-5">
					<div class="ms-5 me-5 mt-5">
						<div class="ms-5 me-5 mt-5">
							<div class="ms-3 me-5 mt-5 scrollComentario">
										<table class="table" id="tablaContratoTodo">
										  <thead class="bg-primary text-white">
										    <tr>
										      <th scope="col">Número</th>
										      <th scope="col">Identificacion</th>
                          <th scope="col">Fecha</th>
										      <th scope="col">Estado</th>
										      <th scope="col">Detalle</th>
										    </tr>
										  </thead>
										  <tbody id="tablaContratoTodos">
										  </tbody>
										</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="reporte">
  <div class="modal-dialog modal-lg">
    <div class="modal-content fondoModal">
      <div class="row">
        <i class="fas fa-times text-white eliminar fs-5 ms-3 mt-2" id="close"></i>
        <div class="col-md-10 me-5 ms-5 mt-0 mb-3 p-5 text-center">
          <div class="card ms-5 w-100 me-3 fs-6">
            <h5 class="card-header cabezaTabla text-white"><b class="fs-5">Detalle Contrato</b></h5>
            <div class="card-body fondoModal">
              <div class="row g-3">
                <div class="col-auto">
                  <label for="inputPassword6" class="col-form-label me-3"><b>Cliente:</b></label>
                </div>
                <div class="col-md-3">
                  <p class="mt-1 fs-5 me-0 ms-5" id="cliente"></p>
                </div>   
                <div class="col-md-1"></div>
                <div class="col-auto eliminar">
                  <label for="inputPassword6" class="col-form-label me-1 ms-5"><b>Comercio:</b></label>
                </div>
                <div class="col-md-3">
                  <p class="mt-1 fs-5 me-0 ms-0" id="comercio"></p>
                </div>   
              </div>  
              <div class="row g-3">
                <div class="col-auto">
                  <label for="inputPassword6" class="col-form-label me-0"><b>Identificacion:</b></label>
                </div>
                <div class="col-md-3">
                  <p class="mt-1 fs-5 me-0 ms-0" id="cedula"></p>
                </div>   
                <div class="col-md-1"></div>
                <div class="col-auto eliminar">
                  <label for="inputPassword6" class="col-form-label me-0 ms-3"><b>Telefono:</b></label>
                </div>
                <div class="col-md-3">
                  <p class="mt-1 fs-5 me-1 ms-4" id="telefono"></p>
                </div>   
              </div>
              <div class="row g-3">
                <div class="col-auto">
                  <label for="inputPassword6" class="col-form-label me-2"><b>Dirección:</b></label>
                </div>
                <div class="col-md-5">
                  <p class="mt-1 fs-5 me-5 ms-0" id="direccion"></p>
                </div>   
                <div class="col-md-4"></div>
                <div class="col-md-3"></div>
              </div>    
            </div>
          </div>
          <table class="table table-sm ms-5 me-5 mt-0 p-5 fs-6 mb-0" id="tablaCentro">
        <thead class="cabezaTabla text-white">
        <tr>
          <th scope="col" class="col-md-4">Fecha Contrato</th>
          <th scope="col" class="col-md-4">Estantes Prestados</th>
          <th scope="col" class="col-md-4">Botellones Prestados</th>
        </tr>
      </thead>
      <tbody id="fila2">
      </tbody>
      </table>
      <div class="container text-center" id="devolucion">	
      </div> 
        </div>
      </div>
    </div>  
    </div>
  </div>
</div>