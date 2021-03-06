<?php  
    $consultar = "Hola";
    $resultadoFinal = 0;
    $resultadoFinal2 = 0;
    $consultarCiudades = controladorZonas::ctrlconsultarCiudades($consultar);
    $resultado = ControladorClientes::ctrlConsultarTipoUsuario("Cliente");
    $url = Ruta::ctrlRuta();
?>
<section class="home-section"> 
<input type="hidden" id="informacion" value="<?php echo $rutas[0];?>">
<input type="hidden" value="<?php echo $resultado['idTipoUsuario']; ?>" id="tipoUsuario">
<div class="container-fluid blogs text-center">
    <div class="container mt-3 fs-5">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo $url;?>zonas" class="link-primary">Zonas</a></li>
            <li class="breadcrumb-item active" aria-current="page" class="">Oeste</li>
          </ol>
        </nav>
    </div>
      <h1 class="mt-5 mb-5 display-6" id="ejecutar">Zona Oeste</h1>

      <div class="row g-3">
        <div class="col-auto">
          <label for="inputPassword6" class="col-form-label me-3"><b>Seleccione Ciudad</b></label>
        </div>
        <div class="col-md-3">
          <select name="" id="centro" class="form-select w-75">
            <?php foreach ($consultarCiudades as $key):?>
            <option value="<?php echo $key['idCiudad']; ?>"><?php echo $key['nombreCiudad'];?></option>
          <?php endforeach ?>
          </select>
        </div>
        <div class="col-md-3">
        </div>
        <div class="col-md-1">
        </div>
        <div class="card col-md-3 bg-light text-center">
          <div class="card-body p-4">
            <h5 class="card-title fs-3">Total Prestamo en Zona</h5>
            <p class="card-text text-start fs-5">Estantes <b class="ms-4" id="estanteTotal"></b></p>
            <p class="card-text text-start fs-5">Botellones <b class="ms-2" id="botellonTotal"></b></p>
          </div>
        </div>
        <div>
        </div>
      </div>


      <table class="table table-sm ms-0 me-5 mt-0 p-5 fs-6" id="tablaCentro">
        <thead class="cabezaTabla text-white">
    <tr>
      <th scope="col">Identificaci??n</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Comercio</th>
      <th scope="col">Sector</th>
      <th scope="col">Detalle</th>
    </tr>
  </thead>
  <tbody id="fila">
  </tbody>
      </table>
</div>
</section>

<!----Modal de Boostrap---->

<!-- Large modal -->
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
                <div class="col-md-2">
                  <p class="mt-1 fs-5 me-0 ms-3" id="comercio"></p>
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
                  <p class="mt-1 fs-5 me-5 ms-3" id="telefono"></p>
                </div>   
              </div>
              <div class="row g-3">
                <div class="col-auto">
                  <label for="inputPassword6" class="col-form-label me-2"><b>Direcci??n:</b></label>
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
        </div>
      </div>
    </div>  
    </div>
  </div>
</div>