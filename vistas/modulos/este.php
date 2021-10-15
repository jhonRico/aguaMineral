<?php  
    $consultar = "Hola";
    $resultadoFinal = 0;
    $resultadoFinal2 = 0;
    $consultarCiudades = controladorZonas::ctrlconsultarCiudades($consultar);
    $resultado = ControladorClientes::ctrlConsultarTipoUsuario("Cliente");
?>
<section class="home-section"> 
<input type="hidden" id="informacion" value="<?php echo $rutas[0];?>">
<input type="hidden" value="<?php echo $resultado['idTipoUsuario']; ?>" id="tipoUsuario">
<div class="container-fluid blogs text-center">
    <div class="container mt-3 fs-5">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="http://localhost/aguaMineral/zonas" class="link-primary">Zonas</a></li>
            <li class="breadcrumb-item active" aria-current="page" class="">Este</li>
          </ol>
        </nav>
    </div>
      <h1 class="mt-5 mb-5 display-6">Zona Este</h1>

      <div class="row g-3">
        <div class="col-auto">
          <label for="inputPassword6" class="col-form-label me-3"><b>Seleccione Ciudad</b></label>
        </div>
        <div class="col-md-3">
          <select name="" id="centro" class="form-select w-75">
            <?php foreach ($consultarCiudades as $key): ?>
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
            <p class="card-text text-start fs-5">Estantes: <b class="ms-4" id="estanteTotal"></b></p>
            <p class="card-text text-start fs-5">Botellones: <b class="ms-2" id="botellonTotal"></b></p>
          </div>
        </div>
        <div>
        </div>
      </div>


      <table class="table table-sm ms-0 me-5 mt-0 p-5 fs-6" id="tablaCentro">
        <thead class="cabezaTabla text-white">
    <tr>
      <th scope="col">Identificación</th>
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