<?php 
  $url = Ruta::ctrlRuta(); 
  $respuesta = ControladorRegistroAdminGeneral::consultarTodoRegBD("sucursal"); 
  $tabla = "serialproducto";
  $resultadoConsultaSerial = ControladorFormatoContrato::ctrlConsultarSerial($tabla);
  $array = $resultadoConsultaSerial;
?>

<input type="hidden" value= "<?php echo $array['idSerialProducto']; ?>" id="serial"> 
<input type="hidden" value= "<?php echo $array['fechaCreacion']; ?>" id="fechaProducto">  

<div class="container mt-3 fs-5 ms-5">
        <nav aria-label="breadcrumb" class="ms-5">
          <ol class="breadcrumb" class="ms-5">
            <li class="breadcrumb-item"><a href="<?php echo $url;?>adminContrato" class="link-primary">Administración de Contratos</a></li>
            <li class="breadcrumb-item active" aria-current="page" class="">Contratos</li>
            <div class="container text-end ms-5">
            	<div class="ms-5">
            		<a href="<?php echo $url?>todosContratos"><button class="btn btn-primary ms-5">Visualizar todos los contratos</button></a>
            	</div>
            </div>			            	
          </ol>
        </nav>
  </div> 
<div class="container text-center mt-4">
	<h2 class="mt-3">Administracion de Contratos</h2>
</div>
<div class="container text-center">
	<label for="" class="form-label mb-0 mt-5">Cédula del contrato</label>
	<input type="text" placeholder="Por favor ingrese una cédula" class="form-control w-25 mx-auto mt-3" id="cedulaContrato">
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
							<div class="ms-5 me-5 mt-5">
								<div class="ms-5 me-5 mt-5">
									<div class="ms-3 me-5 mt-5 scrollComentario">
										<table class="table table-sm ms-5 mt-5 p-5 me-5 fondoModal">
										  <thead class="bg-primary text-white">
										    <tr>
										      <th scope="col">Número</th>
										      <th scope="col">Fecha</th>
										      <th scope="col">Estado</th>
										      <th scope="col">Detalle</th>
										    </tr>
										  </thead>
										  <tbody id="tablaContrato">
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

<!-- Modal -->
<div class="modal fade bd-example-modal-lg bg-white" id="modalDevolucion" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg w-100 h-100">
    <div class="bg-white modal-content border-0">
      <?php 
      date_default_timezone_set("America/Argentina/Buenos_Aires");
                          //Dia-Mes-A�o Hora:Minutos:Segundos
      $fecha = date("d-m-Y H:i:s");
      echo '<div id="content"><div id="cuerpoModalDevolucion"></div><div class="estiloDiv"><h class="justificadoTotal">'.fechaCastellano($fecha).'</h></div></div>

      <div id="elementH"></div>';

      function fechaCastellano ($fecha) {
        $fecha = substr($fecha, 0, 10);
        $numeroDia = date("d", strtotime($fecha));
        $dia = date("l", strtotime($fecha));
        $mes = date("F", strtotime($fecha));
        $anio = date("Y", strtotime($fecha));
        $dias_ES = array("Lunes", "Martes", "Mi&eacutercoles", "Jueves", "Viernes", "S&aacutebado", "Domingo");
        $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $nombredia = str_replace($dias_EN, $dias_ES, $dia);
        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
        return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
      }
      ?>
      <div class="modal-footer pie">
        <button type="button" class="btn btn-secondary cerrarModalDevolucion">Cerrar</button>
        <a href="javascript:imprimirContrato()"><button class="btn btn-primary" type="button">Imprimir</button></a>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg bg-white" id="modalDevolucion" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg w-100 h-100">
    <div class="bg-white modal-content border-0">
      <?php 
      date_default_timezone_set("America/Argentina/Buenos_Aires");
                          //Dia-Mes-A�o Hora:Minutos:Segundos
      $fecha = date("d-m-Y H:i:s");
      echo '<div id="content"><div id="cuerpoModalDevolucion"></div><div class="estiloDiv"><h class="justificadoTotal">'.fechaCastellano($fecha).'</h></div></div>

      <div id="elementH"></div>';
      ?>
      <div class="modal-footer pie">
        <button type="button" class="btn btn-secondary cerrarModalDevolucion">Cerrar</button>
        <a href="javascript:imprimirContrato()"><button class="btn btn-primary" type="button">Imprimir</button></a>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg bg-white" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg w-100 h-100">
    <div class="bg-white modal-content border-0">
      <?php 
      date_default_timezone_set("America/Argentina/Buenos_Aires");
                          //Dia-Mes-A�o Hora:Minutos:Segundos
      $fecha = date("d-m-Y H:i:s");
      echo '<div id="content"><div id="cuerpoContrato"></div><div class="estiloDiv"><h class="justificadoTotal">'.fechaCastellano($fecha).'</h></div></div>

<div id="elementH"></div>';
      ?>
      <div class="modal-footer pie">
        <button type="button" class="btn btn-secondary cerrar">Cerrar</button>
        <a href="javascript:imprimirContrato()" id="imprimirContrato"><button class="btn btn-primary" type="button">Imprimir</button></a>
        <button class="btn btn-success" type="button" id="registrarContrato">Registrar</button>
      </div>
    </div>
  </div>
</div>